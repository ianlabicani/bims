@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Rooms</h1>
        <a href="{{ route('campus.buildings.show', $building) }}" class="btn btn-primary">Back to Building</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Building</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $building->name }}</td>
                        <td>
                            <a href="{{ route('campus.buildings.rooms.show', [$building, $room]) }}"
                                class="btn btn-info">View</a>
                            <a href="{{ url('campus.rooms.edit', $room) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection