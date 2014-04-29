@extends('layouts/master')


@section('content')

	<h1> Add Member </h1>

	{{ Form::open(['route' => ['members.update', $member->id], 'method' => 'PUT'], $member->id ) }} 

		<div  class="form-group"> 
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', $member->name) }}
		</div>
		 
		<div class="form-group">
			{{ Form::submit('Update Member') }}
		</div>


	{{ Form::close() }}

@stop