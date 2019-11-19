<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="{{ asset('images/sinventario.png') }}" alt="AdminLTE Logo" class="img-fluid">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <a href="/catalogos/bienes" class="d-block">{{ $usuario->username }}</a>
      </div> 
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class=" nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li id="cat" class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/lista','catalogos/TablaDeLineas','catalogos/Lineas',
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
        <li id="ople" class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/bienes','home','/','ople/alta','catalogos/reportes','catalogos/depreciacion') ? 'menu-open' : '' !!}">
          <a class="{!! Request::is('catalogos/bienes','home','/','ople/alta','catalogos/reportes','catalogos/depreciacion') ? 'nav-link active' : 'nav-link' !!}">
            <i class="nav-icon fa">O</i>
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
              <a href="{{ route('reportes') }}" class="{!! Request::is('catalogos/reportes') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-file-pdf-o"></i>
                <p style="margin-left: 10px;">Reportes</p>
              </a>
            </li>
            <li class="nav-item" style="margin-left: 25px;">
              <a href="{{ route('depreciacion') }}" class="{!! Request::is('catalogos/depreciacion') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-sort-amount-desc"></i>
                <p style="margin-left: 10px;">Depreciación</p>
              </a>
            </li>
          </ul>
        </li>
        <li id="eco" class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/bieneseco','catalogos/reportesECO') ? 'menu-open' : '' !!}">
          <a class="{!! Request::is('catalogos/bieneseco','catalogos/reportesECO') ? 'nav-link active' : 'nav-link' !!}">
            <i class="nav-icon fa">E</i>
            <p>
              Bienes ECO
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin-left: 25px;">
              <a href="{{ route('catalogoeco') }}" class="{!! Request::is('catalogos/bieneseco') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-book"></i>
                <p style="margin-left: 10px;">Cátalogo</p>
              </a>
            </li>
            <li class="nav-item" style="margin-left: 25px;">
              <a href="{{ route('reportesECO') }}" class="{!! Request::is('catalogos/reportesECO') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-file-pdf-o"></i>
                <p style="margin-left: 10px;">Reportes</p>
              </a>
            </li>
          </ul>
        </li>

        <li id="ople" class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/cancelacionResguardo') ? 'menu-open' : '' !!}">
          <a class="{!! Request::is('catalogos/cancelacionResguardo') ? 'nav-link active' : 'nav-link' !!}">
            <i class="nav-icon fa fa-ban"></i>
            <p>
              Cancelaciones
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin-left: 25px;">
              <a href="{{ route('cancelacionResguardo') }}" class="{!! Request::is('catalogos/cancelacionResguardo') ? 'nav-link active' : 'nav-link' !!}">
                <i class="fa fa-list"></i>
                <p style="margin-left: 10px;">Resguardo</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- <li id="cancelacionResguardo" class="nav-item d-none d-sm-inline-block {!! Request::is('catalogos/asignacion') ? 'menu-open' : '' !!}">
          <a href="{{ route('asignacion') }}" class="{!! Request::is('catalogos/asignacion') ? 'nav-link active' : 'nav-link' !!}">
            <i class="nav-icon fa fa-check-square-o"></i>
            <p>
              Asignación
            </p>
          </a>          
        </li> --}}
        
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