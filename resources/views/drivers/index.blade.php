@extends('app')
	@include('includes.logistics.sidebar')
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
            <h3 class="box-title">Choferes</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>N&uacute;mero de multas</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($drivers as $driver)
								<tr>
									<td><a href="{{ action('DriversController@show', $driver->id) }}"> {{ $driver->name }} </a></td>
									<td> {{ $driver->last_name }} </td>
									<td> {{ $driver->number_of_tickets }} </td>
									<td> 
                    {!! Html::link(route('drivers.edit', $driver->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                  </td>
									<td> 
                    {!! Form::open(array('route' => array('drivers.destroy', $driver->id), 'method' => 'DELETE')) !!}
                      <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                    {!! Form::close() !!}
                  </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>N&uacute;mero de multas</th>
                  <th colspan="2">Acciones</th> 
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

	@stop