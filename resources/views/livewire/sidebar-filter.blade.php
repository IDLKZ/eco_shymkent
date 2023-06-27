<div>
    <div class="accordion" id="myCollapseMenu">
        <div class="accordion-item">
            <h2 class="accordion-header" id="areaheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#areaCollapse" aria-expanded="true" aria-controls="areaCollapse">
                    Районы
                </button>
            </h2>
            <div id="areaCollapse" class=" show" aria-labelledby="areaheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @foreach($areas as $areaItem)
                    <div class="form-check">
                        <input wire:click="$emit('areaChanged',{{$areaItem->id}})" class="form-check-input" type="checkbox" id="{{$areaItem->title_ru}}">
                        <label class="form-check-label" for="{{$areaItem->title_ru}}">
                            {{$areaItem->title_ru}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="placeheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#placeCollapse" aria-expanded="true" aria-controls="placeCollapse">
                    Места
                </button>
            </h2>
            <div id="placeCollapse" aria-labelledby="placeheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @foreach($places as $placeItem)
                        <div class="form-check">
                            <input data-id="{{$placeItem->id}}" data-geo="{{$placeItem->geocode}}" data-color="{{$placeItem->bg_color}}" wire:click="$emit('placeChange',{{$placeItem->id}})" class="place-check form-check-input" type="checkbox" id="{{$placeItem->title_ru}}">
                            <label class="form-check-label" for="{{$placeItem->title_ru}}">
                                {{$placeItem->title_ru}}
                            </label>
                        </div>
                    @endforeach
                    <input id="selectedPlaces" hidden type="text" value="{{implode(",",$selectedPlaces)}}">
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="treeheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#treeCollapse" aria-expanded="true" aria-controls="treeCollapse">
                    Выбранное насаждение
                </button>
            </h2>
            <div id="treeCollapse" aria-labelledby="treeheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @if($activeMarker)
                        <div class="relative mb-2">
                            <label>Номер:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->id}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Район:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->area->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Субрайон:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->place->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Тип:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->type->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Тип насаждения:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->breed->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Тип санитарного состояния:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->sanitary->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Тип состояния:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->status->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Тип категории:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->category->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Тип мероприятия:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->event->title_ru}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Диаметр(см):</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->diameter}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Высота(см):</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->height}}" />
                        </div>
                        <div class="relative mb-2">
                            <label>Возраст:</label>
                            <input
                                type="text"
                                disabled
                                class="peer block min-h-[auto] w-full rounded border-1"
                                value="{{$activeMarker->age}}" />
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@push('js')
    <x-leaflet-scripts/>
    <script type="module">
        var map = L.map('map', {preferCanvas: true}).setView([42.315524, 69.586943], 14);

       let areas = {{Js::from($this->areas)}};
       let places = [];
       let selectedAreas = [];
       let selectedPlaces = "";
       let currentZoom = map.getZoom();
       let search_polygon;
        let greenIcon = L.icon({
            iconUrl: '/images/leaf-green.png',
            shadowUrl: '/images/leaf-shadow.png',
            iconSize:     [38, 95], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.processed', (el, component) => {
                selectedAreas = @this.selectedAreas;
                renderMap();
        })})

        function renderMap(){
            cleanMap();
            let renderedArea = areas.filter(areaItem=>
               selectedAreas.includes(areaItem.id)
            );
            renderedArea.forEach(function (area){L.geoJSON(JSON.parse(area.geocode), {style: {color: area.bg_color}}).addTo(map)});
            let placesChecked =$('.place-check:checkbox:checked').each(function () {
                var geocode = $(this).attr("data-geo");
                var bg_color = $(this).attr("data-color");
                L.geoJSON(JSON.parse(geocode), {style: {color:bg_color}}).addTo(map);
                selectedPlaces = $("#selectedPlaces").val();
            });
            loadMarker();
        }

        function cleanMap(){
            map.eachLayer(function(layer) {
                if (!!layer.toGeoJSON) {
                    map.removeLayer(layer);
                }
            });
        }

        function cleanMarker(){
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker){
                    layer.remove();
                }
            });
        }

        map.on("zoomend",function (event) {
            currentZoom = map.getZoom();
            loadMarker();
        })

        map.on("moveend",function (event) {
            if(currentZoom > 14){
                let bounds = event.target.getBounds();
                search_polygon = new L.Polygon([
                    bounds._southWest,
                    L.latLng(bounds._northEast.lat, bounds._southWest.lng), // Top-left coordinate
                    bounds._northEast,
                    L.latLng(bounds._southWest.lat, bounds._northEast.lng)
                ]);
                search_polygon = JSON.stringify(search_polygon.toGeoJSON());
                loadMarker();
            }
        })

        function loadInfo(id){
            alert(id);
        }

        async function loadMarker() {
            if (currentZoom > 14 && selectedPlaces && search_polygon) {
                cleanMap();
                const res = await axios.get('/api/markers-all-place', {params: {search_polygon: search_polygon,ids:selectedPlaces}});
               if(res.status == 200){
                    res.data.forEach(item=>{
                      let marker = L.marker([item.point.coordinates[1],item.point.coordinates[0]],{icon:greenIcon}).addTo(map);
                      marker.on("click",()=>{
                          console.log(item.id);
                          Livewire.emit('loadMarker',item.id);
                      });
                    });
               }
            }
        }

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    </script>
@endpush
