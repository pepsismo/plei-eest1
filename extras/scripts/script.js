document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;

    // Función para alternar la clase 'active' del sidebar
    menuToggle.addEventListener('click', (event) => {
        event.stopPropagation(); // Evita que el clic se propague al documento y cierre el sidebar
        sidebar.classList.toggle('active');
    });

    // Cerrar el sidebar al hacer clic fuera de él
    document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    });

    // Toggle del modo oscuro
    darkModeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        // Guardar la preferencia del modo oscuro en localStorage
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.setItem('darkMode', 'disabled');
        }
    });

    // Cargar la preferencia del modo oscuro al cargar la página
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
    }

    // Función de los menus colapsables
    document.querySelectorAll('.collapsible').forEach(btn => {
        btn.addEventListener('click', function() {
            this.classList.toggle('active');
            const submenu = this.nextElementSibling;
            if (submenu.style.display === "block") {
                submenu.style.display = "none";
            } else {
                submenu.style.display = "block";
            }
        });
    });
});
