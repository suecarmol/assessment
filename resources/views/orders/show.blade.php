@extends('app')
	@include('includes.client_service.sidebar')
	@section('content')
		<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Orden {{ $order->order_number}}</h3>
			</div>
			<div class="box-body">
				<h4>N&uacute;mero de orden</h4>
				<h5> {{$order->order_number}} </h5>

				<h4>Compa&ntilde;&iacute;a</h4>
				<h5> {{$order->comapny_name}} </h5>

				<h4>Cantidad</h4>
				<h5> {{$order->product_quantity}} </h5>

				<h4>Precio</h4>
				<h5> {{$order->total_price}} </h5>

				<h4>Fecha de entrega</h4>
				<h5> {{$order->date_of_delivery}} </h5>

				<h4>Destino</h4>
				<h5> {{$order->destination}} </h5>

				<h4>Producto</h4>
				<h5> {{$order->product_id}} </h5>
				{!! Html::link(route('orders.index'), 'Regresar a &Oacute;rdenes', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>
	@stop