@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Buildings</h1>
        <a href="{{ route('campus.buildings.create') }}" class="btn btn-primary">Add Building</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buildings as $building)
                    <tr>
                        <td>{{ $building->name }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('campus.buildings.show', $building) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('campus.buildings.edit', $building) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection