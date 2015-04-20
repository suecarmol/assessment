@extends('app')
	@include('includes.billing.sidebar')
	@section('content')
		<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Ruta {{ $route->route_number}}</h3>
			</div>
			<div class="box-body">
				<h4>N&uacute;mero de ruta</h4>
				<h5> {{$route->route_number}} </h5>

				<h4>Origen</h4>
				<h5> {{$route->origin}} </h5>

				<h4>Destino</h4>
				<h5> {{$route->destination}} </h5>

				<h4>Fecha de salida</h4>
				<h5> {{$route->date_of_departure}} </h5>

				<h4>Chofer</h4>
				<h5> {{$route->driver_id}} </h5>
				{!! Html::link(route('routes.index'), 'Regresar a Rutas', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>
	@stop