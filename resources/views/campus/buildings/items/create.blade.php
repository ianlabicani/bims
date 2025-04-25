@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Add Item to {{ $building->name }}</h1>
        <form action="{{ route('campus.buildings.items.store', $building) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="room_id">Room</label>
                <select name="room_id" id="room_id" class="form-control">
                    <option value="">N/A</option>
                    @foreach ($building->rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="acquisition_cost">Acquisition Cost</label>
                <input type="number" step="0.01" name="acquisition_cost" id="acquisition_cost" class="form-control"
                    required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="acquired_at">Acquired At</label>
                <input type="date" name="acquired_at" id="acquired_at" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="inventoried_at">Inventoried At</label>
                <input type="date" name="inventoried_at" id="inventoried_at" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="accountable_officer">Accountable Officer</label>
                <input type="text" name="accountable_officer" id="accountable_officer" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add Item</button>
        </form>
    </div>
@endsection