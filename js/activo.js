window.addEventListener('load', function() {
	// Obtener el nombre de la página actual
	var currentPage = window.location.pathname.split('/').pop().replace('.php','');
	// Buscar el enlace correspondiente en el menú y agregar la clase "active"
	var menuLinks = document.querySelectorAll('#main-sidebar a');
	console.log(menuLinks.length);
	for (var i = 0; i < menuLinks.length; i++) {
		if (menuLinks[i].id === currentPage) {
			menuLinks[i].classList.add('active');
			break;
		}
	}
});

