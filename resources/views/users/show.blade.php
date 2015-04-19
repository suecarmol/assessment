@extends('app')
	@include('includes.admin.sidebar')
	@section('content')
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3>Usuario {{ $user->name }} {{ $user->last_name }}</h3>
				</div>
				<div class="box-body">
					<h4>Nombre</h4>
					<h5> {{ $user->name }} </h5>

					<h4>Apellidos</h4>
					<h5> {{ $user->last_name }} </h5>

					<h4>Correo electr&oacute;nico</h4>
					<h5> {{ $user->email }} </h5>

					<h4>Compa&ntilde;&iacute;a</h4>
					<h5> {{ $user->company }} </h5>

					<h4>Tipo de usuario</h4>
					<h5> {{ $user->user_type }} </h5>
					{!! Html::link(route('users.index'), 'Regresar a Usuarios', array('class' => 'btn btn-block btn-info')) !!}
				</div>
			</div>
		</div>
	@stop