@extends('vatiz-front.layouts.app')
@section('title')
...::Bhatij About::..
@endsection

@section('content')
<body>
@include('vatiz-front.layouts.nav')
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="w3agile-1">
			<div class="welcome">
				<div class="welcome-top heading">
					<h2 class="w3">About {{ $setting->site_name }}</h2>
					<div class="welcome-bottom">
						<img src="images/t4.jpg" class="img-responsive" alt="">
						<p>{!! $setting->about !!}</p>
					</div>
				</div>
			</div>
			<div class="team">
				<h3 class="team-heading">Owner</h3>
				<div class="team-grids">
					<div class="col-md-6 team-grid">
						<div class="team-grid1">
							<img src="{{ asset($setting->image) }}" alt=" " class="img-responsive">
							<div class="p-mask">
								<p>About Admin</p>
							</div>
						</div>
						<h5>{{ auth()->user()->name }}<span>Admin of Bhatij Blog</span></h5>
						<ul class="social">
							<li><a class="social-facebook" href="https://www.facebook.com/Bhatij007/">
								<i></i>
								<div class="tooltip"><span>Facebook</span></div>
								</a></li>
							<li><a class="social-twitter" href="#">
								<i></i>
								<div class="tooltip"><span>Twitter</span></div>
								</a></li>
							<li><a class="social-google" href="#">
								<i></i>
								<div class="tooltip"><span>Google+</span></div>
								</a></li>
						</ul>
					</div>

					<div class="clearfix"> </div>
				</div>
			</div>
			</div>
		</div>
		@include('vatiz-front.layouts.right-nav')
		<!-- technology-right -->
	</div>
</div>
@endsection