@extends('campus.shell')

@section('campus-content')
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-6 overflow-x-auto">
            <a href="{{ route('campus.dashboard') }}" class="hover:text-blue-600 transition-colors whitespace-nowrap">
                <i class="fas fa-home mr-1"></i>Dashboard
            </a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('campus.buildings.index') }}" class="hover:text-blue-600 transition-colors whitespace-nowrap">Buildings</a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('campus.buildings.show', $building) }}" class="hover:text-blue-600 transition-colors whitespace-nowrap truncate">
                {{ $building->name }}
            </a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-900 font-medium whitespace-nowrap">Rooms</span>
        </nav>

        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">
                        Rooms in {{ $building->name }}
                    </h1>
                    <p class="text-gray-600">Manage and organize rooms in this building</p>
                </div>
                @if($building->number_of_rooms && $rooms->count() >= $building->number_of_rooms)
                    <div class="inline-flex items-center px-4 py-3 bg-red-50 border border-red-200 rounded-lg text-red-700">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span class="font-medium">Room Limit Reached</span>
                    </div>
                @else
                    <a href="{{ route('campus.buildings.rooms.create', $building) }}"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        Add Room
                    </a>
                @endif
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="text-3xl font-bold text-blue-600">{{ $rooms->count() }}</div>
                    <div class="text-sm text-gray-600">Total Rooms</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="text-3xl font-bold text-green-600">{{ $rooms->sum(function($room) { return $room->items->count(); }) }}</div>
                    <div class="text-sm text-gray-600">Total Items</div>
                </div>
                @if($building->number_of_rooms)
                    <div class="bg-white rounded-lg shadow p-4">
                        <div class="text-3xl font-bold text-purple-600">{{ $building->number_of_rooms - $rooms->count() }}</div>
                        <div class="text-sm text-gray-600">Available Slots</div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Rooms Grid -->
        @if($rooms->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($rooms as $room)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
                        <!-- Room Header with Icon -->
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 text-white">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 bg-white bg-opacity-30 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-door-open text-xl text-blue-600"></i>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white text-blue-600">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Active
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ $room->name }}</h3>
                        </div>

                        <!-- Room Details -->
                        <div class="p-6 flex-grow">
                            <div class="space-y-4">
                                <!-- Description -->
                                @if($room->description)
                                    <div>
                                        <p class="text-sm text-gray-700 line-clamp-2">{{ $room->description }}</p>
                                    </div>
                                @endif

                                <!-- Building Reference -->
                                <div class="flex items-center text-sm text-gray-600 bg-gray-50 p-3 rounded-lg">
                                    <i class="fas fa-building mr-2 text-gray-400"></i>
                                    {{ $building->name }}
                                </div>

                                <!-- Stats Grid -->
                                <div class="grid grid-cols-2 gap-3 pt-4 border-t border-gray-200">
                                    <div class="text-center py-3 bg-blue-50 rounded-lg">
                                        <div class="text-2xl font-bold text-blue-600">{{ $room->items->count() }}</div>
                                        <div class="text-xs font-medium text-gray-700">Items</div>
                                    </div>
                                    <div class="text-center py-3 bg-green-50 rounded-lg">
                                        <div class="text-2xl font-bold text-green-600">{{ $room->items->sum('quantity') ?? 0 }}</div>
                                        <div class="text-xs font-medium text-gray-700">Units</div>
                                    </div>
                                </div>

                                <!-- Meta Information -->
                                <div class="text-xs text-gray-700 font-medium pt-3 border-t border-gray-200">
                                    <p><i class="fas fa-calendar mr-1 text-gray-500"></i>Created: {{ $room->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-3 mt-6 pt-4 border-t border-gray-200">
                                <a href="{{ route('campus.buildings.rooms.show', [$building, $room]) }}"
                                    class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors font-medium text-sm">
                                    <i class="fas fa-eye mr-1"></i>
                                    View
                                </a>
                                <a href="{{ route('campus.buildings.rooms.edit', [$building, $room]) }}"
                                    class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors font-medium text-sm">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-door-open text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No Rooms Yet</h3>
                <p class="text-gray-600 mb-8">
                    @if($building->number_of_rooms)
                        This building can have up to {{ $building->number_of_rooms }} rooms. Start by creating your first room.
                    @else
                        Add rooms to this building to get started with inventory management.
                    @endif
                </p>
                @if(!$building->number_of_rooms || $rooms->count() < $building->number_of_rooms)
                    <a href="{{ route('campus.buildings.rooms.create', $building) }}"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        Create First Room
                    </a>
                @else
                    <div class="inline-flex items-center justify-center px-6 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed font-medium">
                        <i class="fas fa-ban mr-2"></i>
                        Room Limit Reached
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection
