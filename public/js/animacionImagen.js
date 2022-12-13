"use strict";

let botonesComprar = document.querySelectorAll(".btnComprar");
for(let boton of botonesComprar) {
    boton.addEventListener("click", moverImagen);
}

function moverImagen() {
    if(window.innerWidth >= 992 && document.querySelector(".carritoIconDiv.carrito-lg")) {

    let elementoImagen = this.parentNode.parentNode.querySelector(".imagenListadoProducto");
    let elementoCarrito = document.querySelector(".carritoIconDiv.carrito-lg");

    let sourceImage = elementoImagen.src;

    let ghostElement = document.createElement("div");
    ghostElement.classList.add("ghost");
    ghostElement.style.backgroundImage = "url("+sourceImage+")";

    let rect;

    let marco = document.body;
    rect = marco.getBoundingClientRect();

    let rectImg = elementoImagen.getBoundingClientRect();
    let imgX = rectImg.left - rect.left;
    let imgY = rectImg.top + 150 - rect.top;

    ghostElement.style.left = imgX + "px" ;
    ghostElement.style.top = imgY + "px";

    let rectCarr = elementoCarrito.getBoundingClientRect();

    document.body.append(ghostElement);
   
    
    setTimeout(function() {
        let correction = rect.left*20000;
        console.log(rectCarr.left);
        ghostElement.style.left = rectCarr.left - rect.left + "px" ;
        ghostElement.style.top = rectCarr.top + 200 - rect.top + "px";
        ghostElement.style.width = "0px";
        ghostElement.style.height = "0px";
        ghostElement.style.opacity = 0;
    },0.01);

    setTimeout(function() {
        ghostElement.remove();
        ghostElement = undefined;
    },5000);
  

    }
}
