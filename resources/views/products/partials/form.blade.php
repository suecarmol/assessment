<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">
			@if(isset($product))
				<h3 class="box-title">Actualizar {{$product->product_name}}</h3>
			@else
				<h3 class="box-title">Crear Producto</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($product))
				{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'products.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('product_name', 'Nombre del Producto') !!}
					{!! Form::text('product_name', null, [
						'class' => 'form-control',
						'placeholder' => 'Nombre'
					]) !!}
				</div>
					{!! Form::label('price', 'Precio') !!}
				<div class="input-group">	
					<span class="input-group-addon"> <i class="fa fa-dollar"></i> </span>
					{!! Form::text('price', null, [
						'class' => 'form-control',
						'placeholder' => 'Precio'
					]) !!}
				</div>
				<div class="box-footer">
					@if(isset($product))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>