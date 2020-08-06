//alert("hola");




$(document).ready(function() {
  var ocultar = $("#ocultar");
  var mostrar = $("#mostrar");
  var toggle = $("#toggle");
  var elemento = $(".noticia");

  ocultar.click(function() {
    elemento.hide(1000);
  });

  mostrar.click(function() {
    elemento.show(1000);
  });

  toggle.click(function() {
    elemento.toggle(1000);
  });
});






