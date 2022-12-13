"use strict";

function anadirProducto(idProducto) {
    if(!isNaN(idProducto) && idProducto>0) {
        let data = {accion:"anadir", id:idProducto};
        $.post("public/ajax/ajaxLink.php", data).done(function(data) {actualizarIconoCarrito(data);});
        //$.post("public/ajax/ajaxLink.php", data).done(function(data) {console.log(data);});
    }
}

function eliminarProducto(idProducto) {
    if(!isNaN(idProducto) && idProducto>0) {
        let data = {accion:"eliminar", id:idProducto};
        $.post("public/ajax/ajaxLink.php", data).done(function(data) {actualizarIconoCarrito(data);});
        //$.post("public/ajax/ajaxLink.php", data).done(function(data) {console.log(data);});
    }
}

function actualizarIconoCarrito(cantidad) {
    if(document.getElementsByClassName("tamanoCarrito").length > 0) {

        for(let elemento of document.getElementsByClassName("tamanoCarrito")) {
            elemento.textContent = cantidad.trim();
        }
        //document.getElementById("tamanoCarrito").textContent = cantidad.trim();
    }
}

function mostrarCarritoConsola() {
    let data = {accion:"mostrar"};

    $.ajax({
        type: "POST",
        url: "public/ajax/ajaxLink.php",
        data: data,
        dataType: "json",
        success: function (data) {
            let arrCarrito = [];
            arrCarrito = data;
            for(let linea of arrCarrito) {
                console.log(linea);
            }
        }
    });
}

function pintarCarrito() {
    if(document.getElementById("divCarrito").innerHTML) {
        let data = {accion:"pintar"};

        $.ajax({
            type: "POST",
            url: "public/ajax/ajaxLink.php",
            data: data,
            dataType: "text",
            success: function (data) {
                
                document.getElementById("divCarrito").innerHTML = data;
            }
        });
    }
}

function botonSumar($id) {
    anadirProducto($id);
    pintarCarrito();

}

function botonRestar($id) {
    eliminarProducto($id);
    pintarCarrito()

}



