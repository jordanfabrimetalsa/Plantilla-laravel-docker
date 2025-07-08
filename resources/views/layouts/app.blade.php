<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistema de Ventas')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            overflow-x: hidden;
        }
        
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: #fff;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s;
            overflow-y: auto;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s;
            background-color: #f5f7fa;
        }
        
        /* Header */
        .header {
            height: var(--header-height);
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        /* Contenido */
        .content {
            padding: 20px;
            margin-top: 20px;
        }
        
        /* Menús desplegables */
        .nav-item .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        
        .nav-item .nav-link:hover,
        .nav-item .nav-link.active {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border-left-color: #0d6efd;
        }
        
        .nav-item .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 10px;
        }
        
        .nav-item .nav-link[data-bs-toggle="collapse"]::after {
            content: '\f282';
            font-family: 'bootstrap-icons';
            margin-left: auto;
            transition: transform 0.3s;
        }
        
        .nav-item .nav-link[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }
        
        .nav-content {
            padding-left: 1.5rem;
            list-style: none;
        }
        
        .nav-content a {
            display: block;
            padding: 0.5rem 1rem;
            color: #6c757d;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .nav-content a:hover,
        .nav-content a.active {
            color: #0d6efd;
            background-color: rgba(13, 110, 253, 0.1);
            border-radius: 0.25rem;
        }
        
        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('shared.aside')
        
        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <!-- Header -->
            @include('shared.header')
            
            <!-- Contenido principal -->
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Manejar el menú lateral en móviles
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar-btn');
            
            // Toggle del menú en móviles
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('show');
                });
            }
            
            // Cerrar menú al hacer clic fuera en móviles
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 992 && 
                    !sidebar.contains(e.target) && 
                    !e.target.closest('.toggle-sidebar-btn')) {
                    sidebar.classList.remove('show');
                }
            });
            
            // Inicializar tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Inicializar popovers
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
