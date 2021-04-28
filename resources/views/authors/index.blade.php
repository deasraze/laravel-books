@extends('layouts.app')

@section('content')
    @include('authors._nav')
    <div class="row">
        <div class="col-md-12">
            <div class="items-list">
                @foreach($authors as $author)
                    <div class="item">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="height: 300px; background: #f6f6f6; border: 1px solid #ddd"></div>
                            </div>
                            <div class="col-md-9">
                                <span class="float-right"></span>
                                <div class="h4" style="margin-top: 0">
                                    <a href="{{ route('authors.show', $author) }}">{{ $author->full_name }}</a>
                                </div>
                                <p>Date of birth: {{ $author->birth_year }}</p>
                                <p>Number of books: {{ $author->books_count }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{ $authors->links() }}
@endsection
