<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($truck_driver))
				<h3 class="box-title">Actualizar Asignaci&oacute;n</h3>
			@else
				<h3 class="box-title">Asignar un Chofer a un Cami&oacute;n</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($truck_driver))
				{!! Form::model($truck_driver, ['route' => ['drivers_trucks.update', $truck_driver->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'drivers_trucks.store']) !!}
			@endif	
			<div class="form-group">	
					{!! Form::label('truck_id', 'Cami&oacute;n') !!}
					{!! Form::select('truck_id', $trucks, null, [
						'class' => 'form-control'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('driver_id', 'Chofer') !!}
					{!! Form::select('driver_id', $drivers, null, [
						'class' => 'form-control'
					]) !!}
				</div>
				{!! Form::label('date_assigned', 'Fecha de asignaci&oacute;n') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_assigned', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Fecha de asignaci&oacute;n'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($truck_driver))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

