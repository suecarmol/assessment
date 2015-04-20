<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($bill))
				<h3 class="box-title">Actualizar Factura {{$bill->bill_number}} </h3>
			@else
				<h3 class="box-title">Crear Factura</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($bill))
				{!! Form::model($bill, ['route' => ['bills.update', $bill->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'bills.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('company_name', 'Compa&ntilde;&iacute;a') !!}
					{!! Form::text('company_name', null, [
						'class' => 'form-control',
						'placeholder' => 'Compa&ntilde;&iacute;a'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('quantity_delivered', 'Cantidad entregada') !!}
					{!! Form::text('quantity_delivered', null, [
						'class' => 'form-control',
						'placeholder' => 'Cantidad entregada'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('total_price', 'Precio total') !!}
					{!! Form::text('total_price', null, [
						'class' => 'form-control',
						'placeholder' => 'Precio total'
					]) !!}
				</div>
				{!! Form::label('valid_thru', 'V&aacute;lida hasta') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('valid_thru', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'V&aacute;lida hasta'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('driver_id', 'Chofer que entreg&oacute;') !!}
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

