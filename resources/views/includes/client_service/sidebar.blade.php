<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{\Auth::user()->name}} {{\Auth::user()->last_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVEGACI&Oacute;N</li>

            <li class="treeview"> <a href= "#"> <i class="fa fa-fw fa-list-ol"></i> <span>&Oacute;rdenes</span>  <i class="fa fa-angle-left pull-right"></i> </a> 
                <ul class="treeview-menu">
                    <li><a href="{{ action('OrdersController@index') }}"><i class="fa fa-circle-o"></i> Mostrar &Oacute;rdenes</a></li>
                    <li><a href="{{ action('OrdersController@create') }}"><i class="fa fa-circle-o"></i> Crear Orden</a></li>
                </ul>
            </li>

            <li class="treeview"> <a href= "#"> <i class="fa fa-fw fa-users"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i> </a> 
              <ul class="treeview-menu">
                    <li><a href="{{ action('UsersController@index') }}"><i class="fa fa-circle-o"></i> Mostrar Clientes</a></li>
                    <li><a href="{{ action('UsersController@create') }}"><i class="fa fa-circle-o"></i> Crear Cliente</a></li>
              </ul>
            </li>
        </ul>    
    </section>
    <!-- /.sidebar -->
</aside>