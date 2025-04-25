@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $building->name }}</h1>
    <p><strong>Location:</strong> {{ $building->location }}</p>
    <p><strong>Description:</strong> {{ $building->description ?? 'No description available.' }}</p>

    <a href="{{ route('buildings.index') }}" class="btn btn-primary">Back to Buildings</a>
  </div>
@endsection