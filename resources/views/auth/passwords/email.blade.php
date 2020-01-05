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
    <h2>Password Reset</h2>
<form method="POST" action="{{ route('password.email') }}">
    @csrf

<input id="email" type="email" class="ggg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="EMAIL">

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<input type="submit" value="Reset Password" name="reset">

</form>
</div>
</div>
@endsection
