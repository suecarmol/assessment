
@extends('app')
  
  @if(\Auth::user()->user_type == 'admin')
	 @include('includes.admin.sidebar')
  @elseif(\Auth::user()->user_type == 'billing')
    @include('includes.billing.sidebar') 
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
            <h3 class="box-title">Productos</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Precio</th>
                  @if(\Auth::user()->user_type == 'admin')
                    <th colspan="2">Acciones</th>
                  @endif  
                </tr>
              </thead>
              <tbody>
								@foreach($products as $product)
								<tr>
									<td> {{ $product->product_name }} </td>
									<td> {{ $product->price }} </td>
                  @if(\Auth::user()->user_type == 'admin')
  									<td> 
                      {!! Html::link(route('products.edit', $product->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                    </td>
  									<td> 
                      {!! Form::open(array('route' => array('products.destroy', $product->id), 'method' => 'DELETE')) !!}
                        <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                      {!! Form::close() !!}
                    </td>
                  @endif  
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Precio</th>
                  @if(\Auth::user()->user_type == 'admin')
                    <th colspan="2">Acciones</th>
                  @endif 
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>  
	@stop

