@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>User Control Pannel</h1>
 		</div>
 		<div class="col-sm-8 col-sm-offset-2">
 			<button class="btn btn-primary link"><a style="color:#fff" href="{{ url('/blog/create') }}">Create Blog</a></button>
 			<button class="btn btn-danger link"><a style="color:#fff" href="{{ url('/blog/bin') }}">Trashed Blog</a></button>
 		</div>
 	</div>

	<div class="col-sm-12">
	<h1 class="page-header">Recent Blog</h1>
		<div class="table-responsive">
			<table class="table table-sthipped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Join</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach ($users as $user)
							<tr>
								<td><a href="{{ route('users.show', $user->username) }}">{{ $user->username }}</a></td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at->DiffForHumans() }}</td>
								<td>
								{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
								{!! Form::select("role_id", ['1' => 'Administrator', '2' => 'Author', '3' => 'Subscriber'], null , ['class' => 'btn btn-primary']) !!} </td><td>
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