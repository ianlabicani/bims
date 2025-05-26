@extends('campus.shell')

@section('campus-content')
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
        <!-- Header -->
        <div class="mb-6 sm:mb-8">
            <a href="{{ route('campus.buildings.show', $building) }}"
                class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200 mb-4 text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                <span class="hidden xs:inline">Back to Building</span>
                <span class="xs:hidden">Back</span>
            </a>

            <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                <div class="flex flex-col space-y-4">
                    <div>
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2 break-words">Rooms in
                            {{ $building->name }}</h1>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="text-sm sm:text-base text-gray-600">Manage rooms within this building</p>
                            @if($building->number_of_rooms)
                                <div class="flex items-center gap-2">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ $rooms->count() >= $building->number_of_rooms ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                        <i class="fas fa-door-open mr-1"></i>
                                        {{ $rooms->count() }}/{{ $building->number_of_rooms }} rooms
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Mobile-optimized action buttons -->
                    <div class="flex flex-col xs:flex-row gap-2 sm:gap-3">
                        @if($building->number_of_rooms && $rooms->count() >= $building->number_of_rooms)
                            <div class="flex-1 inline-flex items-center justify-center px-3 py-2.5 sm:px-4 sm:py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed text-sm font-medium min-h-[44px]"
                                title="Building has reached maximum room capacity">
                                <i class="fas fa-ban mr-2 text-xs sm:text-sm"></i>
                                <span class="truncate">Room Limit Reached</span>
                            </div>
                        @else
                            <a href="{{ route('campus.buildings.rooms.create', $building) }}"
                                class="flex-1 inline-flex items-center justify-center px-3 py-2.5 sm:px-4 sm:py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                                <i class="fas fa-plus mr-2 text-xs sm:text-sm"></i>
                                <span class="truncate">Add Room</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
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
                            <!-- Room Type Badge -->
                            @if($room->type)
                                <div class="absolute top-3 right-3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $room->type }}
                                    </span>
                                </div>
                            @endif
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

                                <!-- Room Details -->
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-users mr-1"></i>
                                        <span>Capacity: {{ $room->capacity ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <!-- Room Statistics -->
                                <div class="grid grid-cols-2 gap-2 pt-3 border-t border-gray-200">
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-blue-600">{{ $room->items->count() ?? 0 }}</div>
                                        <div class="text-xs text-gray-600">Total Items</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-green-600">
                                            {{ $room->items->where('status', 'active')->count() ?? 0 }}
                                        </div>
                                        <div class="text-xs text-gray-600">Active Items</div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2 pt-3">
                                    <a href="{{ route('campus.buildings.rooms.show', [$building, $room]) }}"
                                        class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200 text-sm font-medium">
                                        <i class="fas fa-eye mr-1 text-xs"></i>
                                        View
                                    </a>
                                    <a href="{{ route('campus.buildings.rooms.edit', [$building, $room]) }}"
                                        class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors duration-200 text-sm font-medium">
                                        <i class="fas fa-edit mr-1 text-xs"></i>
                                        Edit
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
                @if(!$building->number_of_rooms || $rooms->count() < $building->number_of_rooms)
                    <a href="{{ route('campus.buildings.rooms.create', $building) }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                        <i class="fas fa-plus mr-2"></i>
                        Add First Room
                    </a>
                @else
                    <div
                        class="inline-flex items-center justify-center px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed text-sm font-medium min-h-[44px]">
                        <i class="fas fa-ban mr-2"></i>
                        Room Limit Reached
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection
