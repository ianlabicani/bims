@extends('campus.shell')

@section('campus-content')
    <div class="max-w-6xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
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
            <a href="{{ route('campus.buildings.items.index', $building) }}" class="hover:text-blue-600 transition-colors whitespace-nowrap">Items</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-900 font-medium whitespace-nowrap">{{ isset($item) ? 'Edit' : 'Create' }}</span>
        </nav>

        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">
                        {{ isset($item) ? 'Edit Item' : 'Add New Item' }}
                    </h1>
                    <p class="text-gray-600 mt-2">
                        {{ isset($item) ? 'Update item information' : 'Add a new item to ' }}{{ $building->name }}
                    </p>
                </div>
                <a href="{{ route('campus.buildings.items.index', $building) }}"
                    class="inline-flex items-center px-4 py-2 sm:px-6 sm:py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Items
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ isset($item) ? route('campus.buildings.items.update', [$building, $item]) : route('campus.buildings.items.store', $building) }}"
            method="POST" class="space-y-6">
            @csrf
            @if(isset($item))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content (2/3) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Section 1: Basic Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-box text-blue-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Item Details</h2>
                                <p class="text-sm text-gray-600">Basic information about the item</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Item Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Item Name
                                </label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('name', $item->name ?? '') }}" required placeholder="e.g., Projector, Desk, Computer">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Serial Number -->
                            <div>
                                <label for="serial_number" class="block text-sm font-medium text-gray-700 mb-2">
                                    Serial Number
                                </label>
                                <input type="text" name="serial_number" id="serial_number"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('serial_number', $item->serial_number ?? '') }}" placeholder="Equipment serial number">
                                @error('serial_number')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description
                                </label>
                                <textarea name="description" id="description" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Item description, specifications, or notes...">{{ old('description', $item->description ?? '') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Location Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Location & Assignment</h2>
                                <p class="text-sm text-gray-600">Where the item is located</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Room -->
                            <div>
                                <label for="room_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Room
                                </label>
                                <select name="room_id" id="room_id"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <option value="">Not assigned to a room</option>
                                    @foreach($building->rooms as $room)
                                        <option value="{{ $room->id }}" {{ old('room_id', $item->room_id ?? '') == $room->id ? 'selected' : '' }}>
                                            {{ $room->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Specific Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Specific Location
                                </label>
                                <input type="text" name="location" id="location"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('location', $item->location ?? '') }}" required placeholder="e.g., Shelf A2, Cabinet 3">
                                @error('location')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Financial Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                                <i class="fas fa-money-bill text-green-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Financial Information</h2>
                                <p class="text-sm text-gray-600">Cost and quantity details</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Quantity -->
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Quantity
                                    </label>
                                    <input type="number" name="quantity" id="quantity" min="1"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('quantity', $item->quantity ?? 1) }}" required>
                                    @error('quantity')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Acquisition Cost -->
                                <div>
                                    <label for="acquisition_cost" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Unit Cost (₱)
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="acquisition_cost" id="acquisition_cost" step="0.01" min="0"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            value="{{ old('acquisition_cost', $item->acquisition_cost ?? '') }}" required placeholder="0.00">
                                    </div>
                                    @error('acquisition_cost')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Total Value Display -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700 font-medium">Total Value:</span>
                                    <span class="text-2xl font-bold text-blue-600">
                                        ₱<span id="totalValue">0.00</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Tracking Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-check text-purple-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Tracking Information</h2>
                                <p class="text-sm text-gray-600">Acquisition and inventory dates</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Acquired Date -->
                                <div>
                                    <label for="acquired_at" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Date Acquired
                                    </label>
                                    <input type="date" name="acquired_at" id="acquired_at"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('acquired_at', isset($item) && $item->acquired_at ? $item->acquired_at->format('Y-m-d') : '') }}" required>
                                    @error('acquired_at')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Inventoried Date -->
                                <div>
                                    <label for="inventoried_at" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Date Inventoried
                                    </label>
                                    <input type="date" name="inventoried_at" id="inventoried_at"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('inventoried_at', isset($item) && $item->inventoried_at ? $item->inventoried_at->format('Y-m-d') : '') }}" required>
                                    @error('inventoried_at')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Accountable Officer -->
                            <div>
                                <label for="accountable_officer" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Accountable Officer
                                </label>
                                <input type="text" name="accountable_officer" id="accountable_officer"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('accountable_officer', $item->accountable_officer ?? '') }}" required placeholder="Full name">
                                @error('accountable_officer')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar (1/3) -->
                <div class="space-y-6">
                    <!-- Quick Info -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>Building Info
                        </h3>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Building:</span>
                                <span class="font-medium">{{ $building->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Items:</span>
                                <span class="font-bold text-blue-600">{{ $building->items_count ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Rooms:</span>
                                <span class="font-bold text-blue-600">{{ $building->number_of_rooms ?? 0 }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Field Guidelines -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-lightbulb text-yellow-600 mr-2"></i>Tips
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Be specific with item name</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Include serial/model numbers</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Enter accurate costs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Assign to correct room</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Form Completion -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="font-semibold text-gray-900 mb-4">Required Fields</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Item Name</span>
                                <span id="status-name" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Location</span>
                                <span id="status-location" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Quantity</span>
                                <span id="status-quantity" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Cost</span>
                                <span id="status-cost" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>

                    @if(isset($item))
                        <!-- Item History -->
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg shadow-lg p-6 border border-purple-200">
                            <h3 class="font-semibold text-gray-900 mb-4">Item History</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Created:</span>
                                    <span class="font-medium">{{ $item->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Updated:</span>
                                    <span class="font-medium">{{ $item->updated_at->format('M d, Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Current Room:</span>
                                    <span class="font-medium">{{ $item->room?->name ?? 'Unassigned' }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 pt-8 border-t border-gray-200">
                <a href="{{ route('campus.buildings.items.index', $building) }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($item) ? 'Update Item' : 'Create Item' }}
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const costInput = document.getElementById('acquisition_cost');
            const nameInput = document.getElementById('name');
            const locationInput = document.getElementById('location');

            const updateTotalValue = () => {
                const quantity = parseFloat(quantityInput.value) || 0;
                const cost = parseFloat(costInput.value) || 0;
                const total = (quantity * cost).toFixed(2);
                document.getElementById('totalValue').textContent = new Intl.NumberFormat('en-PH', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(total);
            };

            const updateStatus = (elementId, hasValue) => {
                const element = document.getElementById(elementId);
                if (hasValue && hasValue.toString().trim()) {
                    element.innerHTML = '<i class="fas fa-check text-green-600"></i>';
                } else {
                    element.innerHTML = '<i class="fas fa-clock text-yellow-600"></i>';
                }
            };

            quantityInput.addEventListener('input', () => {
                updateTotalValue();
                updateStatus('status-quantity', quantityInput.value);
            });
            costInput.addEventListener('input', () => {
                updateTotalValue();
                updateStatus('status-cost', costInput.value);
            });
            nameInput.addEventListener('input', () => updateStatus('status-name', nameInput.value));
            locationInput.addEventListener('input', () => updateStatus('status-location', locationInput.value));

            // Initial calculations and status
            updateTotalValue();
            updateStatus('status-name', nameInput.value);
            updateStatus('status-location', locationInput.value);
            updateStatus('status-quantity', quantityInput.value);
            updateStatus('status-cost', costInput.value);
        });
    </script>
@endsection
