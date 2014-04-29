@extends('layouts/master')


@section('content')

	<h1> Add Member </h1>

	{{ Form::open([ 'route' => 'members.store', 'method' => 'post' ]) }} 

		<div  class="form-group"> 
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</div>
		 
		<div class="form-group">
			{{ Form::submit('Create Member') }}
		</div>


	{{ Form::close() }}

@stop