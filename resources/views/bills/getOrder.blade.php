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
            <h3 class="box-title">Factura de Orden </h3>
          </div><!-- /.box-header -->
          <div class="box-body">
      
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
	@stop