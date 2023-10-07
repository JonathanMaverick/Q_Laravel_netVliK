@extends('navbar')
@section('title', 'Profile')

@section('content')
    <div class="update-profile-page">
        <div class="update-profile-container">
            <h2>Change your personal information</h2>
            <form action="{{ route('update_profile') }}" method="POST" class="profile-form" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" id="imageurl">
                <input type="text" placeholder="New Name" name="new_name" value="{{ old('new_name') }}">
                <input type="password" placeholder="Old Password" name="old_password" value="{{ old('old_password') }}">
                <input type="password" placeholder="New Password" name="new_password" value="{{ old('new_password') }}">
                <button type="submit">Change</button>
            </form>
            @if ($errors->any())
            <p style="color:red">
                {{$errors->first()}}
            </p>
            @endif
        </div>
    </div>
@endsection
