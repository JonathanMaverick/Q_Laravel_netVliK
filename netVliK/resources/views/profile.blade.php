@extends('navbar')
@section('title', 'Profile')

@section('content')
    <div class="profile-page">
        <div class="profile-container">
            <h1>Your Personal Information</h1>
            <img src="{{Storage::url($user->img_url)}}" alt="" id="personal_img">
            <h2>Name : {{$user->name}}</h2>
            <h2>Email : {{$user->email}}</h2>
            <h2>Phone Number : {{$user->phone_number}}</h2>
            <h2>Roles : {{$user->role}}</h2>
            <div class="profile-links">
                <a href="{{ route('update_profile_page', ['id'=>Auth::user()->id])}}" style="color: red">Change Profile</a>
                <a href="{{ route('logout') }}" style="color: red">Log Out</a>
            </div>
        </div>
    </div>
@endsection
