@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Welcome to Your Dashboard, Campus</h1>
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>


    @push('scripts')
        <script>
            var map = L.map('map').setView([17.6364, 121.6783], 13); // Set default view

            // Initialize the streets tile layer
            var streetsLayer = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=bZpmItn2cuWjeIdpgbH5', {
                attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a>',
                tileSize: 512,
                zoomOffset: -1,
                minZoom: 1
            }).addTo(map);

            // Example: Add a marker
            var marker = L.marker([17.6364, 121.6783]).addTo(map)
                .bindPopup('This is Aparri Campus')
                .openPopup();

            // REMOVE the streetsLayer before adding the satellite layer
            map.removeLayer(streetsLayer);

            // Add the satellite layer
            const satelliteLayer = L.maptiler.maptilerLayer({
                apiKey: 'bZpmItn2cuWjeIdpgbH5',
                style: 'satellite',
            }).addTo(map);
        </script>


    @endpush

@endsection