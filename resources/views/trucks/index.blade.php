
@extends('app')

	@include('includes.admin.sidebar')
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
            <h3 class="box-title">Camiones</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>A&ntilde;o</th>
                  <th>Placas</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($trucks as $truck)
								<tr>
									<td> <a href="{{ action('TrucksController@show', $truck->id) }}"> {{ $truck->model }} </a> </td>
                  <td> {{ $truck->brand }} </td>
									<td> {{ $truck->year }} </td>
                  <td> {{ $truck->plates }}</td>
									<td> 
                    {!! Html::link(route('trucks.edit', $truck->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                  </td>
                  <td> 
                    {!! Form::open(array('route' => array('trucks.destroy', $truck->id), 'method' => 'DELETE')) !!}
                      <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                    {!! Form::close() !!}
                  </td>
								</tr> 
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>A&ntilde;o</th>
                  <th>Placas</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>  
	@stop

