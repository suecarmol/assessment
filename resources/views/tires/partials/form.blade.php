<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($tire))
				<h3 class="box-title">Actualizar {{$tire->serial_number}} </h3>
			@else
				<h3 class="box-title">Crear Llanta</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($tire))
				{!! Form::model($tire, ['route' => ['tires.update', $tire->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'tires.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('brand', 'Marca') !!}
					{!! Form::text('brand', null, [
						'class' => 'form-control',
						'placeholder' => 'Marca'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('serial_number', 'No. de serie') !!}
					{!! Form::text('serial_number', null, [
						'class' => 'form-control',
						'placeholder' => 'No. de serie'
					]) !!}
				</div>
				{!! Form::label('date_added_to_truck', 'Agregada al cami&oacute;n') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_added_to_truck', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Agregada al cami&oacute;n'
					]) !!}
				</div>
				{!! Form::label('date_last_service', 'Fecha &uacute;ltimo servicio') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_last_service', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Fecha &uacute;ltimo servicio'
					]) !!}
				</div>
				{!! Form::label('date_removed', 'Removida del cami&oacute;n') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_removed', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Removida del cami&oacute;n'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('truck_id', 'Cami&oacute;n') !!}
					{!! Form::select('truck_id', $trucks, null, [
						'class' => 'form-control'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($tire))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

