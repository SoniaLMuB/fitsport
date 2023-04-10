$(document).ready(function() {
    $('#modal1').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var info = button.data('info');
      var img = button.data('img');
      var modal = $(this);
      modal.find('.modal-text').text(info);
      modal.find('.modal-img').attr('src', img); // actualizamos la URL de la imagen
    });
  });
  