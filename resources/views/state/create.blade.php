@extends('layout.app')

@section('content')
    <h1>Create State</h1>

    <form method="POST" action="{{ route('state.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">State Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="country_id">Country</label>
        <select name="country_id" id="country_id" class="form-control" required>
            <option value="">Select Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        @error('country_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create State</button>
</form>
@endsection