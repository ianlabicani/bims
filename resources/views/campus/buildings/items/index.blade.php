@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>Items in {{ $building->name }}</h1>
        <a href="{{ route('campus.buildings.show', $building) }}" class="btn btn-primary">Back to Building</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ url('buildings.items.edit', [$building, $item]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('campus.buildings.items.show', [$building, $item]) }}"
                                class="btn btn-info">View</a>
                            <form action="{{ url('buildings.items.destroy', [$building, $item]) }}" method="POST"
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
        <a href="{{ route('campus.buildings.items.create', $building) }}" class="btn btn-primary">Add Item</a>

    </div>
@endsection