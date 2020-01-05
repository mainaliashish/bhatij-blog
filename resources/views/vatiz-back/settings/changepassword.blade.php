@extends('vatiz-back.layouts.layout')

@section('header')
<link rel="stylesheet" href="{{ asset('back/css/trix.css') }}" />
<style type="text/css">
	trix-editor {
		height: 500px !important;
		max-height: 200px;
	  	overflow-y: auto !important;
	}

header.panel-heading.custom {
    background: antiquewhite;
    color: sienna;
    font-size: x-large;
    font-family: sans-serif;
    font-weight: 600;
    box-shadow: 3px 3px darkolivegreen;
}

.alert.alert-danger {
    color: firebrick;
    font-size: 16px;
    font-family: sans-serif;
}
</style>
@endsection

@section('content')
<section id="container">
@include('vatiz-back.layouts.back-header')
<!--header end-->
<!--sidebar start-->
@include('vatiz-back.layouts.sidebar')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	 <div class="panel panel-default">
    <div class="panel-heading">
		Update Admin Password
    </div>

 	@include('partials.errors')
 	<div class="custom" style="padding: 12px">
        <form method="POST" action="{{ route('settings.updatepassword') }}">
         {{ csrf_field() }}
        <div class="form-group">
          {!! Form::label('current-password', 'Current password:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::password('current-password', ['class' => 'form-control','placeholder'=>'Enter current password'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('new-password', 'New password:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::password('new-password', ['class'=> 'form-control', 'placeholder' => 'Enter new password']) !!}

        </div>

        <div class="form-group">
          {!! Form::label('new-password_confirmation', 'Confirm password:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::password('new-password_confirmation', ['class' => 'form-control','placeholder'=>'Enter confirm password']) !!}
        </div>

		<div class="form-group right">
			{{ Form::submit('Update Password',['class' => 'btn btn-success'])}}
		</div>
		{!! Form::close() !!}
 	</div>
@include('vatiz-back.layouts.back-footer')
</section>
@endsection

@section('footer')
<script src="{{ asset('back/js/trix.js') }}"></script>
@endsection
