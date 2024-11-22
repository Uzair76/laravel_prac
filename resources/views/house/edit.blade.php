@extends('layouts.app')

@section('title', 'Edit House')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Edit House</h1>
    <form action="{{ route('house.update', $house->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->
        <div class="mb-3">
            <label for="name" class="form-label">House Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $house->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $house->address }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area</label>
            <input type="text" name="area" class="form-control" id="area" value="{{ $house->area }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update House</button>
    </form>
</div>
@endsection
