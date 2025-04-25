@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Add Room</h1>
    <form action="{{ route('campus.rooms.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="building_id">Building</label>
      <select name="building_id" id="building_id" class="form-control" required>
      @foreach ($buildings as $building)
      <option value="{{ $building->id }}">{{ $building->name }}</option>
    @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
@endsection