@extends('layouts.app')

@section('content')
    @include('admin.books._nav')
    <form method="POST" action="{{ route('admin.books.update', $book) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror"
                   name="title" id="title" value="{{ old('title', $book->title) }}" required>
            @error('title')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="publishing">Publishing house</label>
            <input class="form-control @error('publishing') is-invalid @enderror"
                   name="publishing" id="publishing" value="{{ old('publishing', $book->publishing) }}" required>
            @error('publishing')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="publish_date">Publication date</label>
            <input class="form-control @error('publish_date') is-invalid @enderror" type="date"
                   name="publish_date" id="publish_date" value="{{ old('publish_date', $book->publish_date) }}" required>
            @error('publish_date')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="authors">Authors</label>
            <select class="custom-select @error('authors.*') is-invalid @enderror"
                    name="authors[]" id="authors" required multiple>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            @error('authors.*')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="description" name="description" rows="4">{{ old('description', $book->description) }}</textarea>
            @error('description')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
