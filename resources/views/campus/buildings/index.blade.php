@extends('campus.shell')

@section('campus-content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Buildings</h1>
                    <p class="text-gray-600 mt-1">Manage your campus buildings</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('campus.buildings.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-sm">
                        <i class="fas fa-plus mr-2"></i>
                        Add Building
                    </a>
                </div>
            </div>
        </div>

        <!-- Buildings Grid -->
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
                            <!-- Status Badge -->
                            <div class="absolute top-2 right-2">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                                                                                                        {{ $building->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($building->status ?? 'active') }}
                                </span>
                            </div>
                        </div>

                        <!-- Building Info -->
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="text-xl font-semibold text-gray-900 truncate">{{ $building->name }}</h3>
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
                                    <i class="fas fa-eye mr-1"></i>View
                                </a>
                                <a href="{{ route('campus.buildings.edit', $building) }}"
                                    class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 py-2 px-3 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                <i class="fas fa-building text-gray-400 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No buildings found</h3>
                <p class="text-gray-500 mb-6">Start by adding your first building to the campus.</p>
                <a href="{{ route('campus.buildings.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm">
                    <i class="fas fa-plus mr-2"></i>Add First Building
                </a>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            // Buildings data from PHP
            var buildings = @json($buildings);

            // Create individual building maps
            buildings.forEach(function (building, index) {
                if (building.latitude && building.longitude) {
                    var lat = parseFloat(building.latitude);
                    var lng = parseFloat(building.longitude);

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
                            html: '<div class="w-8 h-8 bg-red-500 border-2 border-white rounded-full shadow-lg flex items-center justify-center"><i class="fas fa-building text-white text-sm"></i></div>',
                            iconSize: [32, 32],
                            iconAnchor: [16, 16]
                        });

                        L.marker([lat, lng], { icon: buildingIcon }).addTo(buildingMap)
                            .bindPopup(
                                '<div class="text-center p-2">' +
                                '<b class="text-lg">' + building.name + '</b><br>' +
                                '<span class="text-gray-600">' + (building.address || 'No address') + '</span><br>' +
                                '<div class="mt-2 flex justify-center space-x-2">' +
                                '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">' + (building.rooms_count || 0) + ' rooms</span>' +
                                '<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">' + (building.items_count || 0) + ' items</span>' +
                                '</div>' +
                                '</div>'
                            );

                        // Make the map clickable to view building details
                        buildingMap.on('click', function () {
                            window.location.href = '{{ route("campus.buildings.show", ":id") }}'.replace(':id', building.id);
                        });

                        // Add hover effect
                        document.getElementById(buildingMapId).style.cursor = 'pointer';
                    }
                } else {
                    // If no coordinates, show a placeholder map
                    var buildingMapId = 'building-map-' + building.id;
                    if (document.getElementById(buildingMapId)) {
                        var mapContainer = document.getElementById(buildingMapId);
                        mapContainer.innerHTML = '<div class="w-full h-full bg-gray-300 flex items-center justify-center"><div class="text-center"><i class="fas fa-map-marker-alt text-gray-500 text-2xl mb-2"></i><p class="text-gray-500 text-sm">No location set</p></div></div>';
                        mapContainer.style.cursor = 'pointer';
                        mapContainer.onclick = function () {
                            window.location.href = '{{ route("campus.buildings.show", ":id") }}'.replace(':id', building.id);
                        };
                    }
                }
            });

            // Custom CSS for building markers and styling
            var style = document.createElement('style');
            style.textContent = `
                        .building-marker {
                            background: transparent;
                            border: none;
                        }

                        .leaflet-container {
                            background: #f0f0f0 !important;
                            border-radius: 0;
                        }

                        .line-clamp-2 {
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                        }

                        .leaflet-popup-content-wrapper {
                            border-radius: 8px;
                        }

                        .leaflet-popup-tip {
                            background: white;
                        }
                    `;
            document.head.appendChild(style);
        </script>
    @endpush
@endsection