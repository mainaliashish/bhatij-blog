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

a:focus, a:hover {
    color: chocolate;
    font-weight: 600;
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
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     List of All Posts
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Category</th>
            <th data-breakpoints="xs">Title</th>
            <th>Editing</th>
            <th>Trashing</th>
          </tr>
        </thead>
        @if($posts)
        <tbody>
        @foreach($posts as $post)
          <tr>
            <td><img src="{{ asset( $post->image) }}" alt="{{ $post->title }}" height="90px" width="120px"></td>
            <td>{{ $post->category->name }}</td>
            <td> <a href="{{ route('posts.show', $post->id) }}"> {{ $post->title }} </a></td>
      			<td><a href="{{ route('posts.edit', $post -> id) }}" class="btn btn-sm btn-info">Edit</a></td>
      			<td><a href="{{ route('posts.trash', $post -> id) }}" class="btn btn-sm btn-warning">Trash</a></td>
					</tr>
          </tr>
        @endforeach
        </tbody>
        @endif
      </table>
    </div>
    <div style="padding: 12px;background: aliceblue;">
      {{ $posts->links() }}
    </div>
  </div>
</div>

		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
@endsection