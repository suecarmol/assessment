
@extends('app')

	@include('includes.admin.sidebar')
	@section('content')

		<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Camiones</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>A&ntilde;o</th>
                  <th>Placas</th>
                </tr>
              </thead>
              <tbody>
								@foreach($trucks as $truck)
								<tr>
									<td> {{ $truck->model }} </td>
									<td> {{ $truck->year }} </td>
                  <td> {{ $truck->plates }}</td>
									<td> <button class="btn btn-block btn-info">Actualizar</button>  </td>
									<td> <button class="btn btn-block btn-danger">Borrar</button> </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Modelo</th>
                  <th>A&ntilde;o</th>
                  <th>Placas</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>  
	@stop

