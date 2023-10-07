@extends('navbar')
@section('title', 'Favorite')

@section('content')
<div class="home-container">
    <h1 id="home-title">Favorite List</h1>
    <div class="film-wrapper">
        @foreach ($user->favorites as $film)
        <div class="film-container">
            <img src="{{Storage::url($film->url)}}" alt="">
            <h2>{{ $film->title }}</h2>
            <p>{{ $film->desc }}</p>
            <p>Genre: {{ $film->genre }}</p>
            <p>Cast: {{ $film->cast }}</p>
            <form class="remove-fav-button" action="{{ route('remove-from-favorites', ['id' => $film->id]) }}" method="POST">
                @csrf
                <button type="submit" id="remove-button">Remove from Favorites</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
