@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
		<article>

			<div class="col-sm-12 text-center">
				@if ($blog->photo)
						<img class="img-responsive featured_image" src="/images/{{ $blog->photo ? $blog->photo->photo : '' }}" alt="">
				@endif
			</div>
			<div class="jumbotron">
				<h1>{{ $blog->title }}</h1><a style="float: right;" href="{{ action('BlogController@edit', [$blog->id]) }}">Edit</a>
	 		</div>
	 		
	 		<div class="col-sm-8 col-sm-offset-2">
					<article>
						<p>{{ $blog->body }}</p>
						@foreach ($blog->category as $category)
							<p><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></p>
						@endforeach
					</article>
	 		</div>
		</article>
 	</div>
 </main>
<hr>

@endsection