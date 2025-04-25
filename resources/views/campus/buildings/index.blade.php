@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Buildings</h1>
        <a href="{{ route('campus.buildings.create') }}" class="btn btn-primary">Add Building</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buildings as $building)
                    <tr>
                        <td>{{ $building->name }}</td>
                        <td>{{ $building->location }}</td>
                        <td>{{ $building->description }}</td>
                        <td>
                            <a href="{{ route('campus.buildings.edit', $building) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('campus.buildings.destroy', $building) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection