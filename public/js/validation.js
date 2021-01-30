/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

$(function () {
    $('#send').on("click", validateAll);
    $('#title').on("change", validarTitulo);
    $('#category').on("change", validarCategoria);
    $('#content').on("change", validarContenido);
    $('#cargar').on("click", cargarDatos);
    $('#cargarUno').on("click", cargarDatosUno);
    $('#cargarVista').on("click", cargarVistaUno);
    $('a[data-type="delete"]').on("click", deleteElement);
});

var cont = 0;

function validateAll(e) {

    e.preventDefault();
    var button = $('button');
    button.prop("disabled", true);

    var data = {};
    data["title"] = $('#title').val();
    data["category"] = $('#category').val();
    data["content"] = $('#content').val();

    axios.post('/questions/validate', data).then(function (response) {

        var correctTitle = gestionarErrores($("#title"), response.data["title"]);
        var correctCategory = gestionarErrores($("#category"), response.data["category"]);
        var correctContent = gestionarErrores($("#content"), response.data["content"]);

        if (!correctTitle && !correctCategory && !correctContent) {
            $('#formulario').submit();
        }
    }).catch(function (error) {
        console.log(error);
    }).then(function () {
        $('button').prop("disabled", false);
    });
}

function validateName() {
    var esCorrecto = false;
    var regex = /[a-zA-Z]+/;
    var name = $('#name').val();
    var input = $('#name');
    var error = $('#errorName');

    if (!name.match(regex) || name === "" || name.length < 4) {
        error.removeClass("is-valid");
        input.removeClass("is-valid");
        error.html("El formato de nombre es incorrecto. Mínimo 4 caracteres").addClass("text-danger");
        input.addClass("is-invalid");
    } else {
        error.removeClass("text-danger");
        input.removeClass("is-invalid");
        error.html("");
        input.addClass("is-valid");
        esCorrecto = true;
    }
    return esCorrecto;
}

function validateAge() {

    var esCorrecto = false;
    var edad = $('#age').val();
    var error = $('#errorAge');
    var regex = /[0-9]+/;

    if (edad.match(regex) >= 18) {
        error.html("");
        edad.addClass("valido");
        esCorrecto = true;
    } else {
        edad.removeClass("valido");
        edad.addClass('error');
        edad.html("");
        error.html("No eres mayor de edad").addClass("bg-danger");
    }
}

function validateNick() {
    var regex = /[a-zA-Z]+/;
    var nick = $('#nick').val();
    var input = $('#nick');
    var error = $('#errorNick');
    var esCorrecto = false;

    if (!nick.match(regex) || nick === "" || nick.length < 4) {
        error.removeClass("is-valid");
        input.removeClass("is-valid");
        error.html("El formato de nombre es incorrecto. Mínimo 4 caracteres").addClass("text-danger");
        input.addClass("is-invalid");
    } else {
        error.removeClass("text-danger");
        input.removeClass("is-invalid");
        error.html("");
        input.addClass("is-valid");
        esCorrecto = true;
    }
}

function validateEmail() {
    var email = $('#email');
    var error = $('#errorEmail');
}

function validar(campo) {

    var datos = {};
    datos[campo] = $("#" + campo).val();

    axios.post('/questions/validate', datos).then(function (response) {
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
    var hayErrores = false;
    var divErrores = inputQueSeValida.next("div");
    divErrores.html("");
    inputQueSeValida.removeClass("is-valid is-invalid");

    if (listaErrores === undefined || listaErrores.length === 0) {
        inputQueSeValida.addClass("is-valid");
    } else {
        hayErrores = true;
        inputQueSeValida.addClass("is-invalid");
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = listaErrores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                divErrores.append('<div class="alert alert-danger" role="alert">' + error + '</div>');
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }
    }
    return hayErrores;
}

function incluirSpinner(input) {
    if (input.parent().next().length === 0) {
        var spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

function ocultarSpinner() {
    $("#" + campo).parent().next().remove();
}

function cargarDatos() {

    var resp = $("#listadoQuestion");

    axios.get('/questions/obtenerDatos', {}).then(function (response) {
        mostrarRespuesta(response, resp);
    }).catch(function (error) {
        console.log(error);
    });
}

//cuando se usan parametros, lo formal es hacer la peticion por POST
function cargarDatosUno() {

    var resp = $("#listadoQuestion");
    axios.post('/questions/obtenerCadaDato', {
        posicionInicial: cont,
        numeroElementos: 1
    }).then(function (response) {
        mostrarRespuesta(response, resp);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function cargarVistaUno() {
    axios.post('/questions/vistaPregunta', {
        posicionInicial: cont,
        numeroElementos: 1
    }).then(function (response) {
        $('#listadoQuestion').append(response.data);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function buildElement(elemento) {

    var div = $("<div></div>");
    div.addClass("card");

    var divHeader = $('<div></div>');
    divHeader.addClass("card-header");
    var h2 = $("<h2></h2>");
    var a = $("<a></a>");
    var p = $("<p></p>");
    var p2 = $("<p></p>");
    var em = $("<em></em>");
    var pContent = $("<p></p>");

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
    var datos = response.data;
    for (var item in response.data) {
        var elemento = datos[item];
        var div = buildElement(elemento);
        resp.append(div);
    }
}

/**
 * Delete data from the storage
 *
 * @param idElemento ID from created question
 * @returns {Function}
 */
function ejecutarDelete(idElemento) {
    return function () {
        axios.delete('/questions/destroy/' + idElemento, {}).then(function (response) {
            $("#question" + idElemento).remove();
            $("#delete").modal("hide");
        }).catch(function (error) {
            $("#delete").modal("hide");
        }).then(function () {
            var botonDelete = $("#buttonDelete");
            botonDelete.unbind();
        });
    };
}

/**
 * Show modal when click in delete button from profile list
 * @param evento
 */
function deleteElement(evento) {
    evento.preventDefault();
    var boton = evento.target;
    var idElemento = boton.getAttribute('data-idelement');
    var botonDelete = $("#buttonDelete");
    botonDelete.unbind();
    botonDelete.on("click", ejecutarDelete(idElemento));
    $("#delete").modal();
}

/***/ })

/******/ });