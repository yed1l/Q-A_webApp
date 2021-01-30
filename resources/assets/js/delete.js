$(function () {
    $('#send').on("click", validateAll);
    $('a[data-type="delete"]').on("click", deleteElement);

});

function ejecutarDelete(idElemento) {
    return function() {
        axios.delete('/questions/destroy/' + idElemento,
            {}
        ).then(function (response) {
            $("#question"+idElemento).remove();
            $("#delete").modal("hide");
        }).catch(function (error) {
            $("#delete").modal("hide");
        }).then(function(){
            let botonDelete = $("#buttonDelete");
            botonDelete.unbind();

        });
    }
}

/**
 * Show modal when click in delete button from profile list
 * @param evento
 */
function deleteElement(evento){
    evento.preventDefault();
    let boton = evento.target;
    let idElemento = boton.getAttribute('data-idelement');
    let botonDelete = $("#buttonDelete");
    botonDelete.unbind();
    botonDelete.on("click",ejecutarDelete(idElemento));
    $("#delete").modal();
}