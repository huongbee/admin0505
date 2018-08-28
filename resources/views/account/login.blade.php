@extends('account.layout')
@section('title','Login')

@section('content')
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <p id="profile-name" class="profile-name-card"></p>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif
    <form class="form-signin" method="post" action="{{route('postLogin')}}">
        @csrf
        <span id="reauth-email" class="reauth-email"></span>
        <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <br>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
    </form><!-- /form -->
    <a href="#" class="forgot-password">
        Forgot the password?
    </a>
@endsection