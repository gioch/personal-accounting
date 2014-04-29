@extends('layouts/master')


@section('content')

	<h1> Add Month Info </h1>

	{{ Form::open([ 'url' => 'monthinfo', 'method' => 'post' ]) }}

		<div  class="form-group"> 
			{{ Form::label('year', 'Year:') }}
			<select name='year'>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
			</select>
		</div>

		<div  class="form-group"> 
			{{ Form::label('month', 'Month:') }}
			<select name='month'>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
		</div>

		<div  class="form-group"> 
			{{ Form::label('possible_charge', 'Possible Charge:') }}
			{{ Form::text('possible_charge') }}
		</div>
		 
		<div class="form-group">
			{{ Form::submit('Add Month Info') }}
		</div>


	{{ Form::close() }}

@stop