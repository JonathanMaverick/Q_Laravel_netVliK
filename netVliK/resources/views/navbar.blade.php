<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail_film.css')}}">
    <link rel="stylesheet" href="{{asset('css/edit_film.css')}}">
    <link rel="stylesheet" href="{{asset('css/insert_film.css')}}">
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <link rel="stylesheet" href="{{asset('css/update_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/favorite.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <div class="nav-bar">
            <div class="nav-right-content">
                <a href="{{ route('home_page') }}"><img src="{{ asset('images/logo.png') }}" alt="" id="logo"></a>
            </div>
            <div class="nav-left-content">
                <a href="{{ route('favorite_page') }}">Favorite</a>
                <form action="{{ route('search') }}" class="nav-searchbar" method="GET">
                    @csrf
                    <input type="text" name="search_title" placeholder="Search..." class="searchBar" required>
                    <button type="submit" class="searchBtn">
                        <img src="{{asset('images/search_btn.png')}}" alt="" srcset="">
                    </button>
                </form>
                <a href="{{ route('profile_page', ['id'=>Auth::user()->id]) }}"><img src="{{Storage::url(Auth::user()->img_url)}}" id="profile_img" alt=""></a>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
