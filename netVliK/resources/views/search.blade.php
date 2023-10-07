@extends('navbar')
@section('title', 'Search')

@section('content')
    <div class="search-page">
        <h1>Search : {{$search_data}}</h1>
        <div class="search-film-wrapper">
            @foreach ($films as $film)
            <a href="{{ route('detail_film_page', ['id'=>$film->id]) }}">
                <div class="search-film-container">
                    <img src="{{Storage::url($film->url)}}" alt="">
                    <div class="search-film-content">
                        <h2>{{$film->title}}</h2>
                        <p>{{$film->desc}}</p>
                        <p>Genre: {{$film->genre}}</p>
                        <p>Cast: {{$film->cast}}</p>
                    </div>
                </div>
            </a>
            @endforeach
            <div class="pagination-container">
                {{ $films->appends(['search_title' => $search_data])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
