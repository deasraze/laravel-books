@extends('layouts.app')
@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.books.destroy', $book) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $book->id }}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $book->title }}</td>
        </tr>
        <tr>
            <th>Publishing house</th><td>{{ $book->publishing }}</td>
        </tr>
        <tr>
            <th>Publication date</th><td>{{ $book->publish_date }}</td>
        </tr>
        <tr>
            <th>Description</th><td>{{ $book->description }}</td>
        </tr>
        <tr>
        <tbody>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Year of birth</th>
        </tr>
        </thead>
        <tbody>

        <tr><th colspan="4">Authors</th></tr>
        @forelse ($authors as $author)
            <tr>
                <td>
                    <a href="#">
                        {{ $author->first_name }}
                    </a>
                </td>
                <td>
                    <a href="#">
                        {{ $author->last_name }}
                    </a>
                </td>
                <td>{{ $author->birth_year }}</td>
            </tr>
        @empty
            <tr><td colspan="4">None</td></tr>
        @endforelse

        </tbody>
    </table>
@endsection
