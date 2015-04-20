@extends('app')
  @include('includes.billing.sidebar')
  @section('content')
  <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>{{ $paid_bills }}</h3>
                  @if($paid_bills > 1)
                    <p>Facturas pagadas</p>
                  @elseif($paid_bills == 1)
                     <p>Factura pagada</p>
                  @else
                    <p>No hay facturas pagadas</p>  
                  @endif 
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner">
                  <h3>{{ $unpaid_bills }}</h3>
                  @if($unpaid_bills > 1)
                    <p>Facturas por pagar</p>
                  @elseif($unpaid_bills == 1)
                     <p>Factura por pagar</p>
                  @else
                    <p>No hay facturas por pagar</p>  
                  @endif   
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                  <h3>{{ $average_price }}</h3>
                  <p>Precio promedio de factura</p>
              </div>
              <div class="icon">
                  <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>{{ $biggest_contributor }}</h3>
                  <p>Precio de mayor factura</p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
  </div><!-- /.row -->
  <!-- Main row -->
  <div class="row">
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-12 connectedSortable">
  	    <!-- solid sales graph -->
  	    <div class="box box-solid bg-teal-gradient">
  	        <div class="box-header">
  	            <i class="fa fa-th"></i>
  	            <h3 class="box-title">Facturas</h3>
  	            <div class="box-tools pull-right">
  	                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
  	                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
  	            </div>
  	        </div>
          	<div class="box-footer no-border">
                  <div class="row">
                      <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $paid_bills_percentage }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">Pagadas</div>
                      </div><!-- ./col -->
                      <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $unpaid_bills_percentage }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">Por pagar</div>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div><!-- /.box-footer -->
          </div><!-- /.box -->
      </section><!-- right col -->
  </div><!-- /.row (main row) -->
  @stop