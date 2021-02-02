$(function () {
    $('#send').on("click", validateAll);
    $('#title').on("change", validarTitulo);
    $('#category').on("change", validarCategoria);
    $('#content').on("change", validarContenido);
    $('#cargar').on("click", cargarDatos);
    $('#cargarUno').on("click", cargarDatosUno);
    $('#cargarVista').on("click",cargarVistaUno);
    $('a[data-type="delete"]').on("click", deleteElement);

});


let cont = 0;

function validateAll(e) {

    e.preventDefault();
    let button = $('button');
    button.prop("disabled", true);

    let data = {};
    data["title"] = $('#title').val();
    data["category"] = $('#category').val();
    data["content"] = $('#content').val();

    axios.post('/questions/validate', data
    ).then(function (response) {

        let correctTitle = gestionarErrores($("#title"), response.data["title"]);
        let correctCategory = gestionarErrores($("#category"), response.data["category"]);
        let correctContent = gestionarErrores($("#content"), response.data["content"]);

        if(!correctTitle && !correctCategory && !correctContent){
            $('#formulario').submit();
        }
    }).catch(function (error) {
        console.log(error);
    }).then(function () {
        $('button').prop("disabled",false);
    });


}



function validar(campo) {

    let datos = {};
    datos[campo] = $("#" + campo).val();

    axios.post('/questions/validate', datos
    ).then(function (response) {
        gestionarErrores($("#" + campo), response.data[campo]);
    }).catch(function (error) {
        console.log(error);
    });

}

function validarTitulo() {
    validar("title");
}

function validarCategoria() {
    validar("category");
}

function validarContenido() {
    validar("content");
}

function gestionarErrores(inputQueSeValida, listaErrores) {
    let hayErrores = false;
    let divErrores = inputQueSeValida.next("div");
    divErrores.html("");
    inputQueSeValida.removeClass("is-valid is-invalid");

    if (listaErrores === undefined || listaErrores.length === 0) {
        inputQueSeValida.addClass("is-valid");
    } else {
        hayErrores = true;
        inputQueSeValida.addClass("is-invalid");
        for (let error of listaErrores) {
            divErrores.append('<div class="alert alert-danger" role="alert">' + error + '</div>');
        }
    }
    return hayErrores;
}

function incluirSpinner(input) {
    if (input.parent().next().length === 0) {
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

function ocultarSpinner() {
    $("#" + campo).parent().next().remove()
}

function cargarDatos() {

    let resp = $("#listadoQuestion");

    axios.get('/questions/obtenerDatos', {})
        .then(function (response) {
            mostrarRespuesta(response, resp);
        }).catch(function (error) {
        console.log(error);
    });
}


function cargarDatosUno() {

    let resp = $("#listadoQuestion");
    axios.post('/questions/obtenerCadaDato',
        {
            posicionInicial: cont,
            numeroElementos: 1
        }
    ).then(function (response) {
        mostrarRespuesta(response, resp);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function cargarVistaUno(){
    axios.post('/questions/vistaPregunta',
        {
            posicionInicial: cont,
            numeroElementos: 1
        }
    ).then(function (response) {
       $('#listadoQuestion').append(response.data);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function buildElement(elemento) {

    let div = $("<div></div>");
    div.addClass("card");

    let divHeader = $('<div></div>');
    divHeader.addClass("card-header");
    let h2 = $("<h2></h2>");
    let a = $("<a></a>");
    let p = $("<p></p>");
    let p2 = $("<p></p>");
    let em = $("<em></em>");
    let pContent = $("<p></p>");

    h2.addClass("card-title");
    p.addClass("card-subtitle");
    p2.addClass("card-subtitle");
    pContent.addClass("card-body");

    a.text(elemento.title);
    p.text(elemento.category);
    p2.text(elemento.hashtag);
    pContent.text(elemento.content);

    h2.append(a);
    divHeader.append(h2);
    p.append(em);
    divHeader.append(p);
    divHeader.append(p2);
    div.append(divHeader);
    div.append(pContent);

    return div;
}

function mostrarRespuesta(response, resp) {
    let datos = response.data;
    for (let item in response.data) {
        let elemento = datos[item];
        let div = buildElement(elemento);
        resp.append(div);
    }
}
