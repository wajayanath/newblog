@extends('layouts.app')
@section('content')

<main class="container-fluid">
 	<div class="container-fluid">
 		<div class="jumbotron">
			<h1>Hello, {{ $user->name }}</h1>
 		</div>
 	</div>

	<div class="col-sm-12">
	<h1 class="page-header">Latest Blog</h1>
		{{ $user->blog }}
	</div>


 </main>

<hr>

@endsection