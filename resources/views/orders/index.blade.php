@extends('app')
  @if(\Auth::user()->user_type =='client_service')
	 @include('includes.client_service.sidebar')
  @else
    @include('includes.clients.sidebar')
  @endif 
	@section('content')

		@if (Session::has('message'))
      <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <h4> <i class="icon fa fa-check"></i> &Eacute;xito </h4>
      {{ Session::get('message') }}
      </div>
    @endif 

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">&Oacute;rdenes</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Compa&ntilde;&iacute;a</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($orders as $order)
								<tr>
									<td><a href="{{ action('OrdersController@show', $order->id) }}"> {{ $order->comapny_name }} </a></td>
									<td> {{ $order->product_quantity }} </td>
									<td> {{ $order->total_price }} </td>
									<td> 
                    {!! Html::link(route('orders.edit', $order->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                  </td>
									<td> 
                    {!! Form::open(array('route' => array('orders.destroy', $order->id), 'method' => 'DELETE')) !!}
                      <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                    {!! Form::close() !!}
                  </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Compa&ntilde;&iacute;a</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th colspan="2">Acciones</th> 
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

	@stop