@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>Hello, {{ Auth::User()->name }}</h1>
 		</div>
 	</div>

	<div class="col-sm-12">
	<h1 class="page-header">Profile</h1>

	</div>


 </main>

<hr>

@endsection