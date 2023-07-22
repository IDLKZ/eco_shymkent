<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use App\Models\Place;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class HomeController extends Controller
{


    public function index(){
        return view("home");
    }
    public function map(){
        return view("map");
    }
    public function faq(){
        return view("faq");
    }
    public function stats(){
        Marker::factory()->count(100000)->create();
        return view("stats");
    }
    public function contact(){
        return view("contact");
    }

    public function db_dump(){
        Artisan::call('backup:run',['--only-db'=>true,"--disable-notifications"=>true]);
        toastr()->info(Artisan::output());
        return redirect()->route("back-up");
    }

    public function make_report($id){
        if($marker = Marker::find($id)){
            return view("report",compact("marker"));
        }
        else{
            return redirect()->route("404");
        }
    }

    public function save_report(Request $request){
        $this->validate($request,["marker_id"=>"required","name"=>"required|max:255","phone"=>"required","message"=>"required"]);
        Report::add($request->only(["marker_id","name","phone","message","email"]));
        toastr()->success("Успешно отправлено!","Ваше сообщение отправлено");
        return redirect("/");
    }


}
