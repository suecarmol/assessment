@extends('app')
  @include('includes.maintenance.sidebar')
  @section('content')
  <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>{{ $available_trucks }}</h3>
                  @if($available_trucks > 1)
                    <p>Camiones disponibles</p>
                  @elseif($available_trucks == 1)
                     <p>Cami&oacute;n disponible</p>
                  @else
                    <p>No hay camiones disponibles</p>  
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
                  <h3>{{ $trucks_in_service }}</h3>
                  @if($trucks_in_service > 1)
                    <p>Camiones en servicio</p>
                  @elseif($trucks_in_service == 1)
                     <p>Cami&oacute;n en servicio</p>
                  @else
                    <p>No hay camiones en servicio</p>  
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
                  <h3>{{ $trucks_with_delays }}</h3>
                  @if($trucks_with_delays > 1)
                    <p>Camiones con demoras en servi</p>
                  @elseif($trucks_with_delays == 1)
                     <p>Cami&oacute;n con demoras en servicio</p>
                  @else
                    <p>No hay camiones con demoras en servicio</p>  
                  @endif
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
                  <h3>{{ $trucks_in_route }}</h3>
                  @if($trucks_in_route > 1)
                    <p>Camiones en ruta </p>
                  @elseif($trucks_in_route == 1)
                     <p>Cami&oacute;n en ruta</p>
                  @else
                    <p>No hay camiones en ruta</p>  
                  @endif
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
  	            <h3 class="box-title">Distribuci&oacute;n de camiones</h3>
  	            <div class="box-tools pull-right">
  	                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
  	                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
  	            </div>
  	        </div>
          	<div class="box-footer no-border">
                  <div class="row">
                      <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $available_trucks_percentage }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">Disponibles</div>
                      </div><!-- ./col -->
                      <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $trucks_in_service_percentage }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">En servicio</div>
                      </div><!-- ./col -->
                      <div class="col-xs-3 text-center">
                          <input type="text" class="knob" data-readonly="true" value="{{ $trucks_with_delays_percentage }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">Con demoras</div>
                      </div><!-- ./col -->
                      <div class="col-xs-3 text-center">
                          <input type="text" class="knob" data-readonly="true" value="{{ $trucks_in_route_percentage }}" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                          <div class="knob-label">En ruta</div>
                      </div><!-- ./col -->
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
                          <input type="text" class="knob" data-readonly="true" value="{{ $tires_in_use_percentage }}" data-width="60" data-height="60" data-fgColor="#555299"/>
                          <div class="knob-label">Llantas en uso</div>
                      </div><!-- ./col -->
                      <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="{{ $removed_tires_percentage }}" data-width="60" data-height="60" data-fgColor="#555299"/>
                          <div class="knob-label">Llantas removidas</div>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div><!-- /.box-footer -->
          </div><!-- /.box -->
      </section><!-- right col -->
  </div><!-- /.row (main row) -->
  @stop