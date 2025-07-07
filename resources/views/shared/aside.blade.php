<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('home') ? '' : 'collapsed' }}" href="{{ route('home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-heading">Menú Principal</li>
    
    <!-- Menú Productos -->
    <li class="nav-item">
      <a class="nav-link {{ request()->is('producto*') ? '' : 'collapsed' }}" data-bs-target="#productosMenu" data-bs-toggle="collapse" href="#" aria-expanded="{{ request()->is('producto*') ? 'true' : 'false' }}">
        <i class="bi bi-cart"></i>
        <span>Productos</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <div id="productosMenu" class="collapse {{ request()->is('producto*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <ul class="nav-content">
          <li>
            <a href="{{ route('producto') }}" class="{{ request()->routeIs('producto') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Administrar Productos</span>
            </a>
          </li>
          <li>
            <a href="#" class="{{ request()->routeIs('producto.reportes') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Reporte de Productos</span>
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Menú Categorías -->
    <li class="nav-item">
      <a class="nav-link {{ request()->is('categoria*') ? '' : 'collapsed' }}" href="{{ route('categoria') }}">
        <i class="bi bi-tags"></i>
        <span>Categorías</span>
      </a>
    </li>

    <!-- Menú Proveedores -->
    <li class="nav-item">
      <a class="nav-link {{ request()->is('proveedor*') ? '' : 'collapsed' }}" href="{{ route('proveedor') }}">
        <i class="bi bi-truck"></i>
        <span>Proveedores</span>
      </a>
    </li>
    </ul>

  </aside>