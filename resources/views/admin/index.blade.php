@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>Admin Control Pannel</h1>
 		</div>
 		<div class="col-sm-8 col-sm-offset-2">
 			<button class="btn btn-primary link"><a style="color:#fff" href="{{ url('/blog/create') }}">Create Blog</a></button>
 			<button class="btn btn-danger link"><a style="color:#fff" href="{{ url('/blog/bin') }}">Trashed Blog</a></button>
 			<button class="btn btn-primary link"><a style="color:#fff" href="{{ url('/userslist') }}">Users</a></button>
 			<button class="btn btn-default link"><a style="color:#333" href="{{ url('/categories/create') }}">Create Categories</a></button>
 		</div>
 	</div>

	<div class="col-sm-12">
	<h1 class="page-header">Recent Blog</h1>
		<div class="table-responsive">
			<table class="table table-sthipped">
				<thead>
					<tr>
						<th>blog Title</th>
						<th>blog Content</th>
						<th>status</th>
						<th>settings</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach ($blogs as $blog)
								{!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) !!}
						@include('partials.error-message')
									<tr>
									<td>
									{!! Form::text('title', null, ['class' => 'form-control']) !!}
									<a class="btn btn-danger btn-xs" href="{{ action('BlogController@edit', [$blog->id]) }}">Edit</a>
									</td>
									<td>{!! Form::textarea('body', null, ['class' => 'form-control']) !!}</td>
									<td>{!! Form::select("status", ['0' => 'Draft', '1' => 'published'], null , ['class' => 'btn btn-primary']) !!} </td>
									<td>{!! Form::submit('submit', ['class' => 'btn btn-success']) !!}</td>
									</tr>
									{!! Form::close() !!}
						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
	</div>


 </main>

<hr>



@endsection