@extends('layout.app')

@section('content')
    <h1>Edit State</h1>

    <form action="{{route('state.update',$states->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">State Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $states->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                <label for="country_id">Country:</label>
                <select class="form-control" id="country_id" name="country_id">
                    @foreach($countries as $id => $name)
                        <option value="{{ $id }}" {{ $states->country_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Update State</button>
    </form>
@endsection