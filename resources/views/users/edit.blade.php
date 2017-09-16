@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>Hello, {{ $user->name }}</h1>
			<p>Please make changes to make your profile awesome</p>
 		</div>
 	</div>

	<div class="col-sm-8 col-sm-offset-2">
		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->username]]) !!}
		<div class="form-group">
			{!! Form::label("name", "Name") !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Your name']) !!}
		</div>
		<div class="form-group">
			{!! Form::label("about", "About") !!}
			{!! Form::textarea('about', null, ['class' => 'form-control', 'placeholder' => 'Write about Yourself']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		</div>
	
		{!! Form::close() !!}
	</div>


 </main>

<hr>

@endsection