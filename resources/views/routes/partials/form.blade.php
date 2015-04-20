<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($route))
				<h3 class="box-title">Actualizar Ruta {{$route->route_number}} </h3>
			@else
				<h3 class="box-title">Crear Ruta</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($route))
				{!! Form::model($route, ['route' => ['routes.update', $route->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'routes.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('origin', 'Origen') !!}
					{!! Form::text('origin', null, [
						'class' => 'form-control',
						'placeholder' => 'Origen'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('destination', 'Destino') !!}
					{!! Form::text('destination', null, [
						'class' => 'form-control',
						'placeholder' => 'Destino'
					]) !!}
				</div>
				{!! Form::label('date_of_departure', 'Fecha de salida') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_of_departure', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Fecha de salida'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('driver_id', 'Chofer') !!}
					{!! Form::select('driver_id', $drivers, null, [
						'class' => 'form-control'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($bill))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

