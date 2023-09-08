<x-app-layout>
    @push('css')
        <x-leaflet-styles/>
    @endpush
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Создать новый район</h1>
        <form id="area-form" method="post">
            @csrf

            <div class="relative mb-4">
                <div id='map'></div>
            </div>

            <button
                id="submit-map"
                type="submit"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Сохранить
            </button>
        </form>

    </div>

    @push('js')
        <x-leaflet-scripts/>

        <script>
            //    Initialize Map
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
                    cancelButton: 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-90'
                },
                buttonsStyling: false
            })
            var dataPolygons = [];

            var map = L.map('map',{preferCanvas:true}).setView([42.315524, 69.586943], 12);
            map.pm.addControls({
                position: 'topleft',
                drawCircle: false,
                drawCircleMarker:false,
                tooltips:true,
                drawPolyline:true,
                dragMode:false,
                cutPolygon:false,
                drawPolygon:true,
                drawRectangle:false,
                editMode:true,
                drawMarker:false,
                rotateMode:false
            });



            map.pm.setLang('ru');
            //OnCreated
            map.on('pm:create', ({ shape,layer }) => {
                console.log(layer.toGeoJSON());
                console.log(layer instanceof L.Polyline);
                console.log(shape);
            });

            // L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-streets-v9/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoid2VwbGF5a3oyMDIwIiwiYSI6ImNrcTRxd3I3czB2eHgydm8wOHR2NW40OTEifQ.a08RNc7xB3Tm1pGai2NNCQ', {subdomains:['mt0','mt1','mt2','mt3'], maxZoom:25}).addTo(map);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        </script>
    @endpush
</x-app-layout>
