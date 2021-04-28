@extends('layouts.app')
@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $author->id }}</td>
        </tr>
        <tr>
            <th>First name</th><td>{{ $author->first_name }}</td>
        </tr>
        <tr>
            <th>Last name</th><td>{{ $author->last_name }}</td>
        </tr>
        <tr>
            <th>Year of birth</th><td>{{ $author->birth_year }}</td>
        </tr>
        <tr>
        <tbody>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
        <tr><th colspan="4">Books</th></tr>
        <tr>
            <th>Title</th>
            <th>Publishing house</th>
            <th>Publication date</th>
        </tr>
        </thead>
        <tbody>

        @forelse ($books as $book)
            <tr>
                <td>
                    <a href="{{ route('books.show', $book) }}">
                        {{ $book->title }}
                    </a>
                </td>
                <td>{{ $book->publishing }}</td>
                <td>{{ $book->publish_date }}</td>
            </tr>
        @empty
            <tr><td colspan="4">None</td></tr>
        @endforelse

        </tbody>
    </table>
@endsection
