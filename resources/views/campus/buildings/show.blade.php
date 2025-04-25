@extends('campus.shell')

@section('campus-content')
    <div class="container">
        <h1>{{ $building->name }}</h1>

        <p><strong>Description:</strong> {{ $building->description ?? 'No description available.' }}</p>
        <p><strong>Address:</strong> {{ $building->address ?? 'N/A' }}</p>
        <p><strong>Latitude:</strong> {{ $building->latitude ?? 'N/A' }}</p>
        <p><strong>Longitude:</strong> {{ $building->longitude ?? 'N/A' }}</p>
        <p><strong>Floor Area:</strong> {{ $building->floor_area ?? 'N/A' }}</p>
        <p><strong>Type:</strong> {{ $building->type ?? 'N/A' }}</p>
        <p><strong>Floors:</strong> {{ $building->number_of_floors ?? 'N/A' }}</p>
        <p><strong>Rooms:</strong> {{ $building->number_of_rooms ?? 'N/A' }}</p>
        <p><strong>CRs:</strong> {{ $building->number_of_CRs ?? 'N/A' }}</p>
        <p><strong>College/Office Assigned:</strong> {{ $building->college_office_assigned ?? 'N/A' }}</p>
        <p><strong>Date Completed:</strong> {{ $building->completed_at ?? 'N/A' }}</p>

        <div class="mb-3">
            <strong>Certificates:</strong>
            <ul>
                <li>
                    CSU:
                    @if ($building->CSU_cert)
                        <a href="{{ asset('storage/' . $building->CSU_cert) }}" target="_blank">View</a>
                    @else
                        N/A
                    @endif
                </li>
                <li>
                    FIRE:
                    @if ($building->FIRE_cert)
                        <a href="{{ asset('storage/' . $building->FIRE_cert) }}" target="_blank">View</a>
                    @else
                        N/A
                    @endif
                </li>
                <li>
                    OCCUPANCY:
                    @if ($building->OCCUPANCY_cert)
                        <a href="{{ asset('storage/' . $building->OCCUPANCY_cert) }}" target="_blank">View</a>
                    @else
                        N/A
                    @endif
                </li>
                <li>
                    LGU:
                    @if ($building->LGU_cert)
                        <a href="{{ asset('storage/' . $building->LGU_cert) }}" target="_blank">View</a>
                    @else
                        N/A
                    @endif
                </li>
            </ul>
        </div>

        <a href="{{ route('campus.buildings.index') }}" class="btn btn-primary">Back to Buildings</a>
        <a href="{{ route('campus.buildings.edit', $building->id) }}" class="btn btn-warning">Edit Building</a>
        <a href="{{ route('campus.buildings.create') }}" class="btn btn-success">Add New Building</a>
    </div>
@endsection