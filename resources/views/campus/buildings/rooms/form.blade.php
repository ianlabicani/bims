@extends('campus.shell')

@section('campus-content')
    <div class="max-w-4xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
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
            <a href="{{ route('campus.buildings.rooms.index', $building) }}" class="hover:text-blue-600 transition-colors whitespace-nowrap">Rooms</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-900 font-medium whitespace-nowrap">{{ isset($room) ? 'Edit' : 'Create' }}</span>
        </nav>

        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">
                        {{ isset($room) ? 'Edit Room' : 'Create New Room' }}
                    </h1>
                    <p class="text-gray-600 mt-2">
                        {{ isset($room) ? 'Update room information' : 'Add a new room to ' }}{{ $building->name }}
                    </p>
                </div>
                <a href="{{ route('campus.buildings.rooms.index', $building) }}"
                    class="inline-flex items-center px-4 py-2 sm:px-6 sm:py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Rooms
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ isset($room) ? route('campus.buildings.rooms.update', [$building, $room]) : route('campus.buildings.rooms.store', $building) }}"
            method="POST" class="space-y-6">
            @csrf
            @if(isset($room))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content (2/3) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Section 1: Basic Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-door-open text-blue-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Room Information</h2>
                                <p class="text-sm text-gray-600">Essential room details</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Room Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Room Name
                                </label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('name', $room->name ?? '') }}" required placeholder="e.g., Room 101, Conference Room A">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Building -->
                            <div>
                                <label for="building_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Building
                                </label>
                                <div class="px-4 py-2 border border-gray-300 rounded-lg bg-gray-50">
                                    <p class="text-gray-900 font-medium">{{ $building->name }}</p>
                                </div>
                            </div>

                            <!-- Room Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Room Type
                                </label>
                                <select name="type" id="type"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <option value="">Select Type</option>
                                    <option value="classroom" {{ old('type', $room->type ?? '') === 'classroom' ? 'selected' : '' }}>Classroom</option>
                                    <option value="laboratory" {{ old('type', $room->type ?? '') === 'laboratory' ? 'selected' : '' }}>Laboratory</option>
                                    <option value="office" {{ old('type', $room->type ?? '') === 'office' ? 'selected' : '' }}>Office</option>
                                    <option value="conference" {{ old('type', $room->type ?? '') === 'conference' ? 'selected' : '' }}>Conference Room</option>
                                    <option value="storage" {{ old('type', $room->type ?? '') === 'storage' ? 'selected' : '' }}>Storage</option>
                                    <option value="other" {{ old('type', $room->type ?? '') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('type')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Capacity -->
                            <div>
                                <label for="capacity" class="block text-sm font-medium text-gray-700 mb-2">
                                    Capacity (persons)
                                </label>
                                <input type="number" name="capacity" id="capacity" min="1"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('capacity', $room->capacity ?? '') }}" placeholder="e.g., 50">
                                @error('capacity')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description
                                </label>
                                <textarea name="description" id="description" rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Room description, features, or notes...">{{ old('description', $room->description ?? '') }}</textarea>
                                @error('description')
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
                                <span class="text-gray-600">Type:</span>
                                <span class="font-medium">{{ $building->type ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Rooms:</span>
                                <span class="font-bold text-blue-600">{{ $building->number_of_rooms ?? 0 }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Room Guidelines -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-lightbulb text-yellow-600 mr-2"></i>Guidelines
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Use descriptive room names</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Specify room capacity</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Add notes about features</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Select appropriate type</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Form Status -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="font-semibold text-gray-900 mb-4">Completion</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Room Name</span>
                                <span id="status-name" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Room Type</span>
                                <span id="status-type" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-gray-600">Capacity</span>
                                <span id="status-capacity" class="text-yellow-600"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>

                    @if(isset($room))
                        <!-- Current Room Stats -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg shadow-lg p-6 border border-green-200">
                            <h3 class="font-semibold text-gray-900 mb-4">Room Statistics</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Items:</span>
                                    <span class="font-bold text-green-600">{{ $room->items->count() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Utilization:</span>
                                    <span class="font-bold text-green-600">
                                        {{ $room->capacity ? round(($room->items->count() / $room->capacity) * 100) : 0 }}%
                                    </span>
                                </div>
                                <div class="pt-3 border-t border-green-200 mt-3">
                                    <div class="text-xs text-gray-600">
                                        Created: {{ $room->created_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 pt-8 border-t border-gray-200">
                <a href="{{ route('campus.buildings.rooms.index', $building) }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($room) ? 'Update Room' : 'Create Room' }}
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const typeSelect = document.getElementById('type');
            const capacityInput = document.getElementById('capacity');

            const updateStatus = (elementId, hasValue) => {
                const element = document.getElementById(elementId);
                if (hasValue && hasValue.toString().trim()) {
                    element.innerHTML = '<i class="fas fa-check text-green-600"></i>';
                } else {
                    element.innerHTML = '<i class="fas fa-clock text-yellow-600"></i>';
                }
            };

            nameInput.addEventListener('input', () => updateStatus('status-name', nameInput.value));
            typeSelect.addEventListener('change', () => updateStatus('status-type', typeSelect.value));
            capacityInput.addEventListener('input', () => updateStatus('status-capacity', capacityInput.value));

            // Initial status check
            updateStatus('status-name', nameInput.value);
            updateStatus('status-type', typeSelect.value);
            updateStatus('status-capacity', capacityInput.value);
        });
    </script>
@endsection
