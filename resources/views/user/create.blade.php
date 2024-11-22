@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <!-- Image Upload Field -->
        <div class="mb-3">
            <label for="image" class="form-label">Profile Image</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection
