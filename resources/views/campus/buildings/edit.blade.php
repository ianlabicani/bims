@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Edit Building</h1>
    <form action="{{ route('buildings.update', $building) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ $building->name }}" required>
    </div>
    <div class="form-group">
      <label for="location">Location</label>
      <input type="text" name="location" id="location" class="form-control" value="{{ $building->location }}" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" id="description" class="form-control">{{ $building->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
  </div>
@endsection