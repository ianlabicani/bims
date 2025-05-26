@extends('campus.shell')

@section('campus-content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Edit Building</h1>
                <p class="text-gray-600 mt-2">Update the details for {{ $building->name }}.</p>
            </div>

            <form action="{{ route('campus.buildings.update', $building) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Basic Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Building Name *</label>
                            <input type="text" name="name" id="name" value="{{ $building->name }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Building Type</label>
                            <input type="text" name="type" id="type" value="{{ $building->type }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="department_agency"
                                class="block text-sm font-medium text-gray-700 mb-2">Department/Agency</label>
                            <input type="text" name="department_agency" id="department_agency"
                                value="{{ $building->department_agency }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('department_agency')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="complete_agency_address"
                                class="block text-sm font-medium text-gray-700 mb-2">Complete Agency Address</label>
                            <input type="text" name="complete_agency_address" id="complete_agency_address"
                                value="{{ $building->complete_agency_address }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('complete_agency_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                            <input type="text" name="address" id="address" value="{{ $building->address }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $building->description }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Building Description -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description of Building</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="registered_name" class="block text-sm font-medium text-gray-700 mb-2">In Whose Name
                                Registered</label>
                            <input type="text" name="registered_name" id="registered_name"
                                value="{{ $building->registered_name }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('registered_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="classification"
                                class="block text-sm font-medium text-gray-700 mb-2">Classification</label>
                            <select name="classification" id="classification"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select Classification</option>
                                <option value="concrete" {{ $building->classification == 'concrete' ? 'selected' : '' }}>Concrete</option>
                                <option value="semi-concrete" {{ $building->classification == 'semi-concrete' ? 'selected' : '' }}>Semi-concrete</option>
                                <option value="wooden" {{ $building->classification == 'wooden' ? 'selected' : '' }}>Wooden</option>
                                <option value="other" {{ $building->classification == 'other' ? 'selected' : '' }}>Others (specify)</option>
                            </select>
                            @error('classification')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location Details -->
                        <div>
                            <label for="location_street" class="block text-sm font-medium text-gray-700 mb-2">Street</label>
                            <input type="text" name="location_street" id="location_street"
                                value="{{ $building->location_street }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('location_street')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location_brgy" class="block text-sm font-medium text-gray-700 mb-2">Barangay</label>
                            <input type="text" name="location_brgy" id="location_brgy"
                                value="{{ $building->location_brgy }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('location_brgy')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location_municipality"
                                class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                            <input type="text" name="location_municipality" id="location_municipality"
                                value="{{ $building->location_municipality }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('location_municipality')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location_province"
                                class="block text-sm font-medium text-gray-700 mb-2">Province</label>
                            <input type="text" name="location_province" id="location_province"
                                value="{{ $building->location_province }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('location_province')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="physical_condition" class="block text-sm font-medium text-gray-700 mb-2">Physical
                                Condition</label>
                            <select name="physical_condition" id="physical_condition"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select Condition</option>
                                <option value="good" {{ $building->physical_condition == 'good' ? 'selected' : '' }}>Good</option>
                                <option value="incomplete" {{ $building->physical_condition == 'incomplete' ? 'selected' : '' }}>Incomplete</option>
                                <option value="needs repair" {{ $building->physical_condition == 'needs repair' ? 'selected' : '' }}>Needs Repair</option>
                                <option value="condemnable" {{ $building->physical_condition == 'condemnable' ? 'selected' : '' }}>Condemnable</option>
                                <option value="needs rehabilitation" {{ $building->physical_condition == 'needs rehabilitation' ? 'selected' : '' }}>Needs Rehabilitation</option>
                                <option value="under construction" {{ $building->physical_condition == 'under construction' ? 'selected' : '' }}>Under Construction</option>
                            </select>
                            @error('physical_condition')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="condition_description" class="block text-sm font-medium text-gray-700 mb-2">Brief
                                Description of Condition</label>
                            <textarea name="condition_description" id="condition_description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $building->condition_description }}</textarea>
                            @error('condition_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="acquisition_date" class="block text-sm font-medium text-gray-700 mb-2">Date of
                                Acquisition</label>
                            <input type="date" name="acquisition_date" id="acquisition_date"
                                value="{{ $building->acquisition_date ? $building->acquisition_date->format('Y-m-d') : '' }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('acquisition_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="acquisition_mode" class="block text-sm font-medium text-gray-700 mb-2">Mode of
                                Acquisition</label>
                            <select name="acquisition_mode" id="acquisition_mode"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select Mode</option>
                                <option value="construction" {{ $building->acquisition_mode == 'construction' ? 'selected' : '' }}>Construction</option>
                                <option value="foreclosure" {{ $building->acquisition_mode == 'foreclosure' ? 'selected' : '' }}>Foreclosure</option>
                                <option value="purchase" {{ $building->acquisition_mode == 'purchase' ? 'selected' : '' }}>Purchase</option>
                                <option value="transfer" {{ $building->acquisition_mode == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                <option value="donation" {{ $building->acquisition_mode == 'donation' ? 'selected' : '' }}>Donation</option>
                                <option value="sequestration" {{ $building->acquisition_mode == 'sequestration' ? 'selected' : '' }}>Sequestration</option>
                                <option value="other" {{ $building->acquisition_mode == 'other' ? 'selected' : '' }}>Others (specify)</option>
                            </select>
                            @error('acquisition_mode')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="improvements" class="block text-sm font-medium text-gray-700 mb-2">Improvements
                                Undertaken</label>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="improvements[]" value="dividers"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->improvements && in_array('dividers', $building->improvements) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Dividers</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="improvements[]" value="ceiling"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->improvements && in_array('ceiling', $building->improvements) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Ceiling</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="improvements[]" value="fixtures"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->improvements && in_array('fixtures', $building->improvements) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Fixtures</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="improvements[]" value="flooding"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->improvements && in_array('flooding', $building->improvements) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Flooding</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="improvements[]" value="rooting"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->improvements && in_array('rooting', $building->improvements) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Rooting</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="improvements[]" value="other"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->improvements && in_array('other', $building->improvements) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Others (specify)</span>
                                    </label>
                                </div>
                            </div>
                            @error('improvements')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="existing_utilities" class="block text-sm font-medium text-gray-700 mb-2">Existing
                                Utilities</label>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="existing_utilities[]" value="power and light"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->existing_utilities && in_array('power and light', $building->existing_utilities) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Power and Light</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="existing_utilities[]" value="water"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->existing_utilities && in_array('water', $building->existing_utilities) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Water</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="existing_utilities[]" value="telephone"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->existing_utilities && in_array('telephone', $building->existing_utilities) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Telephone</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="existing_utilities[]" value="internet"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->existing_utilities && in_array('internet', $building->existing_utilities) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Internet</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="existing_utilities[]" value="sewage"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->existing_utilities && in_array('sewage', $building->existing_utilities) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Sewage</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="existing_utilities[]" value="other"
                                            class="form-checkbox h-5 w-5 text-blue-600"
                                            {{ $building->existing_utilities && in_array('other', $building->existing_utilities) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Others (specify)</span>
                                    </label>
                                </div>
                            </div>
                            @error('existing_utilities')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="land_ownership_status" class="block text-sm font-medium text-gray-700 mb-2">Land
                                Ownership Status</label>
                            <select name="land_ownership_status" id="land_ownership_status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select Status</option>
                                <option value="owned" {{ $building->land_ownership_status == 'owned' ? 'selected' : '' }}>Owned</option>
                                <option value="leased" {{ $building->land_ownership_status == 'leased' ? 'selected' : '' }}>Leased</option>
                                <option value="donated" {{ $building->land_ownership_status == 'donated' ? 'selected' : '' }}>Donated</option>
                                <option value="not owned" {{ $building->land_ownership_status == 'not owned' ? 'selected' : '' }}>Not Owned</option>
                            </select>
                            @error('land_ownership_status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="estimated_occupants" class="block text-sm font-medium text-gray-700 mb-2">Estimated
                                Number of Occupants</label>
                            <input type="number" name="estimated_occupants" id="estimated_occupants"
                                value="{{ $building->estimated_occupants }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('estimated_occupants')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="estimated_fund" class="block text-sm font-medium text-gray-700 mb-2">Estimated
                                Fund</label>
                            <input type="number" step="0.01" name="estimated_fund" id="estimated_fund"
                                value="{{ $building->estimated_fund }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('estimated_fund')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Document Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Document Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="prepared_by" class="block text-sm font-medium text-gray-700 mb-2">Prepared
                                By</label>
                            <input type="text" name="prepared_by" id="prepared_by"
                                value="{{ $building->prepared_by }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('prepared_by')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="preparer_position"
                                class="block text-sm font-medium text-gray-700 mb-2">Position/Title</label>
                            <input type="text" name="preparer_position" id="preparer_position"
                                value="{{ $building->preparer_position }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('preparer_position')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="certified_by" class="block text-sm font-medium text-gray-700 mb-2">Certified Correct
                                By</label>
                            <input type="text" name="certified_by" id="certified_by"
                                value="{{ $building->certified_by }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('certified_by')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="certifier_position"
                                class="block text-sm font-medium text-gray-700 mb-2">Department/Agency Head</label>
                            <input type="text" name="certifier_position" id="certifier_position"
                                value="{{ $building->certifier_position }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('certifier_position')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Location & Measurements -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Location & Measurements</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                            <input type="text" name="latitude" id="latitude" value="{{ $building->latitude }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('latitude')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                            <input type="text" name="longitude" id="longitude" value="{{ $building->longitude }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('longitude')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="floor_area" class="block text-sm font-medium text-gray-700 mb-2">Floor Area</label>
                            <input type="text" name="floor_area" id="floor_area" value="{{ $building->floor_area }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('floor_area')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="completed_at" class="block text-sm font-medium text-gray-700 mb-2">Date
                                Completed</label>
                            <input type="date" name="completed_at" id="completed_at"
                                value="{{ $building->completed_at ? $building->completed_at->format('Y-m-d') : '' }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('completed_at')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Building Details -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Building Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="number_of_floors" class="block text-sm font-medium text-gray-700 mb-2">Number of
                                Floors</label>
                            <input type="number" name="number_of_floors" id="number_of_floors"
                                value="{{ $building->number_of_floors }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('number_of_floors')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="number_of_rooms" class="block text-sm font-medium text-gray-700 mb-2">Number of
                                Rooms</label>
                            <input type="number" name="number_of_rooms" id="number_of_rooms"
                                value="{{ $building->number_of_rooms }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('number_of_rooms')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="number_of_CRs" class="block text-sm font-medium text-gray-700 mb-2">Number of
                                CRs</label>
                            <input type="number" name="number_of_CRs" id="number_of_CRs"
                                value="{{ $building->number_of_CRs }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('number_of_CRs')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-3">
                            <label for="college_office_assigned"
                                class="block text-sm font-medium text-gray-700 mb-2">College/Office Assigned</label>
                            <input type="text" name="college_office_assigned" id="college_office_assigned"
                                value="{{ $building->college_office_assigned }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('college_office_assigned')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Utilization Data -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Utilization Data</h2>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="specific_use" class="block text-sm font-medium text-gray-700 mb-2">Specific Use of
                                Building</label>
                            <input type="text" name="specific_use" id="specific_use"
                                value="{{ $building->specific_use }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('specific_use')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Certificates -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Certificates</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="CSU_cert" class="block text-sm font-medium text-gray-700 mb-2">CSU
                                Certificate</label>
                            <input type="file" name="CSU_cert" id="CSU_cert"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @if ($building->CSU_cert)
                                <div class="mt-2 p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-gray-600 mb-2">Current file:</p>
                                    <a href="{{ asset('storage/' . $building->CSU_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fas fa-file-pdf mr-2"></i>
                                        View Current Certificate
                                    </a>
                                </div>
                            @endif
                            @error('CSU_cert')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="LGU_cert" class="block text-sm font-medium text-gray-700 mb-2">LGU
                                Certificate</label>
                            <input type="file" name="LGU_cert" id="LGU_cert"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @if ($building->LGU_cert)
                                <div class="mt-2 p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-gray-600 mb-2">Current file:</p>
                                    <a href="{{ asset('storage/' . $building->LGU_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fas fa-file-pdf mr-2"></i>
                                        View Current Certificate
                                    </a>
                                </div>
                            @endif
                            @error('LGU_cert')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="FIRE_cert" class="block text-sm font-medium text-gray-700 mb-2">Fire
                                Certificate</label>
                            <input type="file" name="FIRE_cert" id="FIRE_cert"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @if ($building->FIRE_cert)
                                <div class="mt-2 p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-gray-600 mb-2">Current file:</p>
                                    <a href="{{ asset('storage/' . $building->FIRE_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fas fa-file-pdf mr-2"></i>
                                        View Current Certificate
                                    </a>
                                </div>
                            @endif
                            @error('FIRE_cert')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="OCCUPANCY_cert" class="block text-sm font-medium text-gray-700 mb-2">Occupancy
                                Certificate</label>
                            <input type="file" name="OCCUPANCY_cert" id="OCCUPANCY_cert"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @if ($building->OCCUPANCY_cert)
                                <div class="mt-2 p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-gray-600 mb-2">Current file:</p>
                                    <a href="{{ asset('storage/' . $building->OCCUPANCY_cert) }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fas fa-file-pdf mr-2"></i>
                                        View Current Certificate
                                    </a>
                                </div>
                            @endif
                            @error('OCCUPANCY_cert')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('campus.buildings.index') }}"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Update Building
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
