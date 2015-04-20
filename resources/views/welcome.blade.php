@extends('app')
  @section('content')
    <div class="col-md-10">
      <div class="box box-solid">
        <div class="box-body">
          <img src="{{ asset('dist/img/rsz_1rsz_1felina-1.jpg') }}" alt="Felina-1">
        </div> {{-- end box-body --}}
        <div class="box-footer">
          {!! Html::link(route('products.index'), 'Login', array('class' => 'btn btn-block btn-primary btn-lg')) !!}
        </div>
      </div>
    </div>  
  @stop