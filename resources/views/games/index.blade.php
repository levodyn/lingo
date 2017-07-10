@extends('layouts.app')

@section('content')



<div class="jumbotron text-center">
<h1>Play Dutch Lingo</h1>
<br><br>
</div> 


<div class="container">

	<div class="row">
		<a href="/games" class="btn btn-primary pull-right">New Game</a><br>
		{!! Form::open(['action' => 'GamesController@post', 'method' => 'POST']) !!}
		<div class="form-group">
			{{Form::label('guess', 'Whats the word')}}
			{{Form::text('guess', '', ['class' => 'form-control', 'placeholder' => 'Place your guess here','autocomplete'=>'off'])}}
		</div>
		{{Form::submit('Guess!', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
	</div>
	<br><br>
	<div class="row">
		<div class="col-sm-11">
			<table class="table table-bordered" style="background-color: blue;color:white;">
			
				@for ($i = 0; $i < 5; $i++)
					<tr>
					@for ($j = 0; $j < 5; $j++)
						@if($i == 0 && $j == 0)
							<td align="center" valign="middle" bgcolor="red">
						@else
						<td align="center" valign="middle">
						@endif
							@if($i == 0 && $j ==0)
								<h3>{{$letter}}</h3>
							@else 
								@if($i==0)
									<h3>.</h3>
								@else
									<h3 style="color:blue">H</h3>
								@endif
							@endif
						</td>
					@endfor
					</tr>
				@endfor
			
			</table>
		</div>
	</div>
 </div>


 
 
@endsection