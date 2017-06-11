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
 			<button class="btn btn-primary link"><a style="color:#fff" href="{{ url('/users') }}">Users</a></button>
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
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach ($blogs as $blog)
							<tr>
								<th>{{ $blog->title }}</th>
								<th>{!! str_limit($blog->body, 100) !!}</th>
								<th>{{ $blog->status == 0 ? 'Draft' : 'Published' }}</th>
								<td>
							{!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) !!}
							{!! Form::select("status", ['0' => 'Draft', '1' => 'published'], null , ['class' => 'btn btn-primary']) !!} </td><td>
								{!! Form::submit('submit', ['class' => 'btn btn-success']) !!}
								{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
	</div>


 </main>

<hr>



@endsection