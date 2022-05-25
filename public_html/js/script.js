function aumentar( numero_producto , limite_superior){
    var precio = document.getElementById("precio_"+numero_producto);
    
    var cantidad_a_comprar = document.getElementById("cantidad_a_comprar_"+numero_producto);
    var precio_producto = document.getElementById("precio_producto_"+numero_producto);

    if (cantidad_a_comprar.value < limite_superior) {
        cantidad_a_comprar.value = parseFloat(cantidad_a_comprar.value) + parseFloat(1) ;
        precio_producto.value = precio.value * cantidad_a_comprar.value;
        cargaPagina();
    }else{
        alert("No se encuentran mas productos en el inventario");
    }
    

}

function disminuir( numero_producto){
    var precio = document.getElementById("precio_"+numero_producto);
    var cantidad_a_comprar = document.getElementById("cantidad_a_comprar_"+numero_producto);
    var precio_producto = document.getElementById("precio_producto_"+numero_producto);

    if (cantidad_a_comprar.value > 1) {
        cantidad_a_comprar.value = parseFloat(cantidad_a_comprar.value) - parseFloat(1) ;
        precio_producto.value = precio.value * cantidad_a_comprar.value;
        cargaPagina();
    }else{
        alert("Tiene que haber un minimo de productos a agregar en el carrito");
    }

}

window.addEventListener("load", cargaPagina);
function cargaPagina() {
    var precio_total = document.getElementById("precio_total");
    var elemento;
    var total=0;
    var contador = document.getElementById("contador");
    for (let index = 1; index < contador.value; index++) {
        elemento = document.getElementById("precio_producto_"+index);
        total = parseFloat(total) + parseFloat(elemento.value);        
    }
    precio_total.value=total;
}