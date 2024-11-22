@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Users and Assigned Houses</h1>

    <!-- Buttons for creating a new user and uploading image -->
    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-success">Add New User</a>
        {{-- <a href="{{ route('users.images.create', $users->id) }}" class="btn btn-warning">Upload Image for User</a> --}}
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Houses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse ($user->houses as $house)
                            <span class="badge bg-info">{{ $house->name }}</span>
                        @empty
                            <span class="text-muted">No houses assigned</span>
                        @endforelse
                    </td>
                    <td>
                        <a href="{{ route('user.assign-houses', $user->id) }}" class="btn btn-primary">Assign Houses</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
