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
            <a href="{{ route('admin.buildings.rooms.index', $building) }}" class="hover:text-gray-700">Rooms</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900 font-medium whitespace-nowrap">{{ $room->name }}</span>
        </nav>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900">{{ $room->name }}</h1>
            <p class="text-gray-600 mt-2">in <a href="{{ route('admin.buildings.show', $room->building) }}" class="text-blue-600 hover:text-blue-800">{{ $room->building->name }}</a></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                <!-- Room Details Card -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Room Details</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-4">
                            @if($room->description)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Description</label>
                                    <p class="text-gray-900 text-sm sm:text-base break-words leading-relaxed">
                                        {{ $room->description }}</p>
                                </div>
                            @endif
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Building</label>
                                <p class="text-gray-900 text-sm sm:text-base">
                                    <a href="{{ route('admin.buildings.show', $room->building) }}"
                                        class="text-blue-600 hover:text-blue-800 underline font-medium">
                                        {{ $room->building->name }}
                                    </a>
                                </p>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Created</label>
                                    <p class="text-gray-900 text-sm sm:text-base">{{ $room->created_at->format('M j, Y') }}
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                                    <p class="text-gray-900 text-sm sm:text-base">{{ $room->updated_at->format('M j, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Statistics -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 mb-4">Room Statistics</h2>
                    <div class="grid grid-cols-1 gap-2 sm:gap-4">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 sm:p-3 lg:p-4 text-center">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-blue-600">{{ $room->items->count() }}
                            </div>
                            <div class="text-xs sm:text-sm text-blue-800 mt-1">Total Items</div>
                        </div>
                    </div>
                </div>

                <!-- Items in Room -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-2">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900">Items in this Room</h2>
                        <a href="{{ route('admin.buildings.items.create', ["building" => $room->building, "room" => $room]) }}"
                            class="inline-flex items-center justify-center px-3 py-2 sm:px-4 sm:py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                            <i class="fas fa-plus mr-2 text-xs sm:text-sm"></i>
                            <span class="truncate">Add Item</span>
                        </a>
                    </div>

                    @if($room->items && $room->items->count() > 0)
                        <!-- Mobile-first card layout for items -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($room->items as $item)
                                <div
                                    class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <!-- Item Image Placeholder -->
                                    <div
                                        class="w-full h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg mb-3 flex items-center justify-center">
                                        <div class="text-center">
                                            <i class="fas fa-box text-2xl text-gray-400 mb-1"></i>
                                            <p class="text-gray-500 text-xs">Item Image</p>
                                        </div>
                                    </div>

                                    <!-- Item Info -->
                                    <div class="space-y-2">
                                        <div class="flex items-start justify-between gap-2">
                                            <h3 class="font-medium text-gray-900 text-sm break-words line-clamp-2">{{ $item->name }}
                                            </h3>
                                        </div>

                                        @if($item->category)
                                            <p class="text-xs text-gray-600">
                                                <i class="fas fa-tag mr-1"></i>
                                                {{ $item->category }}
                                            </p>
                                        @endif

                                        <!-- Item Actions -->
                                        <div class="flex gap-2 pt-2 border-t border-gray-200">
                                            <a href="{{ route('admin.buildings.items.show', $item) }}"
                                                class="flex-1 inline-flex items-center justify-center px-2 py-1.5 bg-blue-100 text-blue-700 rounded text-xs font-medium hover:bg-blue-200 transition-colors">
                                                <i class="fas fa-eye mr-1"></i>
                                                View
                                            </a>
                                            <a href="{{ route('admin.buildings.items.edit', $item) }}"
                                                class="flex-1 inline-flex items-center justify-center px-2 py-1.5 bg-indigo-100 text-indigo-700 rounded text-xs font-medium hover:bg-indigo-200 transition-colors">
                                                <i class="fas fa-edit mr-1"></i>
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-box-open text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No items found</h3>
                            <p class="text-gray-500 mb-4 text-sm sm:text-base">This room doesn't have any items yet.</p>
                            <a href="{{ route('admin.buildings.items.create', ["building" => $room->building, "room" => $room]) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                                <i class="fas fa-plus mr-2"></i>
                                Add First Item
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-4 sm:space-y-6">
                <!-- Quick Actions Card -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('admin.buildings.rooms.edit', [$room->building, $room]) }}"
                            class="w-full inline-flex items-center justify-center px-3 py-2.5 sm:px-4 sm:py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                            <i class="fas fa-edit mr-2 text-xs sm:text-sm"></i>
                            <span class="truncate">Edit Room</span>
                        </a>
                        <a href="{{ route('admin.buildings.items.create', ["building" => $room->building, "room" => $room]) }}"
                            class="w-full inline-flex items-center justify-center px-3 py-2.5 sm:px-4 sm:py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                            <i class="fas fa-plus mr-2 text-xs sm:text-sm"></i>
                            <span class="truncate">Add Item</span>
                        </a>
                        <a href="{{ route('admin.buildings.show', $room->building) }}"
                            class="w-full inline-flex items-center justify-center px-3 py-2.5 sm:px-4 sm:py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium min-h-[44px]">
                            <i class="fas fa-building mr-2 text-xs sm:text-sm"></i>
                            <span class="truncate">View Building</span>
                        </a>
                    </div>
                </div>

                <!-- Room Summary Card -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">Room Summary</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Total Items:</span>
                            <span class="text-gray-900 text-right font-medium">{{ $room->items->count() }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Building:</span>
                            <span class="text-gray-900 text-right break-words">{{ $room->building->name }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Created:</span>
                            <span
                                class="text-gray-900 text-right break-words">{{ $room->created_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-start gap-2">
                            <span class="text-gray-600 flex-shrink-0">Last Updated:</span>
                            <span
                                class="text-gray-900 text-right break-words">{{ $room->updated_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center gap-2 pt-2 border-t border-gray-200">
                            <span class="text-gray-600 flex-shrink-0">Status:</span>
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 flex-shrink-0">
                                Active
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
