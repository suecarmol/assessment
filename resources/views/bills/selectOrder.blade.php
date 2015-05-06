@extends('app')
	@include('includes.billing.sidebar')
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
            <h3 class="box-title">Selecciona una Orden para generar la factura</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
          {!! Form::open(['action' => ['BillsController@getOrder'], 'method' => 'get']) !!}
            <div class="form-group">  
              {!! Form::label('order_id', '&Oacute;rdenes') !!}
              {!! Form::select('order_id', $order_numbers, null, [
                'class' => 'form-control'
              ]) !!}
            </div>
            {!! Form::submit('Generar', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
	@stop