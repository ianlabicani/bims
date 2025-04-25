@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Edit Building</h1>
        <form action="{{ route('campus.buildings.update', $building) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mt-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $building->name }}" required>
            </div>

            <div class="form-group mt-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $building->description }}</textarea>
            </div>

            <div class="form-group mt-2">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $building->address }}">
            </div>

            <div class="form-group mt-2">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $building->latitude }}">
            </div>

            <div class="form-group mt-2">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $building->longitude }}">
            </div>

            <div class="form-group mt-2">
                <label for="floor_area">Floor Area</label>
                <input type="text" name="floor_area" id="floor_area" class="form-control"
                    value="{{ $building->floor_area }}">
            </div>

            <div class="form-group mt-2">
                <label for="type">Building Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $building->type }}">
            </div>

            <div class="form-group mt-2">
                <label for="number_of_floors">Number of Floors</label>
                <input type="number" name="number_of_floors" id="number_of_floors" class="form-control"
                    value="{{ $building->number_of_floors }}">
            </div>

            <div class="form-group mt-2">
                <label for="number_of_rooms">Number of Rooms</label>
                <input type="number" name="number_of_rooms" id="number_of_rooms" class="form-control"
                    value="{{ $building->number_of_rooms }}">
            </div>

            <div class="form-group mt-2">
                <label for="number_of_CRs">Number of CRs</label>
                <input type="number" name="number_of_CRs" id="number_of_CRs" class="form-control"
                    value="{{ $building->number_of_CRs }}">
            </div>

            <div class="form-group mt-2">
                <label for="college_office_assigned">College/Office Assigned</label>
                <input type="text" name="college_office_assigned" id="college_office_assigned" class="form-control"
                    value="{{ $building->college_office_assigned }}">
            </div>

            <div class="form-group mt-2">
                <label for="completed_at">Date Completed</label>
                <input type="date" name="completed_at" id="completed_at" class="form-control"
                    value="{{ $building->completed_at }}">
            </div>

            <div class="form-group mt-2">
                <label for="CSU_cert">CSU Certificate</label>
                <input type="file" name="CSU_cert" id="CSU_cert" class="form-control">
                @if ($building->CSU_cert)
                    <a href="{{ asset('storage/' . $building->CSU_cert) }}" target="_blank">View Existing</a>
                @endif
            </div>

            <div class="form-group mt-2">
                <label for="FIRE_cert">FIRE Certificate</label>
                <input type="file" name="FIRE_cert" id="FIRE_cert" class="form-control">
                @if ($building->FIRE_cert)
                    <a href="{{ asset('storage/' . $building->FIRE_cert) }}" target="_blank">View Existing</a>
                @endif
            </div>

            <div class="form-group mt-2">
                <label for="OCCUPANCY_cert">Occupancy Certificate</label>
                <input type="file" name="OCCUPANCY_cert" id="OCCUPANCY_cert" class="form-control">
                @if ($building->OCCUPANCY_cert)
                    <a href="{{ asset('storage/' . $building->OCCUPANCY_cert) }}" target="_blank">View Existing</a>
                @endif
            </div>

            <div class="form-group mt-2">
                <label for="LGU_cert">LGU Certificate</label>
                <input type="file" name="LGU_cert" id="LGU_cert" class="form-control">
                @if ($building->LGU_cert)
                    <a href="{{ asset('storage/' . $building->LGU_cert) }}" target="_blank">View Existing</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection