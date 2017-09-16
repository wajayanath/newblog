@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>Hello, {{ $user->name }}</h1>
 		</div>
 	</div>
	<div class="col-sm-12">
		<h1 class="page-header">Latest Blogs</h1>
			@if ($user->blog)
				<ul>
					@foreach ($blog as $blog)
							<li style="list-style-type: none;">
							<button class="btn btn-success btn-xs">{{ $blog->status == 0 ? 'Draft' : 'Published' }}</button>
								<a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a>
							</li>
							<br>
					@endforeach
				</ul>
			@endif
	</div>


 </main>

<hr>

@endsection