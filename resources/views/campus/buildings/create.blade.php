@extends('campus.shell')

@section('campus-content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />

    <div class="max-w-6xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-6 overflow-x-auto">
            <a href="{{ route('campus.dashboard') }}" class="hover:text-blue-600 transition-colors whitespace-nowrap">
                <i class="fas fa-home mr-1"></i>Dashboard
            </a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('campus.buildings.index') }}" class="hover:text-blue-600 transition-colors whitespace-nowrap">Buildings</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-900 font-medium whitespace-nowrap">Create</span>
        </nav>

        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">
                        Create New Building
                    </h1>
                    <p class="text-gray-600 mt-2">
                        Add a new building to the campus
                    </p>
                </div>
                <a href="{{ route('campus.buildings.index') }}"
                    class="inline-flex items-center px-4 py-2 sm:px-6 sm:py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Buildings
                </a>
            </div>

        </div>

        <!-- Form -->
        <form action="{{ route('campus.buildings.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content (2/3) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Section 1: Basic Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-building text-blue-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Basic Information</h2>
                                <p class="text-sm text-gray-600">Essential building details</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Building Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-asterisk text-red-500 text-xs mr-1"></i>Building Name
                                    </label>
                                    <input type="text" name="name" id="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Building Type -->
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Building Type
                                    </label>
                                    <input type="text" name="type" id="type"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('type') }}" placeholder="e.g., Classroom, Office, Laboratory">
                                    @error('type')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Department/Agency -->
                                <div>
                                    <label for="department_agency" class="block text-sm font-medium text-gray-700 mb-2">
                                        Department/Agency
                                    </label>
                                    <input type="text" name="department_agency" id="department_agency"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('department_agency') }}">
                                    @error('department_agency')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- College/Office Assigned -->
                                <div>
                                    <label for="college_office_assigned" class="block text-sm font-medium text-gray-700 mb-2">
                                        College/Office Assigned
                                    </label>
                                    <input type="text" name="college_office_assigned" id="college_office_assigned"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('college_office_assigned') }}">
                                    @error('college_office_assigned')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address
                                </label>
                                <input type="text" name="address" id="address"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    value="{{ old('address') }}" placeholder="Street address">
                                @error('address')
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
                                    placeholder="Building description...">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Building Infrastructure -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                                <i class="fas fa-hammer text-purple-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Infrastructure & Condition</h2>
                                <p class="text-sm text-gray-600">Building structure and current state</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Floor Area -->
                                <div>
                                    <label for="floor_area" class="block text-sm font-medium text-gray-700 mb-2">
                                        Floor Area (sq.m)
                                    </label>
                                    <input type="text" name="floor_area" id="floor_area"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('floor_area') }}">
                                    @error('floor_area')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Number of Floors -->
                                <div>
                                    <label for="number_of_floors" class="block text-sm font-medium text-gray-700 mb-2">
                                        Number of Floors
                                    </label>
                                    <input type="number" name="number_of_floors" id="number_of_floors" min="1"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('number_of_floors') }}">
                                    @error('number_of_floors')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Number of Rooms -->
                                <div>
                                    <label for="number_of_rooms" class="block text-sm font-medium text-gray-700 mb-2">
                                        Number of Rooms
                                    </label>
                                    <input type="number" name="number_of_rooms" id="number_of_rooms" min="0"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('number_of_rooms') }}">
                                    @error('number_of_rooms')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Number of Comfort Rooms -->
                                <div>
                                    <label for="number_of_CRs" class="block text-sm font-medium text-gray-700 mb-2">
                                        Number of Comfort Rooms
                                    </label>
                                    <input type="number" name="number_of_CRs" id="number_of_CRs" min="0"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('number_of_CRs') }}">
                                    @error('number_of_CRs')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Classification -->
                            <div>
                                <label for="classification" class="block text-sm font-medium text-gray-700 mb-2">
                                    Building Classification
                                </label>
                                <select name="classification" id="classification"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <option value="">Select Classification</option>
                                    <option value="concrete" {{ old('classification') === 'concrete' ? 'selected' : '' }}>Concrete</option>
                                    <option value="semi-concrete" {{ old('classification') === 'semi-concrete' ? 'selected' : '' }}>Semi-concrete</option>
                                    <option value="wooden" {{ old('classification') === 'wooden' ? 'selected' : '' }}>Wooden</option>
                                    <option value="other" {{ old('classification') === 'other' ? 'selected' : '' }}>Others (specify)</option>
                                </select>
                                @error('classification')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Physical Condition -->
                            <div>
                                <label for="physical_condition" class="block text-sm font-medium text-gray-700 mb-2">
                                    Physical Condition
                                </label>
                                <select name="physical_condition" id="physical_condition"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <option value="">Select Condition</option>
                                    <option value="good" {{ old('physical_condition') === 'good' ? 'selected' : '' }}>Good</option>
                                    <option value="needs repair" {{ old('physical_condition') === 'needs repair' ? 'selected' : '' }}>Needs Repair</option>
                                    <option value="needs rehabilitation" {{ old('physical_condition') === 'needs rehabilitation' ? 'selected' : '' }}>Needs Rehabilitation</option>
                                    <option value="condemnable" {{ old('physical_condition') === 'condemnable' ? 'selected' : '' }}>Condemnable</option>
                                </select>
                                @error('physical_condition')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Condition Description -->
                            <div>
                                <label for="condition_description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Condition Description
                                </label>
                                <textarea name="condition_description" id="condition_description" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Describe the current condition...">{{ old('condition_description') }}</textarea>
                                @error('condition_description')
                                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Location Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Location Details</h2>
                                <p class="text-sm text-gray-600">Geographic and address information</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Street -->
                                <div>
                                    <label for="location_street" class="block text-sm font-medium text-gray-700 mb-2">
                                        Street
                                    </label>
                                    <input type="text" name="location_street" id="location_street"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('location_street') }}">
                                </div>

                                <!-- Barangay -->
                                <div>
                                    <label for="location_brgy" class="block text-sm font-medium text-gray-700 mb-2">
                                        Barangay
                                    </label>
                                    <input type="text" name="location_brgy" id="location_brgy"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('location_brgy') }}">
                                </div>

                                <!-- Municipality -->
                                <div>
                                    <label for="location_municipality" class="block text-sm font-medium text-gray-700 mb-2">
                                        Municipality
                                    </label>
                                    <input type="text" name="location_municipality" id="location_municipality"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('location_municipality') }}">
                                </div>

                                <!-- Province -->
                                <div>
                                    <label for="location_province" class="block text-sm font-medium text-gray-700 mb-2">
                                        Province
                                    </label>
                                    <input type="text" name="location_province" id="location_province"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('location_province') }}">
                                </div>
                            </div>

                            <!-- Coordinates -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <p class="text-sm text-blue-800 mb-4">Click on the map below to set building coordinates</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                    <div>
                                        <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">
                                            Latitude
                                        </label>
                                        <input type="text" name="latitude" id="latitude"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            value="{{ old('latitude') }}" readonly>
                                    </div>
                                    <div>
                                        <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">
                                            Longitude
                                        </label>
                                        <input type="text" name="longitude" id="longitude"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            value="{{ old('longitude') }}" readonly>
                                    </div>
                                </div>
                                <div class="w-full h-80 rounded-lg overflow-hidden border border-gray-300" id="buildingMap"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Certificates (Required Upload) -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-4">
                                <i class="fas fa-certificate text-yellow-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Certificates</h2>
                                <p class="text-sm text-gray-600">Required compliance documentation</p>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 mb-6">All four certificates must be uploaded to create a building. Accepted formats: PDF, JPEG, PNG, JPG (Max 5MB each)</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- CSU Certificate -->
                            <div class="border-2 border-dashed border-yellow-300 rounded-lg p-6 hover:border-yellow-500 hover:bg-yellow-50 transition-all">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-file-pdf text-yellow-600 text-3xl mb-3"></i>
                                    <label class="text-sm font-semibold text-gray-700 mb-2">CSU Certificate</label>
                                    <input type="file" id="CSU_cert" name="CSU_cert" accept=".pdf,.jpeg,.png,.jpg" required
                                        class="hidden" onchange="updateFileName(this)">
                                    <button type="button" onclick="document.getElementById('CSU_cert').click()"
                                        class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors text-sm font-medium">
                                        Choose File
                                    </button>
                                    <p class="text-xs text-gray-600 mt-3 text-center" id="CSU_cert_name">No file chosen</p>
                                </div>
                                @error('CSU_cert')
                                    <p class="text-red-500 text-sm mt-2 text-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- FIRE Certificate -->
                            <div class="border-2 border-dashed border-red-300 rounded-lg p-6 hover:border-red-500 hover:bg-red-50 transition-all">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-file-pdf text-red-600 text-3xl mb-3"></i>
                                    <label class="text-sm font-semibold text-gray-700 mb-2">Fire Safety Certificate</label>
                                    <input type="file" id="FIRE_cert" name="FIRE_cert" accept=".pdf,.jpeg,.png,.jpg" required
                                        class="hidden" onchange="updateFileName(this)">
                                    <button type="button" onclick="document.getElementById('FIRE_cert').click()"
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
                                        Choose File
                                    </button>
                                    <p class="text-xs text-gray-600 mt-3 text-center" id="FIRE_cert_name">No file chosen</p>
                                </div>
                                @error('FIRE_cert')
                                    <p class="text-red-500 text-sm mt-2 text-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Occupancy Certificate -->
                            <div class="border-2 border-dashed border-purple-300 rounded-lg p-6 hover:border-purple-500 hover:bg-purple-50 transition-all">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-file-pdf text-purple-600 text-3xl mb-3"></i>
                                    <label class="text-sm font-semibold text-gray-700 mb-2">Occupancy Certificate</label>
                                    <input type="file" id="OCCUPANCY_cert" name="OCCUPANCY_cert" accept=".pdf,.jpeg,.png,.jpg" required
                                        class="hidden" onchange="updateFileName(this)">
                                    <button type="button" onclick="document.getElementById('OCCUPANCY_cert').click()"
                                        class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                                        Choose File
                                    </button>
                                    <p class="text-xs text-gray-600 mt-3 text-center" id="OCCUPANCY_cert_name">No file chosen</p>
                                </div>
                                @error('OCCUPANCY_cert')
                                    <p class="text-red-500 text-sm mt-2 text-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- LGU Certificate -->
                            <div class="border-2 border-dashed border-green-300 rounded-lg p-6 hover:border-green-500 hover:bg-green-50 transition-all">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-file-pdf text-green-600 text-3xl mb-3"></i>
                                    <label class="text-sm font-semibold text-gray-700 mb-2">LGU Certificate</label>
                                    <input type="file" id="LGU_cert" name="LGU_cert" accept=".pdf,.jpeg,.png,.jpg" required
                                        class="hidden" onchange="updateFileName(this)">
                                    <button type="button" onclick="document.getElementById('LGU_cert').click()"
                                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-medium">
                                        Choose File
                                    </button>
                                    <p class="text-xs text-gray-600 mt-3 text-center" id="LGU_cert_name">No file chosen</p>
                                </div>
                                @error('LGU_cert')
                                    <p class="text-red-500 text-sm mt-2 text-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Upload Requirements Info -->
                        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h3 class="font-semibold text-gray-900 mb-2 flex items-center">
                                <i class="fas fa-info-circle text-blue-600 mr-2"></i>Upload Requirements
                            </h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li><i class="fas fa-check text-green-600 mr-2"></i>All 4 certificates are <strong>required</strong></li>
                                <li><i class="fas fa-check text-green-600 mr-2"></i>Accepted formats: PDF, JPEG, PNG, JPG</li>
                                <li><i class="fas fa-check text-green-600 mr-2"></i>Maximum 5MB per file (20MB total)</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Section 5: Acquisition Information -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                                <i class="fas fa-file-contract text-green-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Acquisition Information</h2>
                                <p class="text-sm text-gray-600">How and when the building was acquired</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Acquisition Mode -->
                                <div>
                                    <label for="acquisition_mode" class="block text-sm font-medium text-gray-700 mb-2">
                                        Mode of Acquisition
                                    </label>
                                    <select name="acquisition_mode" id="acquisition_mode"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        <option value="">Select Mode</option>
                                        <option value="construction" {{ old('acquisition_mode') === 'construction' ? 'selected' : '' }}>Construction</option>
                                        <option value="purchase" {{ old('acquisition_mode') === 'purchase' ? 'selected' : '' }}>Purchase</option>
                                        <option value="donation" {{ old('acquisition_mode') === 'donation' ? 'selected' : '' }}>Donation</option>
                                        <option value="transfer" {{ old('acquisition_mode') === 'transfer' ? 'selected' : '' }}>Transfer</option>
                                        <option value="other" {{ old('acquisition_mode') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('acquisition_mode')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Acquisition Date -->
                                <div>
                                    <label for="acquisition_date" class="block text-sm font-medium text-gray-700 mb-2">
                                        Date of Acquisition
                                    </label>
                                    <input type="date" name="acquisition_date" id="acquisition_date"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('acquisition_date') }}">
                                    @error('acquisition_date')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Estimated Fund -->
                                <div>
                                    <label for="estimated_fund" class="block text-sm font-medium text-gray-700 mb-2">
                                        Estimated Fund (₱)
                                    </label>
                                    <input type="number" name="estimated_fund" id="estimated_fund" step="0.01" min="0"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('estimated_fund') }}">
                                    @error('estimated_fund')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Date Completed -->
                                <div>
                                    <label for="completed_at" class="block text-sm font-medium text-gray-700 mb-2">
                                        Date Completed
                                    </label>
                                    <input type="date" name="completed_at" id="completed_at"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('completed_at') }}">
                                    @error('completed_at')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Registered Name -->
                                <div>
                                    <label for="registered_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        In Whose Name Registered
                                    </label>
                                    <input type="text" name="registered_name" id="registered_name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('registered_name') }}">
                                    @error('registered_name')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Land Ownership Status -->
                                <div>
                                    <label for="land_ownership_status" class="block text-sm font-medium text-gray-700 mb-2">
                                        Land Ownership Status
                                    </label>
                                    <input type="text" name="land_ownership_status" id="land_ownership_status"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        value="{{ old('land_ownership_status') }}">
                                    @error('land_ownership_status')
                                        <p class="text-red-500 text-sm mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar (1/3) -->
                <div class="space-y-6">
                    <!-- Help Section -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-lightbulb text-blue-600 mr-2"></i>Need Help?
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Fields marked with <span class="text-red-500">*</span> are required</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Use the map to set exact coordinates</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Save periodically to avoid losing data</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 pt-8 border-t border-gray-200">
                <a href="{{ route('campus.buildings.index') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fas fa-save mr-2"></i>
                    Create Building
                </button>
            </div>
        </form>
    </div>

    <!-- Leaflet Map Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script>
        function updateFileName(input) {
            const fileName = input.files[0]?.name || 'No file chosen';
            const nameSpan = document.getElementById(input.id + '_name');
            nameSpan.textContent = fileName;
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize map
            const mapElement = document.getElementById('buildingMap');
            if (!mapElement) return;

            const lat = parseFloat(document.getElementById('latitude').value) || 12.8797;
            const lng = parseFloat(document.getElementById('longitude').value) || 121.7740;

            const map = L.map('buildingMap').setView([lat, lng], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            let marker = null;
            if (lat && lng) {
                marker = L.marker([lat, lng]).addTo(map);
            }

            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;

                document.getElementById('latitude').value = lat.toFixed(6);
                document.getElementById('longitude').value = lng.toFixed(6);

                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker([lat, lng]).addTo(map);
            });
        });
    </script>    <style>
        #buildingMap {
            border-radius: 0.5rem;
        }
    </style>
@endsection
