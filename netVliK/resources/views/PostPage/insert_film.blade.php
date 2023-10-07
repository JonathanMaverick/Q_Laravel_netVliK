@extends('navbar')
@section('title', 'Insert Film')

@section('content')
    <div class="insert-film-page">
        <div class="insert-film-content">
            <h1>insert Film</h1>
            <form action="{{ route('insert_film') }}" method="POST" class="insert-form" enctype="multipart/form-data">
                @csrf
                <div class="insert-form-container">
                    <label for="film_image">Choose Film</label>
                    <input type="file" name="image" id="film_image">
                </div>
                <div class="insert-form-container">
                    <label for="film_title">Film Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="film_title">
                </div>
                <div class="insert-form-container">
                    <label for="film_desc">Desc</label>
                    <textarea style="resize: none" rows="7" name="desc" id="film_desc">{{ old('desc') }}</textarea>
                </div>
                <div class="insert-form-container">
                    <label for="film_genre">Genre</label>
                    <input type="text" name="genre" value="{{ old('genre') }}" id="film_genre">
                </div>
                <div class="insert-form-container">
                    <label for="film_cast">Cast</label>
                    <input type="text" name="cast" value="{{ old('cast') }}" id="film_cast">
                </div>
                <button type="submit" id="insert-button">Insert</button>
            </form>
            @if ($errors->any())
            <p style="color:red">
                {{$errors->first()}}
            </p>
            @endif
        </div>
    </div>
@endsection
