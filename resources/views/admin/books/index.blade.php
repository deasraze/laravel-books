@extends('layouts.app')

@section('content')
    @include('admin.books._nav')

    <p><a href="{{ route('admin.books.create') }}" class="btn btn-success">Add Book</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Authors</th>
            <th>Publishing house</th>
            <th>Publication date</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>as</td>
                <td>{{ $book->publishing }}</td>
                <td>{{ $book->publish_date }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $books->links() }}
@endsection
