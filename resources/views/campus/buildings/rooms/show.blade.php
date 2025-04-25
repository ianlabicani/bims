@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>{{ $room->name }}</h1>
        <p><strong>Building:</strong> {{ $room->building->name }}</p>
        <p><strong>Description:</strong> {{ $room->description }}</p>
        <a href="{{ route('campus.buildings.rooms.index', $building) }}" class="btn btn-secondary">Back to Rooms</a>
    </div>
@endsection