@extends('layouts.app')

@section('content')
	<a href="/posts" class="btn btn-default">Go back</a>
	
	<div class="container">
		<div class="row">
			<div class ="col-md-8 col-sm-8">
				<h1><b>{{$post->title}}</b></h1>
			</div>s
		</div>
	
		<div class="row">
			<div class ="col-md-8 col-sm-8">
				<h3>{!!$post->body!!}</h3>
			</div>
			<div class ="col-md-4 col-sm-4">
				
				<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
			</div>
		</div>
		<div class="row">
			<hr>
			<hr><small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
	
			@if(!Auth::guest() && $post->user_id == Auth::user()->id)
				<hr>
				<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
		
				{!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class' => 'pull-right'])!!}
				{{Form::hidden('_method', 'DELETE')}}
				{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
				{!!Form::close()!!}
			@endif
		</div>
	</div>
		
		
	</div>
	
@endsection