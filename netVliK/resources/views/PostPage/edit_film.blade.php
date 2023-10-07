@extends('navbar')
@section('title', 'Edit Film')

@section('content')
    <div class="edit-film-page">
        <div class="edit-film-content">
            <h1>Edit Film</h1>
            <form action="{{ route('edit_film', ['id' => $film->id]) }}" method="POST" class="edit-form" enctype="multipart/form-data">
                @csrf
                <div class="edit-form-container">
                    <label for="film_image">Choose Film</label>
                    <input type="file" name="image" id="film_image">
                </div>
                <div class="edit-form-container">
                    <label for="film_title">Updated Film</label>
                    <input type="text" name="title" id="film_title" value="{{$film->title}}">
                </div>
                <div class="edit-form-container">
                    <label for="film_desc">Updated Desc</label>
                    <textarea style="resize: none" rows="7" name="desc" id="film_desc">{{$film->desc}}</textarea>
                </div>
                <div class="edit-form-container">
                    <label for="film_genre">Updated Genre</label>
                    <input type="text" name="genre" id="film_genre" value="{{$film->genre}}">
                </div>
                <div class="edit-form-container">
                    <label for="film_cast">Updated Cast</label>
                    <input type="text" name="cast" id="film_cast" value="{{$film->cast}}">
                </div>
                <button type="submit" id="edit-button">Edit</button>
            </form>
            @if ($errors->any())
            <p style="color:red">
                {{$errors->first()}}
            </p>
            @endif
        </div>
    </div>
@endsection
