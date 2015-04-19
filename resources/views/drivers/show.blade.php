@extends('app')
	@include('includes.client_service.sidebar')
	@section('content')
		<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Chofer {{ $driver->name}} {{ $driver->last_name}}</h3>
			</div>
			<div class="box-body">
				<h4>Nombre</h4>
				<h5> {{$driver->name}} </h5>

				<h4>Apellidos</h4>
				<h5> {{$driver->last_name}} </h5>

				<h4>N&uacute;mero de multas</h4>
				<h5> {{$driver->number_of_tickets}} </h5>

				{!! Html::link(route('orders.index'), 'Regresar a &Oacute;rdenes', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>
	@stop