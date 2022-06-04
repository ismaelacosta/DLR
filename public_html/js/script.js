function aumentar(e,a){var t=document.getElementById("precio_"+e),o=document.getElementById("cantidad_a_comprar_"+e),e=document.getElementById("precio_producto_"+e);o.value<a?(o.value=parseFloat(o.value)+parseFloat(1),e.value=t.value*o.value,cargaPagina()):alert("No se encuentran mas productos en el inventario")}function disminuir(e){var a=document.getElementById("precio_"+e),t=document.getElementById("cantidad_a_comprar_"+e),e=document.getElementById("precio_producto_"+e);1<t.value?(t.value=parseFloat(t.value)-parseFloat(1),e.value=a.value*t.value,cargaPagina()):alert("Tiene que haber un minimo de productos a agregar en el carrito")}function cargaPagina(){var a,e=document.getElementById("precio_total"),t=0,o=document.getElementById("contador");for(let e=1;e<o.value;e++)a=document.getElementById("precio_producto_"+e),t=parseFloat(t)+parseFloat(a.value);return e.value=t,e}function redireccionar_agregar_producto(){window.location="agregar_producto_view.php"}window.addEventListener("load",cargaPagina);

function GenerarPDF(){ //Ticket de ventas
    var input=document.createElement("input");
    input.setAttribute("name","contenido");
    input.setAttribute("type","hidden");
    var html=document.getElementsByTagName("style")[0].outerHTML;
    html+=document.getElementById("Comprobante").outerHTML;
    input.setAttribute("value",html);
    document.getElementById("ReportePDF").appendChild(input);
    document.getElementById("ReportePDF").submit();
}
function GenerarPDFVentas(){ //Reporte de ventas del administrador
    var input=document.createElement("input");
    input.setAttribute("name","contenido");
    input.setAttribute("type","hidden");
    var html= document.getElementsByTagName("table")[0].outerHTML;
    input.setAttribute("value",html);
    document.getElementById("ReportePDF").appendChild(input);
    document.getElementById("ReportePDF").submit();
}