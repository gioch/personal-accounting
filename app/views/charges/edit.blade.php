@extends('layouts/master')

@section('content') 
 

	<h1> EditCharge </h1>

	{{ Form::open(['route' => ['charges.update', $charge->id], 'method' => 'PATCH']) }}

		<div  class="form-group"> 
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', $charge->title ) }}
		</div> 

		<div  class="form-group"> 
			{{ Form::label('amount', 'Amount:') }}
			{{ Form::text('amount', $charge->amount) }}
		</div> 

		<div  class="form-group"> 
			{{ Form::label('member', 'Member:') }}
			{{ Form::select('member', $members, $charge->family_member_id) }}
		</div> 

		<div  class="form-group"> 
			{{ Form::label('category', 'Category:') }}
			{{ Form::select('category', $categories, $charge->category_id) }}
		</div>

		<div  class="form-group"> 
			{{ Form::label('priority', 'Priority:') }}
			{{ Form::select('priority', $priorities, $charge->priority_id) }}
		</div>
		 
		<div class="form-group">
			{{ Form::submit('Edit Charge') }}
			{{ link_to('charges', 'Cancel') }}
		</div>

	{{ Form::close() }}

@stop