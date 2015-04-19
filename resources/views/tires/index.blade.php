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
            <h3 class="box-title">Llantas</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Marca</th>
                  <th>No. serie</th>
                  <th>Agregada al cami&oacute;n</th>
                  <th colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody>
								@foreach($tires as $tire)
								<tr>
									<td><a href="{{ action('TiresController@show', $tire->id) }}"> {{ $tire->brand }} </a></td>
									<td> {{ $tire->serial_number }} </td>
									<td> {{ $tire->date_added_to_truck }} </td>
									<td> 
                    {!! Html::link(route('tires.edit', $tire->id), 'Actualizar', array('class' => 'btn btn-block btn-info')) !!}
                  </td>
									<td> 
                    {!! Form::open(array('route' => array('tires.destroy', $tire->id), 'method' => 'DELETE')) !!}
                      <button type="submit" class="btn btn-block btn-danger">Borrar</button>
                    {!! Form::close() !!}
                  </td>
								</tr>
								@endforeach	
							</tbody>
							<tfoot>
                <tr>
                  <th>Marca</th>
                  <th>No. serie</th>
                  <th>Agregada al cami&oacute;n</th>
                  <th colspan="2">Acciones</th> 
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

	@stop