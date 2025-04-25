@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h2>Item Details</h2>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $item->description }}</p>
                <p class="card-text"><strong>Serial Number:</strong> {{ $item->serial_number ?? 'N/A' }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $item->quantity }}</p>
                <p class="card-text"><strong>Acquisition Cost:</strong> ₱{{ number_format($item->acquisition_cost, 2) }}</p>
                <p class="card-text"><strong>Acquired At:</strong>
                    {{ \Carbon\Carbon::parse($item->acquired_at)->toFormattedDateString() }}</p>
                <p class="card-text"><strong>Inventoried At:</strong>
                    {{ \Carbon\Carbon::parse($item->inventoried_at)->toFormattedDateString() }}</p>
                <p class="card-text"><strong>Accountable Officer:</strong> {{ $item->accountable_officer }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $item->location }}</p>
                <p class="card-text"><strong>Room:</strong> {{ $item->room->name ?? 'N/A' }}</p>
                <p class="card-text"><strong>Building:</strong> {{ $item->building->bldgname ?? 'N/A' }}</p>

                <a href="{{ route('campus.buildings.items.index', $item->building_id) }}"
                    class="btn btn-secondary mt-3">Back to Items</a>
            </div>
        </div>
    </div>
@endsection