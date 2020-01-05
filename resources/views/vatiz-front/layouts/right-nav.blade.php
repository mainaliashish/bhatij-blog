		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				<div class="blo-top1">

					<div class="tech-btm">
					<div class="search-1">
							<form action="{{ route('results') }}" method="GET">
		<input type="search" name="query" value="search post" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
								<input type="submit" value=" ">
							</form>
						</div>
					<h4>Latest Posts</h4>
						@if($posts)
						@foreach($posts as $post)
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href="{{ route('single', ['slug' => $post->slug]) }}"><img src="{{ asset($post->image) }}" class="img-responsive" alt=""></a>
							</div>
							<div class="blog-grid-right">
								<h5><a href="{{ route('single', ['slug' => $post->slug]) }}">{{ $post->title}}</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endforeach
						@endif

					<div class="insta wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
					<h4>More Categories</h4>
						<ul>
						@if($categories)
						@foreach($categories as $category)
						<li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
						<div class="clearfix"></div>
						@endforeach
						@endif
						</ul>
					</div>
</div>
</div>
</div>