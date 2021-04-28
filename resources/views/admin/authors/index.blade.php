@extends('layouts.app')

@section('content')
    @include('admin.authors._nav')

    <p><a href="{{ route('admin.authors.create') }}" class="btn btn-success">Add Author</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of birth</th>
            <th>Number of books</th>
        </tr>
        </thead>
        <tbody>

        @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>
                    <a href="{{ route('authors.show', $author) }}">{{ $author->full_name }}</a>
                </td>
                <td>{{ $author->birth_year }}</td>
                <td>{{ $author->books_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $authors->links() }}
@endsection
