<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($service))
				<h3 class="box-title">Actualizar {{$service->service_number}} </h3>
			@else
				<h3 class="box-title">Crear Servicio</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($service))
				{!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'services.store']) !!}
			@endif	
				{!! Form::label('start_of_service', 'Inicio de servicio') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('start_of_service', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Inicio de servicio'
					]) !!}
				</div>
				{!! Form::label('end_of_service', 'Fin de servicio') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('end_of_service', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Fin de servicio'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('type_of_service', 'Tipo de servicio') !!}
					{!! Form::text('type_of_service', null, [
						'class' => 'form-control',
						'placeholder' => 'Tipo de servicio'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('number_of_delays', 'N&uacute;mero de demoras') !!}
					{!! Form::text('number_of_delays', null, [
						'class' => 'form-control',
						'placeholder' => 'N&uacute;mero de demoras'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('truck_id', 'Cami&oacute;n (Placas)') !!}
					{!! Form::select('truck_id', $trucks, null, [
						'class' => 'form-control'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($service))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

