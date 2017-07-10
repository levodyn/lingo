@extends('layouts.app')

@section('content')



<div class="jumbotron text-center">
<h1>Play Dutch Lingo</h1>
<br><br>
</div> 


<div class="container">

	<div class="row">
		<a href="/games" class="btn btn-primary pull-right">New Game</a><br>
		@if(count($words)<5 && !($correct == 1))
			{!! Form::open(['action' => 'GamesController@post', 'method' => 'POST']) !!}
			<div class="form-group">
				{{Form::label('guess', 'Whats the word')}}
				{{Form::text('guess', '', ['class' => 'form-control', 'placeholder' => 'Place your guess here','autocomplete'=>'off'])}}
			<br>
			{{Form::submit('Guess!', ['class'=>'btn btn-primary'])}}  
			{!! Form::close() !!}
		@endif 
		
		</div>
	</div>
	<br><br>
	
	<div class="row">
		<div class="col-sm-11 col-md-11">
			<table class="table table-bordered" style="background-color: blue;color:white;">
			
				@if(count($words) > 0)
					@for($i = 0; $i < count($words); $i++)
						<tr>
						@for ($j = 0; $j < 5; $j++)
							@if($colors[$i][$j]=='#D7DF01')
								<td align="center" valign="middle" style="background-image:url(/storage/cover_images/yellow3.JPG);background-repeat:no-repeat;background-size:100%;"><h3>{{$words[$i][$j]}}</h3></td>
							@else
								<td align="center" valign="middle" bgcolor="{{$colors[$i][$j]}}"><h3>{{$words[$i][$j]}}</h3></td>
							@endif
						@endfor
						</tr>
					@endfor
				@endif
				
				@for ($i = 0; $i < 5-count($words); $i++)
					<tr>
					@for ($j = 0; $j < 5; $j++)
						@if($i == 0 && $correct == 0 && $nextLine[$j] != '.' ) 
							<td align="center" valign="middle" bgcolor="red">
						@else
							<td align="center" valign="middle">
						@endif
							@if($i == 0 && !($correct == 1) ) 
								<h3>{{$nextLine[$j]}}</h3>
							@else
								<h3 style="color:blue;">.</h3>
							@endif
						</td>
					@endfor
					</tr>
				@endfor
				@if(count($words) == 5 && !($correct == 1))
					<tr>
					@for ($i = 0; $i <5; $i++)
						<td align="center" valign="middle" bgcolor="red"><h3>{{$answer[$i]}}</h3></td>
					@endfor
					</tr>
				@endif
			</table>
		</div>
	</div>
 </div>



				
 
@endsection