<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user1.png') }}" class="img-circle" alt="User Image" />
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

            <li class="treeview"> <a href= "#"> <i class="fa fa-fw fa-flask"></i> <span>Productos</span>  <i class="fa fa-angle-left pull-right"></i> </a> 
                <ul class="treeview-menu">
                    <li><a href="{{ action('ProductsController@index') }}"><i class="fa fa-circle-o"></i> Mostrar Productos</a></li>
                    <li><a href="{{ action('ProductsController@create') }}"><i class="fa fa-circle-o"></i> Crear Producto</a></li>
                </ul>
            </li>

            <li class="treeview"> <a href= "#"> <i class="fa fa-fw fa-truck"></i> <span>Camiones</span> <i class="fa fa-angle-left pull-right"></i> </a> 
              <ul class="treeview-menu">
                    <li><a href="{{ action('TrucksController@index') }}"><i class="fa fa-circle-o"></i> Mostrar Camiones</a></li>
                    <li><a href="{{ action('TrucksController@create') }}"><i class="fa fa-circle-o"></i> Crear Cami&oacute;n</a></li>
              </ul>
            </li>

            <li class="treeview"> <a href= "#"> <i class="fa fa-fw fa-users"></i> <span>Usuarios</span>  <i class="fa fa-angle-left pull-right"></i>  </a> 
              <ul class="treeview-menu">
                    <li><a href="{{ action('UsersController@index') }}"><i class="fa fa-circle-o"></i> Mostrar Usuarios</a></li>
                    <li><a href="{{ action('UsersController@create') }}"><i class="fa fa-circle-o"></i> Crear Usuario</a></li>
              </ul>
            </li>
        </ul>    
    </section>
    <!-- /.sidebar -->
</aside>