@extends('app')
	@include('includes.maintenance.sidebar')
	@section('content')
		<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Orden {{ $service->service_number}}</h3>
			</div>
			<div class="box-body">
				<h4>N&uacute;mero de servicio</h4>
				<h5> {{$service->service_number}} </h5>

				<h4>Inicio de servicio</h4>
				<h5> {{$service->start_of_service}} </h5>

				<h4>Fin de servicio</h4>
				<h5> 
					@if($service->end_of_service == null || $service->end_of_service == '1970-01-01 00:00:00')
						El cami&oacute;n sigue en servicio.
					@else
						{{$service->end_of_service}} 
					@endif
				</h5>

				<h4>N&uacute;mero de demoras</h4>
				<h5> {{$service->number_of_delays}} </h5>

				<h4>Cami&oacute;n</h4>
				<h5> {{$service->truck_id}} </h5>

				<h4>Aprob&oacute; servicio</h4>
				<h5> {{$service->user_id}} </h5>
				{!! Html::link(route('services.index'), 'Regresar a Servicios', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>
	@stop