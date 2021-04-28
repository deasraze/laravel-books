@extends('layouts.app')

@section('content')
    @include('admin.authors._nav')

    <p><a href="{{ route('admin.authors.create') }}" class="btn btn-success">Add Author</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Date of birth</th>
            <th>Number of books</th>
        </tr>
        </thead>
        <tbody>

        @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->last_name }}</td>
                <td>{{ $author->birth_year }}</td>
                <td>123</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $authors->links() }}
@endsection
