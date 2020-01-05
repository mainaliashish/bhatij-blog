@extends('vatiz-back.layouts.layout')

@section('content')
@include('vatiz-back.layouts.back-header')
<!--header end-->
<!--sidebar start-->
@include('vatiz-back.layouts.sidebar')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class=" wrapper">
		<div class="agile-grid">
		<h2 class="w3ls_head">{{ $post->title }}</h2>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" height="500px" width="100%" style="padding: 20px">
                        <div class="panel-body">
                            {!! $post->description !!}
                            <div class="clearfix"></div>
                     <a href="#" class="btn btn-primary" style="margin-top: 20px;">{{ $post->category->name }}</a>
                        <div class="buttons pull-right" style="padding: 10px;">
                <a href="{{ route('posts.edit', $post -> id) }}" class="btn btn-info">Edit</a></td>
                <a href="{{ route('posts.trash', $post -> id) }}" class="btn  btn-warning">Trash</a>
                <a href="{{ route('posts.delete', $post -> id) }}" class="btn btn-danger">Delete</a>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
		</div>
        </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

@endsection