@extends('app')
  @include('includes.clients.sidebar')
  @section('content')
  <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>{{ $total_company_orders }}</h3>
                  @if($total_company_orders > 1)
                    <p>&Oacute;rdenes de {{ \Auth::user()->company }}</p>
                  @elseif($total_company_orders == 1)
                     <p>Orden de {{ \Auth::user()->company }}</p>
                  @else
                    <p>No hay &oacute;rdenes de {{ \Auth::user()->company }} </p>  
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
                  <h3>{{ $total_user_orders }}</h3>
                  @if($total_user_orders > 1)
                    <p>&Oacute;rdenes de {{\Auth::user()->name}}</p>
                  @elseif($total_user_orders == 1)
                     <p>Orden de {{\Auth::user()->name}}</p>
                  @else
                    <p>No hay &oacute;rdenes de {{\Auth::user()->name}}</p>  
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
                  <h3>{{ $unpaid_orders }}</h3>
                  @if($unpaid_orders > 1)
                    <p>&Oacute;rdenes por pagar</p>
                  @elseif($unpaid_orders == 1)
                     <p>Orden por pagar</p>
                  @else
                    <p>No hay &oacute;rdenes por pagar</p>  
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
                  <h3>{{ $paid_orders }}</h3>
                  @if($paid_orders > 1)
                    <p>&Oacute;rdenes pagadas</p>
                  @elseif($paid_orders == 1)
                     <p>Orden pagada</p>
                  @else
                    <p>No hay &oacute;rdenes pagadas</p>  
                  @endif  
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
  </div><!-- /.row -->
  @stop