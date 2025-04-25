@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item in {{ $building->name }}</h1>
    <form action="{{ route('buildings.items.update', [$building, $item]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $item->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Item</button>
    </form>
</div>
@endsection