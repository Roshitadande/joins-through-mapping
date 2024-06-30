@extends('layout.app')

@section('content')
    <h1>City</h1>

    <a href="{{route('city.create')}}" class="btn btn-primary mb-3">Create City</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>State Name</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{$city->state->name}}</td>
                    
                    <td>
                        <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{route('city.destroy',$city->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this city?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection