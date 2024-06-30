@extends('layout.app')

@section('content')
    <h1>Edit City</h1>

    <form action="{{route('city.update',$cities->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">City Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $cities->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                <label for="state_id">state:</label>
                <select class="form-control" id="state_id" name="state_id">
                    @foreach($states as $id => $name)
                        <option value="{{ $id }}" {{ $cities->state_id}}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Update city</button>
    </form>
@endsection