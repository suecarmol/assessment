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
            <h3 class="box-title">Asignaci&oacute;n de Choferes a Camiones</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Cami&oacute;n</th>
                  <th>Chofer</th>
                  <th>Fecha de asignaci&oacute;n</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($truck_driver as $truck_driver)
								<tr>
									<td><a href="{{ action('TrucksDriversController@show', $truck_driver->id) }}"> {{ $truck_driver->truck_id }} </a></td>
									<td> {{ $truck_driver->driver_id }} </td>
									<td> {{ $truck_driver->date_assigned }} </td>
									<td> 
                    {!! Html::link(route('drivers_trucks.edit', $truck_driver->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                  </td>
									<td> 
                    {!! Form::open(array('route' => array('drivers_trucks.destroy', $truck_driver->id), 'method' => 'DELETE')) !!}
                      <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                    {!! Form::close() !!}
                  </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Cami&oacute;n</th>
                  <th>Chofer</th>                  
                  <th>Fecha de asignaci&oacute;n</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

	@stop