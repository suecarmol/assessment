<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Crear Producto</h3>
		</div>
		
		<div class="box-body">
			{!! Form::open(['route' => 'products.store']) !!}
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
					{!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
			
	</div>
</div>