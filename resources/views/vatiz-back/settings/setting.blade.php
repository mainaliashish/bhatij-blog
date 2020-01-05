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
		Manage Site Settings
    </div>

 	@include('partials.errors')
 	<div class="custom" style="padding: 12px">
		{!! Form::model($setting, ['method'=>'POST', 'route' => ['settings.update', $setting->id], 'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('site_name', 'Site Name : ', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('site_name', isset($setting) ? $setting->site_name : ' ' , ['class' => 'form-control','placeholder'=>'Enter site name']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('about', 'About : ', ['class' => ' font-weight-bold']) !!}
			<input id="x" type="hidden" name="about" value="{{ isset($setting) ? $setting->about : ' ' }}">
  			<trix-editor input="x"></trix-editor>
		</div>

        <div class="form-group">
          {!! Form::label('contact', 'Phone:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::text('contact_number', isset($setting) ? $setting->contact_number : ' ' , ['class' => 'form-control','placeholder'=>'Enter contact number']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('contact_email', 'Email:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::text('contact_email', isset($setting) ? $setting->contact_email : ' ' , ['class' => 'form-control','placeholder'=>'Enter email']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('facebook', 'Facebook :', ['class' => 'font-weight-bold']) !!}
		  {!! Form::text('facebook', isset($setting) ? $setting->contact_email : ' ' , ['class' => 'form-control','placeholder'=>'Facebook Url']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('instagram', 'Instagram:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::text('instagram', isset($setting) ? $setting->instagram : ' ' , ['class' => 'form-control','placeholder'=>'Instagram Url']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('address', 'Address:', ['class' => 'font-weight-bold']) !!}
		  {!! Form::text('address', isset($setting) ? $setting->address : ' ' , ['class' => 'form-control','placeholder'=>'Enter address']) !!}
        </div>

		@if(isset($setting))
		<div class="form-group">
			<img src="{{ asset($setting->image) }}" alt="" style="width: 100%;">
		</div>
		@endif
		<div class="form-group">
			{!! Form::label('image', 'Image :', ['class' => 'font-weight-bold']) !!}
			{!! Form::file('image',null, ['class' => 'form-control']) !!}
		</div>


		<div class="form-group right">
			{{ Form::submit('Update Settings',['class' => 'btn btn-success'])}}
		</div>
		{!! Form::close() !!}
 	</div>
@include('vatiz-back.layouts.back-footer')
</section>
@endsection

@section('footer')
<script src="{{ asset('back/js/trix.js') }}"></script>
@endsection
