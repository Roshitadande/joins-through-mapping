@extends('layout.app')

@section('content')
    <h1>State</h1>

    <a href="{{route('state.create')}}" class="btn btn-primary mb-3">Create State</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>country name</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($states as $state)
                <tr>
                    <td>{{ $state->id }}</td>
                    <td>{{ $state->name }}</td>
                    <td>{{$state->country->name}}</td>
                    
                    <td>
                        <a href="{{route('state.edit',$state->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{route('state.destroy',$state->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this state?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection