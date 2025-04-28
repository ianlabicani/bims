@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Welcome to Your Dashboard, Campus</h1>
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>

    @push('scripts')
        <script>
            var map = L.map('map').setView([17.6364, 121.6783], 13); // Default center

            // Initialize the streets tile layer
            var streetsLayer = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=bZpmItn2cuWjeIdpgbH5', {
                attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a>',
                tileSize: 512,
                zoomOffset: -1,
                minZoom: 1
            }).addTo(map);

            // Add satellite layer
            map.removeLayer(streetsLayer);
            const satelliteLayer = L.maptiler.maptilerLayer({
                apiKey: 'bZpmItn2cuWjeIdpgbH5',
                style: 'satellite',
            }).addTo(map);

            // Buildings data from PHP
            var buildings = @json($buildings);

            buildings.forEach(function (building) {
                if (building.latitude && building.longitude) {
                    var marker = L.marker([building.latitude, building.longitude]).addTo(map)
                        .bindPopup(
                            '<b>' + building.name + '</b><br>' +
                            building.address
                        );
                }
            });
        </script>
    @endpush
@endsection