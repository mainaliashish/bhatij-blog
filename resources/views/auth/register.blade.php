@extends('vatiz-back.layouts.layout')

@section('header')
<style type="text/css">
    span.invalid-feedback {
        color: darkred;
        width: 335px;
    }
</style>
@endsection

@section('content')
<div class="reg-w3">
<div class="w3layouts-main">
    <h2>Register Now</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf

<input id="name" type="text" class="ggg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="NAME">

@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror


<input id="email" type="email" class="ggg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL">

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<input id="password" type="password" class="ggg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="PASSWORD">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<input id="password-confirm" type="password" class="ggg" name="password_confirmation" required autocomplete="new-password" placeholder="CONFIRM PASSWORD">
    <div class="clearfix"></div>
<input type="submit" value="Register" name="register">

</form>
</div>
</div>
@endsection
