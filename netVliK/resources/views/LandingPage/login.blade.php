<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="content">
        <div class="login-container">
            <div class="top-login-container">
                <div class="login-logo-container">
                    <img src="{{asset('images/logo.png')}}" class="logo" alt="">
                </div>
                <p>Welcome Back please login your account</p>
            </div>
            <form method="POST" action="{{route('login') }}" class="login-form">
                @csrf
                <input type="text" name="email" placeholder="Email" class="login-input">
                <input type="password" name="password" placeholder="Password" class="login-input">
                <button type="submit" class="submit-btn">Login</button>
            </form>
            @if ($errors->any())
                <p style="color:red">
                    {{$errors->first()}}
                </p>
            @endif
            <p style="margin-top: 20px">Don't have an account? <a href="{{ route('register_page')}}">Click Here</a></p>
        </div>
    </div>
</body>
</html>
