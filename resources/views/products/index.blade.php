
@extends('app')

	@include('includes.admin.sidebar')
	@section('content')

    @if (Session::has('message'))
      <div class="alert alert-success alert-dismissable">{{ Session::get('message') }}</div>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <h4> <i class="icon fa fa-check"></i> &Eacute;xito </h4>
      Se ha insertado la informaci&oacute;n exitosamente.
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
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($products as $product)
								<tr>
									<td> {{ $product->product_name }} </td>
									<td> {{ $product->price }} </td>
									<td> <button class="btn btn-block btn-info">Actualizar</button>  </td>
									<td> <button class="btn btn-block btn-danger">Borrar</button> </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Nombre</th>
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

