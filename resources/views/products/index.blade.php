
@extends('app')

	@include('includes.admin.sidebar')
	@section('content')

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
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>  
	@stop

