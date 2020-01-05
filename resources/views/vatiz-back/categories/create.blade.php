@extends('vatiz-back.layouts.layout')

@section('header')
<style>
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
    @if(isset($category))
     Edit Category
    @else
     Create a New Category
    @endif
    </div>

 	@include('partials.errors')
 	<div class="custom" style="padding: 12px">
 		@if(isset($category))
		{!! Form::model($category, ['method'=>'PATCH', 'route' => ['categories.update', $category->id]]) !!}
		@else
		{{ Form::open(array('method'=>'POST','route' => 'categories.store')) }}
		@endif
		<div class="form-group">
			{!! Form::label('category', 'Category : ', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('name', isset($category) ? $category->name : ' ' , ['class' => 'form-control','placeholder'=>'Enter title']) !!}
		</div>

		<div class="form-group right">
			{{ Form::submit(isset($category) ? 'Update category' : 'Create category',['class' => 'btn btn-success'])}}
		</div>
		{!! Form::close() !!}
 	</div>
@include('vatiz-back.layouts.back-footer')
</section>
@endsection

