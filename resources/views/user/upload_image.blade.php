@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Upload Image for {{ $user->name }}</h1>

    <form action="{{ route('users.images.store', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
