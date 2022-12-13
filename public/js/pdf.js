"use strict";

function generarPDF(textoEncabezado) {
    if(document.querySelector(".descargarPDF")) {
        let elementoTabla = document.querySelector(".descargarPDF").cloneNode(true);

        //Elimino los elementos de la tabla que no se desean imprimir (botones, fotos..) y le quito el colspan a los elementos que no deban tenerlo
        let noImprimibles = elementoTabla.querySelectorAll(".noImprimible");
        let colSpanElements = elementoTabla.querySelectorAll(".imprimibleSinColSpan");

        for(let elementoNI of noImprimibles) {
            elementoNI.remove(); 
        }

        for(let elementoSinColspan of colSpanElements) {
            elementoSinColspan.colSpan = "1";
        }

        let tabla = elementoTabla.outerHTML;

        let url = "public/pdf/generarPDF.php";
        let data = {encabezado: textoEncabezado, htmlString: tabla};
        openWindowWithPost(url,data);
    } else {
        console.log("No existe html transformable a pdf");
    }   
}

function openWindowWithPost(url, data) {
    var form = document.createElement("form");
    form.target = "_blank";
    form.method = "POST";
    form.action = url;
    form.style.display = "none";

    for (var key in data) {
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = data[key];
        form.appendChild(input);
    }
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}