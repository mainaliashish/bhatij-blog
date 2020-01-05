
@extends('vatiz-front.layouts.app')


@section('title')
...::Bhatij Category::..
@endsection

@section('header')
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/component.css') }}" />
<script src="{{ asset('front/js/modernizr.custom.js') }}"></script>
@endsection
@section('content')
<body>
@include('vatiz-front.layouts.nav')
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="music">
				<div class="effect-grid">
						<h3 class="w3">{{ $category->name }}</h3>
						<ul class="grid cs-style-3">
						@if($category->posts->count() > 0)
						@foreach($category->posts as $post)
						<li>
							<figure>
							<a href="{{ route('single', $post->slug) }}">	<img src="{{ asset($post->image) }}" alt=""> </a>
								<figcaption>
							       <h4>
										{{str_limit($post->title, 14, '......')}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href='{{ route('single', $post->slug) }}' class='btn btn-success btn-sm'>  &nbsp;Read More</a>
									</h4>
								</figcaption>
							</figure>
						</li>
						@endforeach
						@else
						<h3 style="color: red;">Oopss.. NO Post in this Category..</h3>
						<a href="{{ route('main-page') }}" class="btn btn-danger" style="margin-top: 15px;">Return Back</a>
						@endif
						<div class="clearfix"></div>
					</ul>
				</div>
			</div>
		</div>

		@include('vatiz-front.layouts.right-nav')
	</div>
</div>
@endsection