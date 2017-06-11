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
					<h2><a href="{{ action('BlogController@show', [$blog->id]) }}">{{ $blog->title }}</a></h2>
					<p>{{ $blog->body }}</p>
				</article>
			@endforeach
 		</div>
 	</div>
 </main>

<hr>



@endsection