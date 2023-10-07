@extends('navbar')
@section('title', 'Detail Film')

@section('content')
    <div class="detail-film-page">
        <div class="detail-film-page-container">
            <div class="left-detail-film">
                <img src="{{Storage::url($film->url)}}" alt="">
            </div>
            <div class="right-detail-film">
                <div class="detail-film-content">
                    <h1>{{$film->title}}</h1>
                    <p>Desc : {{$film->desc}}</p>
                    <p>Genre : {{$film->genre}}</p>
                    <p>Cast : {{$film->cast}}</p>
                </div>
                <div class="detail-film-button-container">
                    <div class="detail-film-button">
                        @if ($user->role == 'member')
                            @if ($user->favorites->contains($film->id))
                                <form action="{{ route('remove-from-favorites', ['id' => $film->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Unfavorite</button>
                                </form>
                            @else
                                <form action="{{ route('add-to-favorites', ['id' => $film->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Favorite</button>
                                </form>
                            @endif
                        @elseif($user->role == 'admin')
                            <a href="{{ route('edit_film_page', ['id'=>$film->id]) }}">
                                <button type="submit">Edit</button>
                            </a>
                            <form action="{{ route('delete_film', ['id'=>$film->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            @if ($user->favorites->contains($film->id))
                                <form action="{{ route('remove-from-favorites', ['id' => $film->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Unfavorite</button>
                                </form>
                            @else
                                <form action="{{ route('add-to-favorites', ['id' => $film->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">Favorite</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
