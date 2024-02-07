@extends('layouts.app')

@section('content')
<form  method="POST" action="{{ route('login') }}" class="mb-3">
    <div class="text-center mb-4">
        <h1 class="">SocialApp</h1>
        <Small class="">Instagram Clone by Arista Abdurrahman Arif</Small>
    </div>

    @csrf
    <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Remember me
        </label>
        <a href="http://" style="text-decoration: none; margin-left: 105px; color: darkslategrey;">Forgot Password?</a>
    </div>

    <button class="btn btn-secondary w-100 py-2" type="submit">Log in</button>
</form>
<p class="text-center" style="font-size:15px">Don't have account? <a href="{{ route('register') }}" style="color: darkslategrey;">Please Sign Up</a></p>
@endsection
