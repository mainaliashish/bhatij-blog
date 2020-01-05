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
     List of All Trashed Posts
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Category</th>
            <th data-breakpoints="xs">Title</th>
            <th>Restore</th>
            <th>Delete</th>
          </tr>
        </thead>
        @if($posts)
        <tbody>
        @foreach($posts as $post)
          <tr>
            <td><img src="{{ $post->image }}" alt="{{ $post->title }}" height="90px" width="120px"></td>
            <td>{{ 'Category' }}</td>
            <td>{{ $post->title }}</td>
      			<td><a href="{{ route('posts.restore', $post -> id) }}" class="btn btn-sm btn-info">Restore</a></td>
      			<td><a href="{{ route('posts.delete', $post -> id) }}" class="btn btn-sm btn-danger">Delete</a></td>
					</tr>
          </tr>
        @endforeach
        </tbody>
        @endif
      </table>
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