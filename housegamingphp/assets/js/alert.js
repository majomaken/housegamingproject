$(document).ready(function(e){
  $("#alert").click(function(e){
    swal({
    title: '¿Seguro quieres eliminar el equipo?',
    text: 'Antes de eliminar el equipo puedes dejar a alguien a cargo',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
    swal('¡Tu equipo ha sido eliminado!', {
      icon: 'success',
    });
    } else {
    swal('Puedes seguir disfrutando con tu equipo');
    }
    });
  });
});


  $('.Boton').on('click', function(){
    swal("Cambios realizados exitosamente",{
      button:"Seguir navegando",

    });
  });
