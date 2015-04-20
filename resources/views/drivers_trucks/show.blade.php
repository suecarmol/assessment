@extends('app')
	@include('includes.logistics.sidebar')
	@section('content')
		<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Asignaci&oacute;n</h3>
			</div>
			<div class="box-body">
				<h4>Cami&oacute;n</h4>
				<h5> {{$driver_truck->truck_id}} </h5>

				<h4>Chofer</h4>
				<h5> {{$driver_truck->driver_id}} </h5>

				<h4>Fecha de asignaci&oacute;n</h4>
				<h5> {{$driver_truck->date_assigned}} </h5>

				{!! Html::link(route('drivers_trucks.index'), 'Regresar a Asignaciones', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>
	@stop