@extends('campus.shell')

@section('campus-content')
    <div class="max-w-6xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $room->name }}</h1>
            <div class="flex space-x-3">
                <a href="{{ route('campus.rooms.edit', $room) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                    <i class="fas fa-edit mr-2"></i>Edit Room
                </a>
                <a href="{{ route('campus.buildings.rooms.index', $building) }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Rooms
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Room Details -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Room Details</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Room Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $room->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Building</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="{{ route('campus.buildings.show', $room->building) }}"
                                    class="text-blue-600 hover:text-blue-800 underline">
                                    {{ $room->building->name }}
                                </a>
                            </p>
                        </div>

                        @if($room->description)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $room->description }}</p>
                            </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Created</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $room->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $room->updated_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Items in Room -->
                <div class="bg-white rounded-lg shadow-md p-6 mt-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Items in this Room</h2>
                        <a href="{{ route('campus.buildings.items.create') }}?room_id={{ $room->id }}"
                            class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md transition duration-150 ease-in-out text-sm">
                            <i class="fas fa-plus mr-1"></i>Add Item
                        </a>
                    </div>

                    @if($room->items && $room->items->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($room->items as $item)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->category ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                                        {{ $item->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ ucfirst($item->status ?? 'active') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('campus.buildings.items.show', $item) }}"
                                                    class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                                <a href="{{ route('campus.buildings.items.edit', $item) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="fas fa-box-open text-gray-400 text-4xl mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No items found</h3>
                            <p class="text-gray-500 mb-4">This room doesn't have any items yet.</p>
                            <a href="{{ route('campus.buildings.items.create') }}?room_id={{ $room->id }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                                Add First Item
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('campus.rooms.edit', $room) }}"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i>Edit Room
                        </a>
                        <a href="{{ route('campus.buildings.items.create') }}?room_id={{ $room->id }}"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>Add Item
                        </a>
                        <a href="{{ route('campus.buildings.show', $room->building) }}"
                            class="w-full bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out flex items-center justify-center">
                            <i class="fas fa-building mr-2"></i>View Building
                        </a>
                    </div>
                </div>

                <!-- Room Statistics -->
                <div class="bg-white rounded-lg shadow-md p-6 mt-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Room Statistics</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Total Items:</span>
                            <span class="text-sm font-medium text-gray-900">{{ $room->items->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Active Items:</span>
                            <span
                                class="text-sm font-medium text-green-600">{{ $room->items->where('status', 'active')->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Building:</span>
                            <span class="text-sm font-medium text-gray-900">{{ $room->building->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection