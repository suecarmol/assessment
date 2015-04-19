<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($driver))
				<h3 class="box-title">Actualizar Chofer {{$driver->name}} {{$driver->last_name}} </h3>
			@else
				<h3 class="box-title">Crear Chofer</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($driver))
				{!! Form::model($driver, ['route' => ['drivers.update', $driver->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'drivers.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', null, [
						'class' => 'form-control',
						'placeholder' => 'Nombre'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('last_name', 'Apellidos') !!}
					{!! Form::text('last_name', null, [
						'class' => 'form-control',
						'placeholder' => 'Apellidos'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('number_of_tickets', 'N&uacute;mero de multas') !!}
					{!! Form::text('number_of_tickets', null, [
						'class' => 'form-control',
						'placeholder' => 'N&uacute;mero de multas'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($driver))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

