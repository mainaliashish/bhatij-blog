@extends('vatiz-back.layouts.layout')

@section('header')
<style>
	.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background: aliceblue;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
	color: royalblue;
}
.jumbotron.col-md-6 {
    border: 1px solid tomato;
}

a:focus, a:hover {
    color: chocolate;
    font-weight: 600;
}

.jumbotron p {
    margin-bottom: 15px;
    font-size: 16px;
    color: teal;
    font-weight: 500;
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
    Category -> {{ $category->name }}
    </div>
    @if($category->posts)
    @foreach($category->posts as $post)
    <div class="jumbotron col-md-6" style="padding:4px;margin-top: 4px;margin-bottom: 0px;">
      <img src="{{ asset($post->image) }}" alt="" height="100px" width="200px">
      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm pull-right">View Post</a>
      <div class="clearfix"> </div>
      <span>Title :<p>{!!strlen($post->title) > 70 ? substr($post->title,0,70) : $post->title !!}</p>
      </span>
      Description : <p>{!!strlen($post->description) > 70 ? substr($post->description,0,70) : $post->description !!}</p>
    </div>
    @endforeach
    @endif
</div>

<div class="row">

</div>


		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
@endsection