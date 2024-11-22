@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Assign Houses to {{ $user->name }}</h1>
    <form action="{{ route('user.store-assigned-houses', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="houses" class="form-label">Select Houses</label>
            <select name="houses[]" id="houses" class="form-control" multiple>
                @foreach ($houses as $house)
                    <option value="{{ $house->id }}"
                        {{ $user->houses->contains($house->id) ? 'selected' : '' }}>
                        {{ $house->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl/Command to select multiple houses.</small>
        </div>
        <button type="submit" class="btn btn-success">Assign Houses</button>
    </form>
</div>
@endsection
