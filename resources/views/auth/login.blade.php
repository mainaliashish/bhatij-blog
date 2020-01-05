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
<div class="log-w3">
<div class="w3layouts-main">
<h2>Dashboard Login</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="ggg">
            <input id="email" type="email" class="ggg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL">

            @error('email')
                <span class="invalid-feedback custom" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="ggg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="PASSWORD">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

               <span> <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me </span>

            @if (Route::has('password.request'))
            <h6><a href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a></h6>
            @endif
            <div class="clearfix"></div>
            <input type="submit" value="Login" name="login">
</form>
</div>
</div>
@stop

