@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}" class="mb-3">
    <div class="text-center mb-4">
        <h1 class="">SocialApp</h1>
        <Small class="">Instagram Clone by Arista Abdurrahman Arif</Small>
    </div>
    @csrf
    <div class="form-floating">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
        <input type="text" name="fullname" class="form-control" id="floatingInput" placeholder="Fullname">
        <label for="floatingInput">Fullname</label>
    </div>

    <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating mb-4">
        <input type="password" class="form-control" id="password-confirm" placeholder="password-confirm" 
        name="password_confirmation" required autocomplete="new-password">
        <label for="password-confirm">Confirm Password</label>
    </div>

    <button class="btn btn-secondary w-100 py-2" type="submit">Sign Up</button>
</form>
<p class="text-center" style="font-size:15px">Have an account? <a href="{{ route('login') }}" style="color: darkslategrey;">Log In</a></p>
@endsection
