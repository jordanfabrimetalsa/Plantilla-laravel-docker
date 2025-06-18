  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('nueva-venta') }}">
          <i class="bi bi-card-list"></i>
          <span>Vender Producto</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('detalle-venta') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Consultar Ventas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('categoria') }}">
          <i class="bi bi-dash-circle"></i>
          <span>Categorias</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('producto') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Productos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('cliente') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Clientes</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('usuario') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Usuario</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}">
            <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li>
    </ul>

  </aside>