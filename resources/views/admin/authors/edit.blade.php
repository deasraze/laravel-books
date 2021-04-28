@extends('layouts.app')

@section('content')
    @include('admin.authors._nav')
    <form method="POST" action="{{ route('admin.authors.update', $author) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First name</label>
            <input class="form-control @error('first_name') is-invalid @enderror"
                   name="first_name" id="first_name" value="{{ old('first_name', $author->first_name) }}" required>
            @error('first_name')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input class="form-control @error('last_name') is-invalid @enderror"
                   name="last_name" id="last_name" value="{{ old('last_name', $author->last_name) }}" required>
            @error('last_name')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="birth_year">Year of birth</label>
            <input class="form-control @error('birth_year') is-invalid @enderror" type="date"
                   name="birth_year" id="birth_year" value="{{ old('birth_year', $author->birth_year_form) }}" required>
            @error('birth_year')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
