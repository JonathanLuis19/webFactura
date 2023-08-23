//msg alert delete
$('.msg-delete').submit(function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Estas seguro?',
        text: "No podrás revertir esto.!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Eliminado!',
            'El registro ha sido eliminado.',
            'success'
            );
            this.submit();
        }
    });
});