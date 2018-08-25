@extends('account.layout')
@section('title','Login')

@section('content')
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <p id="profile-name" class="profile-name-card"></p>
    <form class="form-signin" method="post" action="#">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
    </form><!-- /form -->
    <a href="#" class="forgot-password">
        Forgot the password?
    </a>
@endsection