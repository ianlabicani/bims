@extends('campus.shell')

@section('campus-content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome to Your Dashboard, Campus</h1>

            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-building text-blue-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-blue-900">Buildings</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ $buildings->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-door-open text-green-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-green-900">Total Rooms</h3>
                            <p class="text-2xl font-bold text-green-600">{{ $totalRooms ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-boxes text-purple-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-purple-900">Items</h3>
                            <p class="text-2xl font-bold text-purple-600">{{ $totalItems ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Campus Map -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Campus Map</h2>
            <div class="rounded-lg overflow-hidden border border-gray-200">
                <div id="map" class="h-96 w-full"></div>
            </div>
        </div>
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