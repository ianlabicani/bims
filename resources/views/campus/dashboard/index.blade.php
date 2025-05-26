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

        <!-- Campus Overview Map -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-semibold text-gray-900">Campus Overview</h2>
                <span class="text-sm text-gray-500">{{ $buildings->count() }} Buildings</span>
            </div>
            <div class="rounded-lg overflow-hidden border border-gray-200">
                <div id="overview-map" class="h-96 w-full"></div>
            </div>
        </div>

        <!-- Buildings Grid -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-900">Your Buildings</h2>
                <a href="{{ route('campus.buildings.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                    <i class="fas fa-plus mr-2"></i>Add Building
                </a>
            </div>

            @if($buildings->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($buildings as $building)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <!-- Building Map Card Image -->
                            <div class="relative h-48 bg-gray-200">
                                <div id="building-map-{{ $building->id }}" class="w-full h-full"></div>
                                <div class="absolute top-2 left-2 bg-white bg-opacity-90 rounded px-2 py-1">
                                    <span class="text-xs font-medium text-gray-700">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                                        {{ $building->address ?? 'Location' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Building Info -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <h3 class="text-xl font-semibold text-gray-900 truncate">{{ $building->name }}</h3>
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                                                                                                                                    {{ $building->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($building->status ?? 'active') }}
                                    </span>
                                </div>

                                @if($building->description)
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $building->description }}</p>
                                @endif

                                <!-- Building Stats -->
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-blue-600">{{ $building->rooms_count ?? 0 }}</div>
                                        <div class="text-xs text-gray-500">Rooms</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-green-600">{{ $building->items_count ?? 0 }}</div>
                                        <div class="text-xs text-gray-500">Items</div>
                                    </div>
                                </div>

                                <!-- Building Details -->
                                <div class="space-y-2 text-sm text-gray-600 mb-4">
                                    @if($building->building_type)
                                        <div class="flex items-center">
                                            <i class="fas fa-tag w-4 text-gray-400 mr-2"></i>
                                            <span>{{ ucfirst($building->building_type) }}</span>
                                        </div>
                                    @endif
                                    @if($building->floor_count)
                                        <div class="flex items-center">
                                            <i class="fas fa-layer-group w-4 text-gray-400 mr-2"></i>
                                            <span>{{ $building->floor_count }} {{ Str::plural('Floor', $building->floor_count) }}</span>
                                        </div>
                                    @endif
                                    @if($building->total_area)
                                        <div class="flex items-center">
                                            <i class="fas fa-ruler-combined w-4 text-gray-400 mr-2"></i>
                                            <span>{{ number_format($building->total_area) }} sq.m</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex space-x-2">
                                    <a href="{{ route('campus.buildings.show', $building) }}"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                                        View Details
                                    </a>
                                    <a href="{{ route('campus.buildings.edit', $building) }}"
                                        class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-3 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-building text-gray-400 text-5xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No buildings found</h3>
                    <p class="text-gray-500 mb-4">Start by adding your first building to the campus.</p>
                    <a href="{{ route('campus.buildings.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                        <i class="fas fa-plus mr-2"></i>Add First Building
                    </a>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            // Buildings data from PHP
            var buildings = @json($buildings);

            // Initialize overview map
            var overviewMap = L.map('overview-map').setView([17.6364, 121.6783], 13);

            // Add tile layer to overview map
            var overviewTileLayer = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=bZpmItn2cuWjeIdpgbH5', {
                attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a>',
                tileSize: 512,
                zoomOffset: -1,
                minZoom: 1
            }).addTo(overviewMap);

            // Create a group for all building markers
            var markersGroup = L.layerGroup().addTo(overviewMap);
            var bounds = L.latLngBounds();

            // Add markers to overview map and create individual building maps
            buildings.forEach(function (building, index) {
                if (building.latitude && building.longitude) {
                    var lat = parseFloat(building.latitude);
                    var lng = parseFloat(building.longitude);

                    // Add to overview map
                    var marker = L.marker([lat, lng]).addTo(markersGroup)
                        .bindPopup(
                            '<div class="text-center p-2">' +
                            '<b class="text-lg">' + building.name + '</b><br>' +
                            '<span class="text-gray-600">' + (building.address || 'No address') + '</span><br>' +
                            '<div class="mt-2 flex justify-center space-x-2">' +
                            '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">' + (building.rooms_count || 0) + ' rooms</span>' +
                            '<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">' + (building.items_count || 0) + ' items</span>' +
                            '</div>' +
                            '<a href="/campus/buildings/' + building.id + '" class="inline-block mt-2 bg-blue-600 !text-white px-3 py-1 rounded text-xs hover:bg-blue-700">View Building</a>' +
                            '</div>'
                        );

                    bounds.extend([lat, lng]);

                    // Create individual building map
                    var buildingMapId = 'building-map-' + building.id;
                    if (document.getElementById(buildingMapId)) {
                        var buildingMap = L.map(buildingMapId, {
                            zoomControl: false,
                            scrollWheelZoom: false,
                            doubleClickZoom: false,
                            boxZoom: false,
                            keyboard: false,
                            dragging: false,
                            tap: false,
                            touchZoom: false
                        }).setView([lat, lng], 16);

                        // Add tile layer to building map
                        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=bZpmItn2cuWjeIdpgbH5', {
                            attribution: '',
                            tileSize: 512,
                            zoomOffset: -1,
                            minZoom: 1
                        }).addTo(buildingMap);

                        // Add building marker with custom icon
                        var buildingIcon = L.divIcon({
                            className: 'building-marker',
                            html: '<div class="w-6 h-6 bg-red-500 border-2 border-white rounded-full shadow-lg flex items-center justify-center"><i class="fas fa-building text-white text-xs"></i></div>',
                            iconSize: [24, 24],
                            iconAnchor: [12, 12]
                        });

                        L.marker([lat, lng], { icon: buildingIcon }).addTo(buildingMap)
                            .bindPopup('<b>' + building.name + '</b>');

                        // Make the map clickable to view building details
                        buildingMap.on('click', function () {
                            window.location.href = '/campus/buildings/' + building.id;
                        });

                        // Add hover effect
                        document.getElementById(buildingMapId).style.cursor = 'pointer';
                    }
                }
            });

            // Fit overview map to show all buildings if there are any
            if (buildings.length > 0 && bounds.isValid()) {
                overviewMap.fitBounds(bounds, { padding: [20, 20] });
            }

            // Custom CSS for building markers
            var style = document.createElement('style');
            style.textContent = `
                                                                                        .building-marker {
                                                                                            background: transparent;
                                                                                            border: none;
                                                                                        }

                                                                                        .leaflet-container {
                                                                                            background: #f0f0f0 !important;
                                                                                        }

                                                                                        .line-clamp-2 {
                                                                                            display: -webkit-box;
                                                                                            -webkit-line-clamp: 2;
                                                                                            -webkit-box-orient: vertical;
                                                                                            overflow: hidden;
                                                                                        }
                                                                                    `;
            document.head.appendChild(style);
        </script>
    @endpush
@endsection