@extends('vatiz-front.layouts.app')

@section('title')
...::Bhatij Search::..
@endsection

@section('content')
<body>
@include('vatiz-front.layouts.nav')
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">
			<h3 style="font-family: sans-serif;font-style: italic;">Search result for : <strong style="color: tomato">{{ $query }}</strong></h3>
			@if($posts ->count() > 0)
			@foreach($posts as $post)
			<div class="single">
			  <a href="{{ route('single', $post->slug) }}"> <img src="{{ asset($post->image) }}" class="img-responsive" alt=""> </a>
			    <div class="b-bottom">
			       <a href="{{ route('single', $post->slug) }}"><h5 class="top">{{ $post->title }}</h5></a>
				   <p class="sub">{{ $post->desciption }}</p>
			       <p>Published at : {{ $post -> created_at->toFormattedDateString() }} </p>
				</div>
			 </div>
			 @endforeach
			 @else
			 <div style="margin-top: 20px;">
			 <h3>No matching Post(s) found.</h3>
			 </div>
			 @endif

				<div class="clearfix"></div>
			</div>
		</div>
	@include('vatiz-front.layouts.right-nav')
		<!-- technology-right -->
	</div>
</div>
@endsection