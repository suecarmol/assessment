@extends('app')
	@include('includes.maintenance.sidebar')
	@section('content')
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3>Llanta {{ $tire->serial_number}}</h3>
				</div>
				<div class="box-body">
					<h4>Marca</h4>
					<h5> {{ $tire->brand }} </h5>

					<h4>Agregada al cami&oacute;n</h4>
					<h5> {{ $tire->date_added_to_truck }} </h5>

					<h4>Fecha &uacute;ltimo servicio</h4>
					<h5> {{ $tire->date_last_service }} </h5>

					<h4>Removida del cami&oacute;n</h4>
					<h5> {{$tire->date_removed}} </h5>

					<h4>Cami&oacute;n</h4>
					<h5> {{$tire->truck_id}} </h5>

					{!! Html::link(route('tires.index'), 'Regresar a Llantas', array('class' => 'btn btn-block btn-info')) !!}
				</div>
			</div>
		</div>
	@stop