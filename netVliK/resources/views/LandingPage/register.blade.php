<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
    <title>Register</title>
</head>
<body>
    <div class="content">
        <div class="register-container">
            <div class="register-top">
                <div class="register-logo-container">
                    <img src="{{ asset('images/logo.png') }} " class="logo">
                </div>
                <p>Unlimited Movies, TV shows, and more</p>
                <p>Watch anywhere. Cancel anytime</p>
            </div>
            <label for="imageurl" id="regis-img-label">Profile Picture</label>
            <form action="{{ route('register')}}" method="POST" class="register-form"  enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" id="imageurl">
                <input type="text" name="name" placeholder="Full Name" class="regis-input">
                <input type="text" name="email" placeholder="Email" class="regis-input">
                <input type="text" name="phone_number" placeholder="Phone Number"  class="regis-input">
                <input type="password" name="password" placeholder="Password" class="regis-input">
                <button type="submit" class="submit-btn">Register</button>
            </form>
            @if ($errors->any())
                <p style="color:red">
                    {{$errors->first()}}
                </p>
            @endif
            <p style="margin-top: 20px">Already have an account? <a href="{{ route('login_page')}}">Click Here</a></p>
        </div>
    </div>
</body>
</html>
