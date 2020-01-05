@extends('vatiz-front.layouts.app')
@section('title')
...::Bhatij Single Page::..
@endsection

@section('content')
<body>
@include('vatiz-front.layouts.nav')
	<!-- technology-left -->
<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">

		 <div class="agileinfo">

			<div class="single">
			   <img src="{{ asset($post->image) }}" class="img-responsive" alt="">
			    <div class="b-bottom">
			      <h5 class="top">{{ $post->title }}</h5>
				   <p class="sub">{!! $post->description !!}</p>
			       <h6> BY <a href="{{ route('about') }}" style="    color: #fa4b2a;font-weight: 600;font-size: 16px;">{{ $post->author }} </a><p style="margin-top: 20px;font-weight: 600;">Published at: <strong style="color: #fa4b2a;">{{ $post -> created_at->toFormattedDateString() }}</strong></p>
			       @include('partials.share')

				<div class="response">
					<h4>Responses</h4>
					<div class="media response-info">
						@include('partials.disqus')
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
</div>
</div>
</div>
</div>

	@include('vatiz-front.layouts.right-nav')
		<!-- technology-right -->
	</div>

@endsection