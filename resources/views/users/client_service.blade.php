@extends('app')
  @include('includes.maintenance.sidebar')
  @section('content')
  <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>{{ $average_prices_per_order }}</h3>
                  <p>Precio promedio</p>
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
                  <h3>{{ $average_quantity_per_order }}</h3>
                  <p>Cantidad promedio</p>
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
                  <h3>{{ $average_prices_per_order }}</h3>
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
                  <h3>{{ $average_quantity_per_order }}</h3>
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
  	            <h3 class="box-title">Top 5 compa&ntilde;&iacute;as</h3>
  	            <div class="box-tools pull-right">
  	                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
  	                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
  	            </div>
  	        </div>
          	<div class="box-footer no-border">
                  <div class="row">
                    @foreach($top_5 as $customer)
                      <div class="col-xs-2 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $customer['percentage'] }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">{{ $customer['comapny_name'] }}</div>
                      </div><!-- ./col -->
                    @endforeach
                  </div><!-- /.row -->
              </div><!-- /.box-footer -->
          </div><!-- /.box -->
      </section><!-- right col -->
  </div><!-- /.row (main row) -->
   <div class="row">
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-12 connectedSortable">
        <!-- solid sales graph -->
        <div class="box box-solid bg-purple color-palette">
            <div class="box-header">
                <i class="fa fa-th"></i>
                <h3 class="box-title">Llantas</h3>
                <div class="box-tools pull-right">
                    <button class="btn bg-purple-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-purple-active btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-footer no-border">
                  <div class="row">
                      <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $average_quantity_per_order }}" data-width="60" data-height="60" data-fgColor="#555299"/>
                          <div class="knob-label">Llantas en uso</div>
                      </div><!-- ./col -->
                      <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $average_quantity_per_order }}" data-width="60" data-height="60" data-fgColor="#555299"/>
                          <div class="knob-label">Llantas removidas</div>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div><!-- /.box-footer -->
          </div><!-- /.box -->
      </section><!-- right col -->
  </div><!-- /.row (main row) -->
  @stop