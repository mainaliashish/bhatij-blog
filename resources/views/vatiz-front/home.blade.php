@extends('vatiz-front.layouts.app')

@section('title')
...::Bhatij Blog::..
@endsection

@section('content')
<body>
@include('vatiz-front.layouts.nav')
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="tech-no">

			@if($posts)
			@foreach($posts as $post)
			<div class="tc-ch wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">

					<div class="tch-img">
						<a href="{{ route('single', $post->slug) }}">
						<img src="{{ asset($post->image) }}" alt="" width="100%" height="330px;"> </a>
					</div>

					<h3><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h3>
					<h6> BY <a href="{{ route('about') }}">{{ $post->author }} </a>
					{{ $post -> created_at->toFormattedDateString() }}
					</h6>
						<p>{{str_limit($post->description, 350, '......')}}</p>
						<div class="bht1">
							<a href="{{ route('single', $post->slug) }}">Continue Reading</a>
						</div>
						<div class="soci">
							<ul>
								<li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
								<li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
								<li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>
								<li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
								<li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			@endforeach
			@endif
			</div>
			{{ $posts->links() }}
		</div>

		@include('vatiz-front.layouts.right-nav')
	</div>
</div>
@endsection