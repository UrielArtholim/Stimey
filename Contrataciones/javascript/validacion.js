function comprobacion() {
    //DATOS DE USUARIO
    if (document.formulario.nombreUsuario.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca un nombre de usuario.";
        document.formulario.nombreUsuario.focus();
        return false;
    }

    if (document.formulario.primApell.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca un apellido para el usuario.";
        document.formulario.primApell.focus();
        return false;
    }

    if (document.formulario.dni.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca un dni para el usuario.";
        document.formulario.dni.focus();
        return false;
    } else {
        var dni = document.formulario.dni.value();
        var numero;
        var letr;
        var letra;
        var expresion_regular_dni;

        expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

        if (expresion_regular_dni.test(dni) == true) {
            numero = dni.substr(0, dni.length - 1);
            letr = dni.substr(dni.length - 1, 1);
            numero = numero % 23;
            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero + 1);
            if (letra != letr.toUpperCase()) {
                document.getElementById('campo_erroneo').innerHTML = "(*) Dni erroneo.";
                document.formulario.dni.focus();
                return false;
            }
        } else {
            document.getElementById('campo_erroneo').innerHTML = "(*) Dni erroneo, formato no válido.";
            document.formulario.dni.focus();
            return false;
        }
    }

    if (document.formulario.cce.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca una categoría para el usuario.";
        document.formulario.cce.focus();
        return false;
    }

    if (document.formulario.nMatricula.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca un número de matricula para el usuario.";
        document.formulario.nMatricula.focus();
        return false;
    }

    if (document.formulario.centroDestino.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca un centro de destino para el usuario.";
        document.formulario.centroDestino.focus();
        return false;
    }

    //COMPROBACIÓN FECHA
    if (docuemnt.formulario.diaNac.value == "" || document.formulario.mesNac.value == "" || document.formulario.anioNac.value == "") {
        document.getElementById('campos_erroneo').innerHTML = "(*) Introduzca una fecha válida.";
        document.formulario.diaNac.focus();
        return false;
    }

    //DATOS BANCARIOS
    if (document.formulario.nombreBanco.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca el nombre del banco.";
        document.formulario.nombreBanco.focus();
        return false;
    }

    if (document.formulario.iban.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca el iban de la cuenta bancaria.";
        document.formulario.iban.focus();
        return false;
    }

    //DATOS SEGURIDAD SOCIAL
    if (document.formulario.grupoCotizacion.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca el grupo de cotización a la seguridad social.";
        document.formulario.grupoCotizacion.focus();
        return false;
    }

    if (document.formulario.cnae.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca el cnae.";
        document.formulario.cnae.focus();
        return false;
    }

    if (document.formulario.numeroPatronal.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca el numero de la patronal.";
        document.formulario.numeroPatronal.focus();
        return false;
    }

    if (document.formulario.numeroAfiliacion.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca el número de afiliación a la seguridad social.";
        document.formulario.numeroAfiliacion.focus();
        return false;
    }

    if (document.formulario.base.value == "") {
        document.getElementById('campo_erroneo').innerHTML = "(*) Introduzca la base salarial.";
        document.formulario.base.focus();
        return false;
    }
}

//AUTORELLENO BASE SALARIAL
function add() {
    var elements = document.querySelectorAll(".entrada-usuario");
    var valor = document.getElementById('base').value;

    for (var i = 0; i < elements.length; i++) {
        elements[i].value = valor;
    }
}

//MOSTRAR CUOTA AUTOMATICAMENTE AL RELLENAR EL PORCENTAJE
function mostrarCuotaCCT() {
    var elementos = document.querySelectorAll(".cuota");
    var porcentaje = document.getElementById('porcentajeCCTrabajador').value;
    var base = document.getElementById('base').value;

    for (var i = 0; i < elementos.length; i++) {
        elementos[i].value = (base * porcentaje) / 100;
    }
}

function mostrarCuotaCCE() {
    var elementos = document.querySelectorAll(".cuotaCCE");
    var porcentaje = document.getElementById('porcentajeCCEmpresa').value;
    var base = document.getElementById('base').value;

    for (var i = 0; i < elementos.length; i++) {
        elementos[i].value = (base * porcentaje) / 100;
    }
}