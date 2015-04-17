<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($truck))
				<h3 class="box-title">Actualizar {{$truck->model}} Placas {{ $truck->plates }}</h3>
			@else
				<h3 class="box-title">Crear Cami&oacute;n</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($truck))
				{!! Form::model($truck, ['route' => ['trucks.update', $truck->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'trucks.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('model', 'Modelo') !!}
					{!! Form::text('model', null, [
						'class' => 'form-control',
						'placeholder' => 'Modelo'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('brand', 'Marca') !!}
					{!! Form::text('brand', null, [
						'class' => 'form-control',
						'placeholder' => 'Marca'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('year', 'A&ntilde;o') !!}
					{!! Form::text('year', null, [
						'class' => 'form-control',
						'placeholder' => 'A&ntilde;o'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('plates', 'Placas') !!}
					{!! Form::text('plates', null, [
						'class' => 'form-control',
						'placeholder' => 'Placas'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('capacity', 'Capacidad') !!}
					{!! Form::text('capacity', null, [
						'class' => 'form-control',
						'placeholder' => 'Capacidad'
					]) !!}
				</div>
				{!! Form::label('date_last_service', 'Fecha del &uacute;ltimo servicio') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_last_service', null, [
						'class' => 'form-control',
						'data-provide'=> 'datepicker'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($truck))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

