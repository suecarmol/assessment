@extends('app')
  @include('includes.maintenance.sidebar')
  @section('content')
  <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>{{ $total_drivers }}</h3>
                  @if($total_drivers > 1)
                    <p>Choferes</p>
                  @elseif($total_drivers == 1)
                     <p>Chofer</p>
                  @else
                    <p>No hay choferes</p>  
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
                  <h3>{{ $available_drivers }}</h3>
                  @if($available_drivers > 1)
                    <p>Choferes disponibles</p>
                  @elseif($available_drivers == 1)
                     <p>Chofer disponible</p>
                  @else
                    <p>No hay choferes disponibles</p>  
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
                  <h3>{{ $total_trucks }}</h3>
                  @if($total_trucks > 1)
                    <p>Camiones con demoras en servi</p>
                  @elseif($total_trucks == 1)
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
                  <h3>{{ $available_trucks }}</h3>
                  @if($available_trucks > 1)
                    <p>Camiones disponibles </p>
                  @elseif($available_trucks == 1)
                     <p>Cami&oacute;n disponible</p>
                  @else
                    <p>No hay camiones disponibles</p>  
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
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
              <div class="inner">
                  <h3>{{ $trucks_in_route }}</h3>
                  @if($trucks_in_route > 1)
                    <p>Camiones en ruta</p>
                  @elseif($trucks_in_route == 1)
                     <p>Cami&oacute;n en ruta</p>
                  @else
                    <p>No hay camiones en ruta</p>  
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
          <div class="small-box bg-orange">
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
          <div class="small-box bg-purple">
              <div class="inner">
                  <h3>{{ $total_routes }}</h3>
                  @if($total_routes > 1)
                    <p>Rutas</p>
                  @elseif($total_routes == 1)
                     <p>Ruta</p>
                  @else
                    <p>No hay rutas</p>  
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
          <div class="small-box bg-teal">
              <div class="inner">
                @if($most_frecuent_destination == null)
                  <p>No hay rutas que analizar</p>
                @else  
                  <h3>{{ $most_frecuent_destination }}</h3>
                  <p>Destino m&aacute;s frecuente</p>
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

  @stop