//alert("hola");


// una vez carga el Dom crea tres elementos y los almacena en varibles
// Despues captura por medio del id "en este caso son botones y el objeto que es de la clase .noticia"
// toma el objeto creado y capta el evento click, y con  hide oculta show muestra y toggle las dos
$(document).ready(function() {
  var ocultar = $("#ocultar");
  var mostrar = $("#mostrar");
  var toggle = $(".toggle");
  var elemento = $(".noticia");

  ocultar.click(function() {
    elemento.hide(1000);
  });

  mostrar.click(function() {
    elemento.show(1000);
  });


  noticias = true;
  toggle.click(function() {
    t = $(".toggle");
    
    if( noticias == true  ){
      elemento.toggle(1000);
      t.text("Mostrar noticia");
      noticias = false;
    }else{
      elemento.toggle(1000);
      t.text("Ocultar noticia");
      noticias = true;
    }
  });
});



//--------------------------------------------------------------------------



    //-----------------------------------------------
    //Captura el movimiento del scroll "evento", despues con offset determina la posicon, si la posicion es mayor a 56 
    // con addClass realiza el cambio de la clase, de lo contrario remuevela clase "css" 
    $(window).scroll(function() {
      if ($("#menu").offset().top > 56) {
          $("#menu").addClass("bg-inverse");
      } else {
          $("#menu").removeClass("bg-inverse");
      }

  });

// Captura el movimiento del mouse "evento hover" una vez detecta el hover lanza la funcion donde por medio de addClass
// cambia la clase
  $("#menu").hover(function() {
      $("#menu").addClass("bg-inverse");
  });


  //-----------------------------------------------


  

  $("#login").hover( function(){
  // alert("eveento hover");
   $(".in").addClass("animate__pulse");
   $("#text").addClass("animate__tada");
   t = $("#text");
   t.text("Ingresa tus datos");
  
  });



   formLogin = document.querySelector('#login');
   formLogin.addEventListener('mouseout', function () {
   $(".in").removeClass("animate__pulse");
   $("#text").removeClass("animate__tada");
   t = $("#text");
   t.text("Inicio sesion");
});




 
