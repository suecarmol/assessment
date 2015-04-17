@extends('app')
	@include('includes.admin.sidebar')
	@section('content')
		<h1>Cami&oacute;n {{ $truck->model}}</h1>

		<h2>Modelo</h2>
		<h4> {{$truck->model}} </h4>

		<h2>Marca</h2>
		<h4> {{$truck->brand}} </h4>

		<h2>Placas</h2>
		<h4> {{$truck->plates}} </h4>

		<h2>A&ntilde;o</h2>
		<h4> {{$truck->year}} </h4>

		<h2>Capacidad</h2>
		<h4> {{$truck->capacity}} </h4>

		<h2>Fecha del &uacute;ltimo servicio</h2>
		<h4> {{$truck->date_last_service}} </h4>

	@stop