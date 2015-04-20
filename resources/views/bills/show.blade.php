@extends('app')
	@include('includes.billing.sidebar')
	@section('content')
		<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3>Factura {{ $bill->bill_number}}</h3>
			</div>
			<div class="box-body">
				<h4>N&uacute;mero de factura</h4>
				<h5> {{$bill->bill_number}} </h5>

				<h4>Compa&ntilde;&iacute;a</h4>
				<h5> {{$bill->company_name}} </h5>

				<h4>Cantidad entregada</h4>
				<h5> {{$bill->quantity_delivered}} </h5>

				<h4>Precio total</h4>
				<h5> {{$bill->total_price}} </h5>

				<h4>V&aacute;lida hasta</h4>
				<h5> {{$bill->valid_thru}} </h5>

				<h4>Chofer</h4>
				<h5> {{$bill->driver_id}} </h5>
				{!! Html::link(route('bills.index'), 'Regresar a Facturas', array('class' => 'btn btn-block btn-info')) !!}
			</div>
		</div>
	</div>
	@stop