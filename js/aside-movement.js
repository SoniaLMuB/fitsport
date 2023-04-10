  var menuIcon = document.getElementById('menu-icon');
  const icons = document.querySelectorAll('.nav-link');
  let isTextVisible = false;

  menuIcon.addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    var ancho = sidebar.offsetWidth;
    if (ancho=='100') {
      sidebar.style.width = "200px";
      toggleText();

    }else{
      sidebar.style.width = "100px";
      toggleText();
    }
    
  });

  function toggleText() {
    isTextVisible = !isTextVisible;
    icons.forEach((icon) => {
      if (isTextVisible) {
        const textElement = document.createElement('p');
        textElement.id = 'icon-text';
        textElement.innerHTML = icon.querySelector('i').getAttribute('id');
        icon.appendChild(textElement);
        icon.style.fontSize = "20px";
        icon.style.padding = "3px";
      } else {
        const textElement = icon.querySelector('#icon-text');
        if (textElement) {
          textElement.remove();
          icon.style.fontSize = "30px";
          icon.style.padding = "17px";
        }
      }
    });
  }
