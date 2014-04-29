@extends('layouts/master')

@section('content')

	<h1>Create User</h1>

	{{ Form::open([ 'url' => 'users', 'method' => 'post' ]) }} 

		<div  class="form-group"> 
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
		</div>

		<div  class="form-group"> 
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</div>  

		<div  class="form-group"> 
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</div> 

		<div class="form-group">
			{{ Form::submit('Create User') }}
		</div>


	{{ Form::close() }}

@stop