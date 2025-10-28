@extends('admin.shell')

@section('admin-content')
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-6 overflow-x-auto">
            <a href="{{ route('admin.buildings.index') }}" class="hover:text-gray-700">Dashboard</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('admin.buildings.index') }}" class="hover:text-gray-700">Buildings</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('admin.buildings.show', $building) }}" class="hover:text-gray-700">{{ $building->name }}</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900 font-medium whitespace-nowrap">Rooms</span>
        </nav>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900">Rooms in {{ $building->name }}</h1>
            <p class="text-gray-600 mt-2">Manage rooms within this building</p>
        </div>

        <!-- Rooms Grid -->
        @if($rooms->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($rooms as $room)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Room Image Placeholder -->
                        <div
                            class="w-full h-48 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center relative">
                            <div class="text-center">
                                <i class="fas fa-door-open text-4xl sm:text-5xl text-blue-300 mb-2"></i>
                                <p class="text-blue-600 font-medium text-sm">Room Photo</p>
                                <p class="text-blue-400 text-xs">No image available</p>
                            </div>
                        </div>

                        <!-- Room Info -->
                        <div class="p-4 sm:p-6">
                            <div class="space-y-3">
                                <!-- Room Name and Building -->
                                <div>
                                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-1 break-words">{{ $room->name }}
                                    </h3>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-building mr-1"></i>
                                        {{ $building->name }}
                                    </p>
                                </div>

                                <!-- Room Description -->
                                @if($room->description)
                                    <p class="text-sm text-gray-700 line-clamp-2 leading-relaxed">{{ $room->description }}</p>
                                @endif

                                <!-- Room Statistics -->
                                <div class="grid grid-cols-1 gap-2 pt-3 border-t border-gray-200">
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-blue-600">{{ $room->items->count() ?? 0 }}</div>
                                        <div class="text-xs text-gray-600">Total Items</div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2 pt-3">
                                    <a href="{{ route('admin.buildings.rooms.show', [$building, $room]) }}"
                                        class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200 text-sm font-medium">
                                        <i class="fas fa-eye mr-1 text-xs"></i>
                                        View
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-lg p-8 sm:p-12 text-center">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-door-open text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-2">No rooms found</h3>
                <p class="text-gray-500 mb-6 text-sm sm:text-base">
                    This building doesn't have any rooms yet.
                    @if($building->number_of_rooms)
                        You can create up to {{ $building->number_of_rooms }} rooms for this building.
                    @else
                        Create the first room to get started.
                    @endif
                </p>

            </div>
        @endif
    </div>
@endsection
