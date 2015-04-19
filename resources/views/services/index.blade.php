@extends('app')
	@include('includes.maintenance.sidebar')
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
            <h3 class="box-title">Servicios</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Inicio de servicio</th>
                  <th>Fin de servicio</th>
                  <th>Tipo de servicio</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($services as $service)
								<tr>
									<td><a href="{{ action('ServicesController@show', $service->id) }}"> {{ $service->start_of_service }} </a></td>
									<td> 
                    @if($service->end_of_service == null || $service->end_of_service == '1970-01-01 00:00:00')
                      El cami&oacute;n sigue en servicio.
                    @else
                      {{$service->end_of_service}} 
                    @endif 
                  </td>
									<td> {{ $service->type_of_service }} </td>
									<td> 
                    {!! Html::link(route('services.edit', $service->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                  </td>
									<td> 
                    {!! Form::open(array('route' => array('services.destroy', $service->id), 'method' => 'DELETE')) !!}
                      <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                    {!! Form::close() !!}
                  </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Inicio de servicio</th>
                  <th>Fin de servicio</th>
                  <th>Tipo de servicio</th>
                  <th colspan="2">Acciones</th> 
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

	@stop