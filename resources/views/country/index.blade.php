@extends('layout.app')

@section('content')
    <h1>Country</h1>

    <a href="{{route('country.create')}}" class="btn btn-primary mb-3">Create Country</a>
    <a href="{{route('country.trashed')}}" class="btn btn-primary mb-3">Trash Country</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    
                    <td>
                        <a href="{{route('country.edit',$country->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{route('country.destroy',$country->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to trash this country?')">Trash</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection