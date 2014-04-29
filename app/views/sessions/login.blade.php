@extends('layouts/master')

@section('content')

	<h1> Login </h1>

	{{ Form::open([ 'route' => 'sessions.store', 'method' => 'post' ]) }} 

		<div  class="form-group"> 
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
		</div>

		<div  class="form-group"> 
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</div>

		<div class="form-group">
			{{ Form::submit('Create User') }}
		</div>


	{{ Form::close() }}

@stop