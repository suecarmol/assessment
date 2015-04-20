@extends('app')
	@if(\Auth::user()->user_type == 'admin')
	 @include('includes.admin.sidebar')
  @elseif(\Auth::user()->user_type == 'maintenance') 
    @include('includes.maintenance.sidebar')
  @else
    @include('includes.logistics.sidebar')
  @endif  
	@section('content')

	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Cami&oacute;n {{ $truck->model}}</h3>
			</div>
			<div class="box-body">
				<h4>Modelo</h4>
				<h5> {{$truck->model}} </h5>

				<h4>Marca</h4>
				<h5> {{$truck->brand}} </h5>

				<h4>Placas</h4>
				<h5> {{$truck->plates}} </h5>

				<h4>A&ntilde;o</h4>
				<h5> {{$truck->year}} </h5>

				<h4>Capacidad</h4>
				<h5> {{$truck->capacity}} </h5>

				<h4>Fecha del &uacute;ltimo servicio</h4>
				<h5> {{$truck->date_last_service}} </h5>
				{!! Html::link(route('trucks.index'), 'Regresar a Camiones', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>

	@stop