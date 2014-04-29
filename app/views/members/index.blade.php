@extends('layouts/master')


@section('content')

	<h1> All Members </h1>

	<ul>

	@foreach($members as $member)

		<li> Name: {{ $member->name }} - {{ link_to("members/$member->id/edit", 'Edit') }}</li>

	@endforeach

	</ul>

@stop