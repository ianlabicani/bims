@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Add Building</h1>
        <form action="{{ route('campus.buildings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-2">
                <label for="name">Building Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group mt-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group mt-2">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="floor_area">Floor Area</label>
                <input type="text" name="floor_area" id="floor_area" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="type">Building Type</label>
                <input type="text" name="type" id="type" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="number_of_floors">Number of Floors</label>
                <input type="text" name="number_of_floors" id="number_of_floors" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="number_of_rooms">Number of Rooms</label>
                <input type="text" name="number_of_rooms" id="number_of_rooms" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="number_of_CRs">Number of CRs</label>
                <input type="text" name="number_of_CRs" id="number_of_CRs" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="CSU_cert">CSU Certificate</label>
                <input type="file" name="CSU_cert" id="CSU_cert" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="LGU_cert">LGU Certificate</label>
                <input type="file" name="LGU_cert" id="LGU_cert" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="FIRE_cert">FIRE Certificate</label>
                <input type="file" name="FIRE_cert" id="FIRE_cert" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="OCCUPANCY_cert">Occupancy Certificate</label>
                <input type="file" name="OCCUPANCY_cert" id="OCCUPANCY_cert" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="LGU_cert">LGU Certificate</label>
                <input type="file" name="LGU_cert" id="LGU_cert" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="college_office_assigned">College/Office Assigned</label>
                <input type="text" name="college_office_assigned" id="college_office_assigned" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="completed_at">Date Completed</label>
                <input type="date" name="completed_at" id="completed_at" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Save</button>
        </form>
    </div>
@endsection