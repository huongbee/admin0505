@extends('account.layout') 
@section('title','Register')
@section('content')

<style>
    .card-container.card {
        max-width: 550px;
    }
</style>
<h2 class="text-center">Register</h2>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </div>
@endif
<form class="form-signin" method="post" action="{{route('postRegister')}}">
    @csrf
    <input type="text" name="fullname" class="form-control" placeholder="Fullname" required autofocus value="{{old('fullname')}}">

    <input type="email" name="email" class="form-control" placeholder="Email address" required value="{{old('email')}}">

    <input type="text" name="username" class="form-control" placeholder="Username" required>

    <input type="date" name="birthdate" class="form-control" required>
    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <label>
                <input type="radio" name="gender" required value="nam"> Male
            </label>
        </div>
        <div class="col-sm-3">
            <label>
                <input type="radio" name="gender" required value="nu"> Female</label>
        </div>
    </div>

    <input type="text" name="address" class="form-control" placeholder="Address" required>

    <input type="text" name="phone" class="form-control" placeholder="Phone number" required>

    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <input type="password" name="re_password" class="form-control" placeholder="Re Enter Password" required>

    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Register</button>
</form>
<!-- /form -->
@endsection