@extends('layout.app')

@section('content')
    <h1>Create Country</h1>

    <form action="{{route('country.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Country Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Create Country</button>
    </form>
@endsection