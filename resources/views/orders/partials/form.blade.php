<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($order))
				<h3 class="box-title">Actualizar {{$order->company_name}} </h3>
			@else
				<h3 class="box-title">Crear Orden</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($order))
				{!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'orders.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('comapny_name', 'Compa&ntilde;&iacute;a') !!}
					{!! Form::text('comapny_name', null, [
						'class' => 'form-control',
						'placeholder' => 'Compa&ntilde;&iacute;a'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('product_quantity', 'Cantidad') !!}
					{!! Form::text('product_quantity', null, [
						'class' => 'form-control',
						'placeholder' => 'Cantidad'
					]) !!}
				</div>
				{!! Form::label('date_of_delivery', 'Fecha de entrega') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-calendar"></i></div>
					{!! Form::text('date_of_delivery', null, [
						'class' => 'form-control',
						'data-provide' => 'datepicker',
						'placeholder' => 'Fecha de entrega'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('destination', 'Destino') !!}
					{!! Form::text('destination', null, [
						'class' => 'form-control',
						'placeholder' => 'Destino'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('product_id', 'Producto') !!}
					{!! Form::select('product_id', $products, null, [
						'class' => 'form-control'
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
					@if(isset($order))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

