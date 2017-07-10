@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
		<h1>Welcome to lingo</h1>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6"><img style="width:100%" src="/storage/cover_images/indexHoofd.JPG"></div>
			<div class="col-md-3"></div>	
		</div>
		<br><br>
		<div class="row">
			@if(Auth::guest())
				<p>
				<a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
				<a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
				</p>
			@else
				<a class="btn btn-success btn-lg" href="/games" role="button">Play Lingo</a>
			@endif
		</div>
	</div>
	
@endsection
