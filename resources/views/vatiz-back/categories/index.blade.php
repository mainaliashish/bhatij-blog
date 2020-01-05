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
     List of All Categories
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Editing</th>
            <th>Delete</th>
          </tr>
        </thead>
        @if($categories)
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>
              <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
            </td>
      			<td><a href="{{ route('categories.edit', $category -> id) }}" class="btn btn-sm btn-info">Edit</a></td>

      			<td><a href="{{ route('categories.delete', $category -> id) }}" class="btn btn-sm btn-danger">Delete</a></td>
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