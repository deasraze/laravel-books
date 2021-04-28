@extends('layouts.app')

@section('content')
    @include('books._nav')
    <div class="row">
        <div class="col-md-12">
            <div class="items-list">
                @foreach($books as $book)
                    <div class="item">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="height: 300px; background: #f6f6f6; border: 1px solid #ddd"></div>
                            </div>
                            <div class="col-md-9">
                                <span class="float-right"></span>
                                <div class="h4" style="margin-top: 0">
                                    <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
                                </div>
                                <p>Authors:
                                @foreach($book->authors as $author)
                                     <a href="{{ route('authors.show', $author) }}">{{ $author->full_name }}</a>
                                @endforeach
                                </p>
                                <p>Publishing house: {{ $book->publishing }}</p>
                                <p>Publication date: {{ $book->publish_date }}</p>
                                <p>Description: {{ substr($book->description, 0, 150) . '..' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{ $books->links() }}
@endsection
