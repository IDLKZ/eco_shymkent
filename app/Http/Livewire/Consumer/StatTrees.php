<?php

namespace App\Http\Livewire\Consumer;

use App\Models\Area;
use App\Models\CategoryPlace;
use App\Models\Consumer;
use App\Models\Marker;
use App\Models\Place;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StatTrees extends Component
{
    public $areas;
    public $area;
    public $area_id;

    public $places;
    public $place_id;
    public $place;

    public $categories;
    public $category_id;

    public $breeds = [];

    public $areaStat = false;
    public $placeStat = false;

    public function mount()
    {
        $areasIds = Consumer::where(["user_id"=>auth()->id()])->pluck("area_id","area_id")->toArray();
        $this->areas = Area::whereIn("id",$areasIds)->get();
        $this->categories = CategoryPlace::all();
    }


    public function render()
    {
        $this->changePlace();
        $this->getBreedStats();
        return view('livewire.consumer.stat-trees');
    }


    public function changePlace(){
        if($this->area_id){
            $this->area = Area::find($this->area_id);
            $query = Place::where(["area_id"=>$this->area_id]);
            if($this->category_id){
                $query->where(["category_id"=>$this->category_id]);
            }
            if($this->place_id){
                $this->place = Place::find($this->place_id);
            }
            $this->places = $query->get();
        }
    }

    public function getBreedStats(){
        DB::statement("SET SQL_MODE=''");
        $stats = [];
        $this->areaStat = true;
        $this->placeStat = false;
        if($this->area_id && !$this->place_id){
            $stats =  Marker::where(["area_id"=>$this->area_id])
                ->with(["breed","sanitary",'area','place'])
                ->select('area_id','sanitary_id','breed_id', DB::raw('count(*) as breed_total'))
                ->groupBy(['breed_id','sanitary_id'])
                ->get()->toArray();

        }
        elseif ($this->area_id && $this->place_id){
            $this->areaStat = false;
            $this->placeStat = true;
            $stats =  Marker::where(["place_id"=>$this->place_id])
                ->with(["breed","sanitary",'area','place'])
                ->select('area_id','place_id','sanitary_id','breed_id', DB::raw('count(*) as breed_total'))
                ->groupBy(['breed_id','sanitary_id'])
                ->get()->toArray();
        }
        $this->getStat($stats);

    }


    protected function getStat($stats){
        $this->breeds = [];
        foreach ($stats as $stat){
            if(key_exists($stat["breed_id"],$this->breeds)){
                $this->breeds[$stat["breed_id"]]["breed_total"] += $stat["breed_total"];
                $this->breeds[$stat["breed_id"]]["sanitaries"][$stat["sanitary_id"]] = [
                    "breed_total"=>$stat["breed_total"],
                    "sanitary"=>$stat["sanitary"]
                ];
            }
            else{
                $this->breeds[$stat["breed_id"]] = [
                    "breed_id"=>$stat["breed_id"],
                    "breed_total" => $stat["breed_total"],
                    "place"=>$stat["place"],
                    "breed"=>$stat["breed"],
                    "area"=>$stat["area"],
                    "sanitaries"=>[
                        $stat["sanitary_id"]=>[
                            "breed_total"=>$stat["breed_total"],
                            "sanitary"=>$stat["sanitary"]
                        ]
                    ]
                ];
            }
        }
    }
}
