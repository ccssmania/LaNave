function Delete($this){
  //sweetAlert
  swal({
      title: "Esta Seguro?",
      text: $this.attr('title'),
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, Eliminar",
      cancelButtonText: "No, cancelar!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
           type:'POST',
           url: $this.prop('rel'),
           success:function(data){
            swal({title: "Eliminado!", text: "Ha sido eliminado correctamente.", type: "success"},function(){
              location.reload();
            });
             
           },
           onerror:function(e){
          console.log(e);
          swal("Algo salio mal!", "No se pudo eliminar, por favor contactar la división de sistemas.", "error");
           }
        });
      } else {
        swal("Cancelado", "El proceso fue cancelado correctamente", "error");
      }
    });
}