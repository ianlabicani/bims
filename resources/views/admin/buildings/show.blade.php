@extends('admin.shell')

@section('admin-content')
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
        <!-- Header -->
        <div class="mb-6 sm:mb-8">
            <a href="{{ route('admin.buildings.index') }}"
                class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200 mb-4 text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                <span class="hidden xs:inline">Back to Buildings</span>
                <span class="xs:hidden">Back</span>
            </a>

            <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                <div class="flex flex-col space-y-4">
                    <div>
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2 break-words">{{ $building->name }}</h1>
                        <p class="text-sm sm:text-base text-gray-600">Building Information Details</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                <!-- Basic Information -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Basic Information</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Description</label>
                                <p class="text-gray-900 text-sm sm:text-base break-words leading-relaxed">{{ $building->description ?? 'No description available.' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Address</label>
                                <p class="text-gray-900 text-sm sm:text-base break-words leading-relaxed">{{ $building->address ?? 'N/A' }}</p>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Building Type</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->type ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Floor Area</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->floor_area ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Department/Agency</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->department_agency ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Complete Agency Address</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->complete_agency_address ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">College/Office Assigned</label>
                                <p class="text-gray-900 text-sm sm:text-base break-words leading-relaxed">{{ $building->college_office_assigned ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Date Completed</label>
                                <p class="text-gray-900 text-sm sm:text-base">{{ $building->completed_at ? $building->completed_at->format('M j, Y') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Building Description -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Description of Building</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">In Whose Name Registered</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->registered_name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Classification</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->classification ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Location</label>
                                <p class="text-gray-900 text-sm sm:text-base break-words">
                                    {{ $building->location_street ? $building->location_street.', ' : '' }}
                                    {{ $building->location_brgy ? $building->location_brgy.', ' : '' }}
                                    {{ $building->location_municipality ? $building->location_municipality.', ' : '' }}
                                    {{ $building->location_province ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Physical Condition</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->physical_condition ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Land Ownership Status</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->land_ownership_status ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Brief Description of Condition</label>
                                <p class="text-gray-900 text-sm sm:text-base break-words leading-relaxed">{{ $building->condition_description ?? 'N/A' }}</p>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Date of Acquisition</label>
                                    <p class="text-gray-900 text-sm sm:text-base">{{ $building->acquisition_date ? $building->acquisition_date->format('M j, Y') : 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Mode of Acquisition</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->acquisition_mode ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Improvements Undertaken</label>
                                @if($building->improvements && count($building->improvements) > 0)
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        @foreach($building->improvements as $improvement)
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $improvement }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-900 text-sm sm:text-base">None specified</p>
                                @endif
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Existing Utilities</label>
                                @if($building->existing_utilities && count($building->existing_utilities) > 0)
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        @foreach($building->existing_utilities as $utility)
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $utility }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-900 text-sm sm:text-base">None specified</p>
                                @endif
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Estimated Number of Occupants</label>
                                    <p class="text-gray-900 text-sm sm:text-base">{{ $building->estimated_occupants ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Estimated Fund</label>
                                    <p class="text-gray-900 text-sm sm:text-base">₱{{ number_format($building->estimated_fund ?? 0, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Utilization Data -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Utilization Data</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Specific Use of Building</label>
                                <p class="text-gray-900 text-sm sm:text-base break-words leading-relaxed">{{ $building->specific_use ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document Information -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Document Information</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Prepared By</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->prepared_by ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Position/Title</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->preparer_position ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Certified Correct By</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->certified_by ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Department/Agency Head</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words">{{ $building->certifier_position ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Building Statistics -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Building Statistics</h2>
                    <div class="grid grid-cols-3 gap-2 sm:gap-4">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 sm:p-3 lg:p-4 text-center">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-blue-600">{{ $building->number_of_floors ?? 0 }}</div>
                            <div class="text-xs sm:text-sm text-blue-800 mt-1">Floors</div>
                        </div>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-2 sm:p-3 lg:p-4 text-center">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-green-600">{{ $building->number_of_rooms ?? 0 }}</div>
                            <div class="text-xs sm:text-sm text-green-800 mt-1">Rooms</div>
                        </div>
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-2 sm:p-3 lg:p-4 text-center">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-purple-600">{{ $building->number_of_CRs ?? 0 }}</div>
                            <div class="text-xs sm:text-sm text-purple-800 mt-1">CRs</div>
                        </div>
                    </div>
                </div>

                <!-- Building Location Map -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Building Location</h2>
                    @if($building->latitude && $building->longitude)
                        <div class="w-full h-80 rounded-lg overflow-hidden border border-gray-200">
                            <div id="buildingMap" class="w-full h-full"></div>
                        </div>
                        <div class="mt-3 text-sm text-gray-600 text-center">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            {{ $building->latitude }}, {{ $building->longitude }}
                        </div>
                    @else
                        <div class="w-full h-80 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                            <div class="text-center text-gray-500">
                                <i class="fas fa-map-marker-alt text-4xl mb-3"></i>
                                <p class="text-lg font-medium mb-2">No Location Data</p>
                                <p class="text-sm">Latitude and longitude coordinates are not available for this building.</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Certificates -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Certificates</h2>
                    <div class="grid grid-cols-1 gap-3 sm:gap-4">
                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4">
                            <div class="flex flex-col space-y-3 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium text-gray-900 text-sm sm:text-base truncate">CSU Certificate</h3>
                                    <p class="text-xs sm:text-sm text-gray-500">Civil State University Certificate</p>
                                </div>
                                @if ($building->CSU_cert)
                                    <a href="{{ asset('storage/' . $building->CSU_cert) }}" target="_blank"
                                        class="inline-flex items-center justify-center px-3 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200 text-sm font-medium w-full sm:w-auto sm:ml-3 min-h-[36px]">
                                        <i class="fas fa-eye mr-1 text-xs"></i>
                                        <span>View</span>
                                    </a>
                                @else
                                    <span class="inline-flex items-center justify-center px-3 py-2 bg-gray-100 text-gray-500 rounded-md text-sm w-full sm:w-auto sm:ml-3 min-h-[36px]">N/A</span>
                                @endif
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4">
                            <div class="flex flex-col space-y-3 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium text-gray-900 text-sm sm:text-base truncate">Fire Certificate</h3>
                                    <p class="text-xs sm:text-sm text-gray-500">Fire Safety Certificate</p>
                                </div>
                                @if ($building->FIRE_cert)
                                    <a href="{{ asset('storage/' . $building->FIRE_cert) }}" target="_blank"
                                        class="inline-flex items-center justify-center px-3 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-200 text-sm font-medium w-full sm:w-auto sm:ml-3 min-h-[36px]">
                                        <i class="fas fa-eye mr-1 text-xs"></i>
                                        <span>View</span>
                                    </a>
                                @else
                                    <span class="inline-flex items-center justify-center px-3 py-2 bg-gray-100 text-gray-500 rounded-md text-sm w-full sm:w-auto sm:ml-3 min-h-[36px]">N/A</span>
                                @endif
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4">
                            <div class="flex flex-col space-y-3 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium text-gray-900 text-sm sm:text-base truncate">Occupancy Certificate</h3>
                                    <p class="text-xs sm:text-sm text-gray-500">Building Occupancy Permit</p>
                                </div>
                                @if ($building->OCCUPANCY_cert)
                                    <a href="{{ asset('storage/' . $building->OCCUPANCY_cert) }}" target="_blank"
                                        class="inline-flex items-center justify-center px-3 py-2 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors duration-200 text-sm font-medium w-full sm:w-auto sm:ml-3 min-h-[36px]">
                                        <i class="fas fa-eye mr-1 text-xs"></i>
                                        <span>View</span>
                                    </a>
                                @else
                                    <span class="inline-flex items-center justify-center px-3 py-2 bg-gray-100 text-gray-500 rounded-md text-sm w-full sm:w-auto sm:ml-3 min-h-[36px]">N/A</span>
                                @endif
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3 sm:p-4">
                            <div class="flex flex-col space-y-3 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-medium text-gray-900 text-sm sm:text-base truncate">LGU Certificate</h3>
                                    <p class="text-xs sm:text-sm text-gray-500">Local Government Unit Certificate</p>
                                </div>
                                @if ($building->LGU_cert)
                                    <a href="{{ asset('storage/' . $building->LGU_cert) }}" target="_blank"
                                        class="inline-flex items-center justify-center px-3 py-2 bg-purple-100 text-purple-700 rounded-md hover:bg-purple-200 transition-colors duration-200 text-sm font-medium w-full sm:w-auto sm:ml-3 min-h-[36px]">
                                        <i class="fas fa-eye mr-1 text-xs"></i>
                                        <span>View</span>
                                    </a>
                                @else
                                    <span class="inline-flex items-center justify-center px-3 py-2 bg-gray-100 text-gray-500 rounded-md text-sm w-full sm:w-auto sm:ml-3 min-h-[36px]">N/A</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-4 sm:space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('admin.buildings.rooms.index', $building) }}"
                            class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium min-h-[44px] flex items-center justify-center">
                            <i class="fas fa-door-open mr-2 text-xs sm:text-sm"></i>
                            <span>View Rooms</span>
                        </a>
                        <a href="{{ route('admin.buildings.items.index', $building) }}"
                            class="w-full px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm font-medium min-h-[44px] flex items-center justify-center">
                            <i class="fas fa-boxes mr-2 text-xs sm:text-sm"></i>
                            <span>View Items</span>
                        </a>
                    </div>
                </div>

                <!-- Building Summary -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">Building Summary</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Created:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->created_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Last Updated:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->updated_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center gap-2">
                            <span class="text-gray-600 flex-shrink-0">Status:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 flex-shrink-0">
                                Active
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Building Details Overview -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">Details Overview</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Classification:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->classification ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Physical Condition:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->physical_condition ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Date Acquired:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->acquisition_date ? $building->acquisition_date->format('M j, Y') : 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Specific Use:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->specific_use ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Estimated Occupants:</span>
                            <span class="text-gray-900 text-right break-words">{{ $building->estimated_occupants ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if($building->latitude && $building->longitude)
                var map = L.map('buildingMap').setView([{{ $building->latitude }}, {{ $building->longitude }}], 16);

                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=bZpmItn2cuWjeIdpgbH5', {
                    attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a>',
                    maxZoom: 18
                }).addTo(map);

                // Create custom marker icon
                var buildingIcon = L.divIcon({
                    html: '<i class="fas fa-building text-blue-600"></i>',
                    iconSize: [20, 20],
                    className: 'custom-div-icon'
                });

                L.marker([{{ $building->latitude }}, {{ $building->longitude }}], {icon: buildingIcon})
                    .addTo(map)
                    .bindPopup(`
                        <div class="text-center">
                            <h3 class="font-semibold text-gray-900 mb-2">{{ $building->name }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ $building->address ?? 'Address not available' }}</p>
                            <div class="text-xs text-gray-500">
                                <div>{{ $building->latitude }}, {{ $building->longitude }}</div>
                            </div>
                        </div>
                    `)
                    .openPopup();
            @endif
        });
    </script>

    <!-- Custom marker styling -->
    <style>
        .custom-div-icon {
            background: white;
            border: 2px solid #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .leaflet-popup-content-wrapper {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .leaflet-popup-tip {
            background: white;
        }

        .leaflet-container {
            font-family: inherit;
        }
    </style>
@endsection
