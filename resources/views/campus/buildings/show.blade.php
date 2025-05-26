@extends('campus.shell')

@section('campus-content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('campus.buildings.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200 mb-4">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Buildings
            </a>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $building->name }}</h1>
                        <p class="text-gray-600">Building Information Details</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('campus.buildings.edit', $building) }}"
                            class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Building
                        </a>
                        <a href="{{ route('campus.buildings.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Add New Building
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Basic Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Description</label>
                                <p class="text-gray-900">{{ $building->description ?? 'No description available.' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Address</label>
                                <p class="text-gray-900">{{ $building->address ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Building Type</label>
                                <p class="text-gray-900">{{ $building->type ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Floor Area</label>
                                <p class="text-gray-900">{{ $building->floor_area ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Latitude</label>
                                <p class="text-gray-900">{{ $building->latitude ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Longitude</label>
                                <p class="text-gray-900">{{ $building->longitude ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">College/Office Assigned</label>
                                <p class="text-gray-900">{{ $building->college_office_assigned ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Date Completed</label>
                                <p class="text-gray-900">{{ $building->completed_at ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Building Statistics -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Building Statistics</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $building->number_of_floors ?? 0 }}</div>
                            <div class="text-sm text-blue-800">Floors</div>
                        </div>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $building->number_of_rooms ?? 0 }}</div>
                            <div class="text-sm text-green-800">Rooms</div>
                        </div>
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-purple-600">{{ $building->number_of_CRs ?? 0 }}</div>
                            <div class="text-sm text-purple-800">CRs</div>
                        </div>
                    </div>
                </div>

                <!-- Certificates -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Certificates</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-900">CSU Certificate</h3>
                                    <p class="text-sm text-gray-500">Civil State University Certificate</p>
                                </div>
                                @if ($building->CSU_cert)
                                    <a href="{{ asset('storage/' . $building->CSU_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        View
                                    </a>
                                @else
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-md text-sm">N/A</span>
                                @endif
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-900">Fire Certificate</h3>
                                    <p class="text-sm text-gray-500">Fire Safety Certificate</p>
                                </div>
                                @if ($building->FIRE_cert)
                                    <a href="{{ asset('storage/' . $building->FIRE_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        View
                                    </a>
                                @else
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-md text-sm">N/A</span>
                                @endif
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-900">Occupancy Certificate</h3>
                                    <p class="text-sm text-gray-500">Building Occupancy Permit</p>
                                </div>
                                @if ($building->OCCUPANCY_cert)
                                    <a href="{{ asset('storage/' . $building->OCCUPANCY_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        View
                                    </a>
                                @else
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-md text-sm">N/A</span>
                                @endif
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-900">LGU Certificate</h3>
                                    <p class="text-sm text-gray-500">Local Government Unit Certificate</p>
                                </div>
                                @if ($building->LGU_cert)
                                    <a href="{{ asset('storage/' . $building->LGU_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-700 rounded-md hover:bg-purple-200 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        View
                                    </a>
                                @else
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-md text-sm">N/A</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('campus.buildings.rooms.index', $building) }}"
                            class="block w-full px-4 py-3 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <i class="fas fa-door-open mr-2"></i>
                            View Rooms
                        </a>
                        <a href="{{ route('campus.buildings.items.index', $building) }}"
                            class="block w-full px-4 py-3 bg-green-600 text-white text-center rounded-lg hover:bg-green-700 transition-colors duration-200">
                            <i class="fas fa-boxes mr-2"></i>
                            View Items
                        </a>
                    </div>
                </div>

                <!-- Building Summary -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Building Summary</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Created:</span>
                            <span class="text-gray-900">{{ $building->created_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="text-gray-900">{{ $building->updated_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection