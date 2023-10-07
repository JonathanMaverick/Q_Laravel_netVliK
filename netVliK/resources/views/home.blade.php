@extends('navbar')
@section('title', 'Home')

@section('content')
    <div class="home-container">
        <h1 id="home-title" >Film List</h1>
        <div class="film-wrapper">
            @foreach ($films as $film)
                <a href="{{ route('detail_film_page', ['id'=>$film->id]) }}">
                    <div class="film-container">
                        <img src="{{Storage::url($film->url)}}" alt="">
                        <div class="film-content">
                            <h1>{{$film->title}}</h1>
                            <p>{{$film->desc}}</p>
                            <p>Genre: {{$film->genre}}</p>
                            <p>Cast: {{$film->cast}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @if ($user->role == 'admin')
            <div class="plus-button-container">
                <a href="{{route('insert_film_page')}}">
                    <button class="plus-button">+</button>
                </a>
            </div>
        @endif
    </div>
@endsection
