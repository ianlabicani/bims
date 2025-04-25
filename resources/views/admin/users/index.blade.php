@extends('admin.shell')

@section('admin-content')
    <div class="container mt-4">
        <h1 class="mb-4">Manage Campus Assignment</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Campus</th>
                    <th>Roles</th>
                    <th>Assign Campus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->campus->name ?? 'No Campus Assigned' }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('admin.users.assignCampus', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="campus_id" class="form-select form-select-sm d-inline w-auto">
                                    <option value="">-- Select Campus --</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}" {{ $user->campus_id == $campus->id ? 'selected' : '' }}>
                                            {{ $campus->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">Assign</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection