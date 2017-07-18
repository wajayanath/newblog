@extends('layouts.app')
@include('partials.meta-static')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>latest blog posts</h1>
 		</div>
 		<div class="col-sm-8 col-sm-offset-2">
			@if (Session::has('flash_message'))
				<div class="alert alert-success">
					{{ Session::get('flash_message') }}	
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>				
				</div>
			@endif

 			@foreach ($blogs as $blog)
				<article>
					<h2><a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a></h2>
					<p>{{ $blog->body }}</p>
					<hr>
					<p><i class="fa fa-btn fa-user"></i> Blog by <a href="#">{{ $blog->user->name }}</a> <i class="fa fa-btn fa-clock-o"></i> Posted  <strong>{{ $blog->created_at->diffForHumans() }}</strong> @foreach($blog->category as $category) <i class="fa fa-btn fa-cubes"></i> <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a> @endforeach</p>
				</article>
			@endforeach
 		</div>
 	</div>
 </main>
<hr>
@endsection