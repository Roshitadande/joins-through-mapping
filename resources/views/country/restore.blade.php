@extends('layout.app')

@section('content')
<div class="container">
    <h1>Trashed Data</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($countries->isEmpty())
        <p>No soft-deleted data found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->name }}</td>
                        <td>
                            <form action="{{ route('country.restore', $trash->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-primary">Restore</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
