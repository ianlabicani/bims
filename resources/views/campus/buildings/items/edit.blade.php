@extends('campus.shell')

@section('campus-content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                <a href="{{ route('campus.dashboard.index') }}" class="hover:text-blue-600">Dashboard</a>
                <span>/</span>
                <a href="{{ route('campus.buildings.show', $building) }}" class="hover:text-blue-600">{{ $building->name }}</a>
                <span>/</span>
                <a href="{{ route('campus.buildings.items.index', $building) }}" class="hover:text-blue-600">Items</a>
                <span>/</span>
                <span class="text-gray-900">Edit {{ $item->name }}</span>
            </nav>

            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Edit Item</h1>
                    <p class="text-gray-600 mt-1">Update item details for {{ $building->name }}</p>
                </div>
                <a href="{{ route('campus.buildings.items.show', [$building, $item]) }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                    <i class="fas fa-eye mr-2"></i>View Item
                </a>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <form action="{{ route('campus.buildings.items.update', [$building, $item]) }}" method="POST" class="divide-y divide-gray-200">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Basic Information</h3>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Item Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Item Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name', $item->name) }}"
                                   required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Serial Number -->
                        <div>
                            <label for="serial_number" class="block text-sm font-medium text-gray-700 mb-2">
                                Serial Number
                            </label>
                            <input type="text"
                                   name="serial_number"
                                   id="serial_number"
                                   value="{{ old('serial_number', $item->serial_number) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('serial_number') border-red-500 @enderror">
                            @error('serial_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                Quantity <span class="text-red-500">*</span>
                            </label>
                            <input type="number"
                                   name="quantity"
                                   id="quantity"
                                   value="{{ old('quantity', $item->quantity) }}"
                                   min="1"
                                   required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('quantity') border-red-500 @enderror">
                            @error('quantity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Acquisition Cost -->
                        <div>
                            <label for="acquisition_cost" class="block text-sm font-medium text-gray-700 mb-2">
                                Acquisition Cost (₱)
                            </label>
                            <input type="number"
                                   name="acquisition_cost"
                                   id="acquisition_cost"
                                   value="{{ old('acquisition_cost', $item->acquisition_cost) }}"
                                   step="0.01"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('acquisition_cost') border-red-500 @enderror">
                            @error('acquisition_cost')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Room -->
                        <div>
                            <label for="room_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Room
                            </label>
                            <select name="room_id"
                                    id="room_id"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('room_id') border-red-500 @enderror">
                                <option value="">Select a room</option>
                                @foreach($building->rooms as $room)
                                    <option value="{{ $room->id }}" {{ old('room_id', $item->room_id) == $room->id ? 'selected' : '' }}>
                                        {{ $room->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                Specific Location
                            </label>
                            <input type="text"
                                   name="location"
                                   id="location"
                                   value="{{ old('location', $item->location) }}"
                                   placeholder="e.g., Near window, Corner desk"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('location') border-red-500 @enderror">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea name="description"
                                  id="description"
                                  rows="4"
                                  placeholder="Describe the item, its condition, and any relevant details..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $item->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Inventory Information -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Inventory Information</h3>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Acquired At -->
                        <div>
                            <label for="acquired_at" class="block text-sm font-medium text-gray-700 mb-2">
                                Date Acquired
                            </label>
                            <input type="date"
                                   name="acquired_at"
                                   id="acquired_at"
                                   value="{{ old('acquired_at', $item->acquired_at ? $item->acquired_at->format('Y-m-d') : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('acquired_at') border-red-500 @enderror">
                            @error('acquired_at')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Inventoried At -->
                        <div>
                            <label for="inventoried_at" class="block text-sm font-medium text-gray-700 mb-2">
                                Date Inventoried
                            </label>
                            <input type="date"
                                   name="inventoried_at"
                                   id="inventoried_at"
                                   value="{{ old('inventoried_at', $item->inventoried_at ? $item->inventoried_at->format('Y-m-d') : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('inventoried_at') border-red-500 @enderror">
                            @error('inventoried_at')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Accountable Officer -->
                        <div class="lg:col-span-2">
                            <label for="accountable_officer" class="block text-sm font-medium text-gray-700 mb-2">
                                Accountable Officer
                            </label>
                            <input type="text"
                                   name="accountable_officer"
                                   id="accountable_officer"
                                   value="{{ old('accountable_officer', $item->accountable_officer) }}"
                                   placeholder="Name of person responsible for this item"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('accountable_officer') border-red-500 @enderror">
                            @error('accountable_officer')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 flex items-center justify-between">
                    <a href="{{ route('campus.buildings.items.show', [$building, $item]) }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        Cancel
                    </a>
                    <div class="flex space-x-3">
                        <button type="reset"
                                class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            Reset
                        </button>
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>Update Item
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
