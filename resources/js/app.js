import './bootstrap';

// Inicializar Bootstrap
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Manejar el menú lateral con Bootstrap
const sidebar = document.getElementById('sidebar');
if (sidebar) {
    const toggleBtn = document.querySelector('.toggle-sidebar-btn');
    const collapse = new bootstrap.Collapse(sidebar, {
        toggle: false
    });

    toggleBtn.addEventListener('click', function() {
        collapse.toggle();
    });

    // Asegurar que el menú se expanda en pantallas grandes
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            collapse.show();
        }
    });
}
