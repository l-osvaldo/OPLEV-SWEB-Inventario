<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">SIADMON</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <a href="/home" class="d-block">{{ $usuario->username }}</a>
      </div> 
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class=" nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/lista','catalogos/TablaDeLineas','catalogos/Lineas',
          'catalogos/TablaEmpleados','catalogos/TablaPartida','catalogos/Sublineas','catalogos/TablaSublineas','catalogos/TablaAreas') ? 'menu-open' : '' !!}">
          <a class="{!! Request::is('catalogos/lista','catalogos/TablaDeLineas','catalogos/Lineas',
          'catalogos/TablaEmpleados','catalogos/TablaPartida','catalogos/Sublineas','catalogos/TablaSublineas','catalogos/TablaAreas') ? 'nav-link active' : 'nav-link' !!}">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Catálogos
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item" style="margin-left: 25px;">
                <a href="{{ route('Tabla-Partida') }}" class="{!! Request::is('catalogos/TablaPartida') ? 'nav-link active' : 'nav-link' !!}">
                  <i class="fa fa-file-text-o"></i>
                  <p style="margin-left: 10px;">Partidas</p>
                </a>
              </li>
              <li class="nav-item" style="margin-left: 25px;">
                <a href="{{ route('show-lineas') }}" class="{!! Request::is('catalogos/TablaDeLineas') ? 'nav-link active' : 'nav-link' !!}">
                  <i class="fa fa-bars"></i>
                  <p style="margin-left: 10px;">Líneas</p>
                </a>
              </li>
              <li class="nav-item" style="margin-left: 25px;">
                <a href="{{ route('show-sublineas') }}" class="{!! Request::is('catalogos/TablaSublineas') ? 'nav-link active' : 'nav-link' !!}">
                  <i class="fa fa-bars"></i>
                  <p style="margin-left: 10px;">Sublineas</p>
                </a>
              </li>
              <li class="nav-item" style="margin-left: 25px;">
                <a href="{{ route('Tabla-Areas') }}" class="{!! Request::is('catalogos/TablaAreas') ? 'nav-link active' : 'nav-link' !!}">
                  <i class="fa fa-building"></i>
                  <p style="margin-left: 10px;">Áreas</p>
                </a>
              </li>
              <li class="nav-item" style="margin-left: 25px;">
                <a href="{{ route('show-Empleados') }}" class="{!! Request::is('catalogos/TablaEmpleados') ? 'nav-link active' : 'nav-link' !!}">
                  <i class="fa fa-user"></i>
                  <p style="margin-left: 10px;">Empleados</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/bienes','home','/','ople/alta') ? 'menu-open' : '' !!}">
          <a class="{!! Request::is('catalogos/bienes','home','/','ople/alta') ? 'nav-link active' : 'nav-link' !!}">
            <i class="nav-icon fa fa-desktop"></i>
            <p>
              Bienes OPLE
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin-left: 25px;">
              <a href="{{ route('catalogos') }}" class="{!! Request::is('catalogos/bienes','home','/') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-book"></i>
                <p style="margin-left: 10px;">Cátalogo</p>
              </a>
            </li>
            <li class="nav-item" style="margin-left: 25px;">
              <a href="{{ route('alta-articulo') }}" class="{!! Request::is('ople/alta') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-arrow-up"></i>
                <p style="margin-left: 10px;">Alta Artículo</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('catalogoeco') }}" class="{!! Request::is('catalogos/bieneseco') ? 'nav-link active' : 'nav-link' !!}">
              <i class="nav-icon fa fa-desktop"></i>
              <p>
                Bienes ECO
              </p>
            </a>
          </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <span style="color: #FF2D00;">
                <i class="nav-icon fa fa-power-off"></i>
              </span>  
              <p>
                {{ __('Salir') }}
              </p>
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
            </form>
        </li>    
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>