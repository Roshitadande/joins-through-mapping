@extends('layout.app')

@section('content')
    <h1>Create City</h1>

    <form action="{{route('city.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">City Name</label>
            <input type="text" name="name" id="name" >

        </div>
        <div class="form-group">
        <label for="state_id">state</label>
        <select name="state_id" id="state_id" class="form-control" required>
            <option value="">Select state</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </select>
        @error('state_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

        
        <button type="submit" class="btn btn-primary">Create City</button>
    </form>
@endsection