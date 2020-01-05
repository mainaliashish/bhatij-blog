@extends('vatiz-back.layouts.layout')

@section('header')
<link rel="stylesheet" href="{{ asset('back/css/trix.css') }}" />
<link rel="stylesheet" href="{{ asset('back/css/flatpicker.css') }}" />
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
    @if(isset($post))
     Edit Post
    @else
     Create a Blog Post
    @endif
    </div>

 	@include('partials.errors')
 	<div class="custom" style="padding: 12px">
 		@if(isset($post))
		{!! Form::model($post, ['method'=>'PATCH', 'route' => ['posts.update', $post->id], 'files'=>true]) !!}
		@else
		{{ Form::open(array('method'=>'POST','route' => 'posts.store', 'files'=>true)) }}
		@endif
		<div class="form-group">
			{!! Form::label('title', 'Title : ', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('title', isset($post) ? $post->title : ' ' , ['class' => 'form-control','placeholder'=>'Enter title']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description', 'Description : ', ['class' => ' font-weight-bold']) !!}
			<input id="x" type="hidden" name="description" value="{{ isset($post) ? $post->description : ' ' }}">
  			<trix-editor input="x"></trix-editor>
		</div>

		@if(isset($post))
		<div class="form-group">
			<img src="{{ asset($post->image) }}" alt="" style="width: 100%;" height="500px">
		</div>
		@endif
		<div class="form-group">
			{!! Form::label('image', 'Image :', ['class' => 'font-weight-bold']) !!}
			{!! Form::file('image',null, ['class' => 'form-control']) !!}
		</div>

        <div class="form-group">
          {!! Form::label('category_id', 'Category:', ['class' => 'font-weight-bold']) !!}
          @if(isset($categories) && count($categories) > 0)
          {!! Form::select('category_id', [''=>'Choose Options'] + $categories , null, ['class'=>'form-control'])!!}
          @endif
        </div>
{{--
		<div class="form-group">
			{!! Form::label('author', 'Author name : ', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('author', isset($post) ? $post->author : ' ' , ['class' => 'form-control','placeholder'=>'Enter author']) !!}
		</div>
 --}}
		<div class="form-group right">
			{{ Form::submit(isset($post) ? 'Update Post' : 'Create Post',['class' => 'btn btn-success'])}}
		</div>
		{!! Form::close() !!}
 	</div>
@include('vatiz-back.layouts.back-footer')
</section>
@endsection

@section('footer')
<script src="{{ asset('back/js/trix.js') }}"></script>
<script src="{{ asset('back/js/flatpicker.js') }}"></script>
<script>
	flatpickr('#published_at', {
		enableTime: true
	})
</script>

@endsection
