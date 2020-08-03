//alert("Hola mundo");

//-------------------------------------------------------------------------
// Reproduccion automatica de video

var strDebug = '' ;
var debug = document.getElementById('debug');
//Saber el tamaño del viewport
var altoBrowser = window.innerHeight;

strDebug += "Alto del browser : "+altoBrowser + "px<br>";
debug.innerHTML = strDebug


//3. obtener los videos
var videos = document.querySelectorAll('video source');
console.log(videos);
//3.1  detectar su ubicacion actual (top) con respecto al body
videos.forEach(
    
function( v ){
    var vidMax = v.offsetTop;
    var vidMin = v.offsetTop - altoBrowser;
   
    strDebug += "Video encontrado "+ v.src +" - "+ vidMax + "video termina en"+ vidMin + " <br/>";
}

);


//2. detectar el scroll
document.body.onscroll = function(){
    //obtener el eje y
var y = window.pageYOffset;
debug.innerHTML = strDebug + "Posicion actual " + y + "px<br>"
}

//-------------------------------------------------------------------------







//BUSCAR CLIENTE
$('#nit_cliente').addEventListener("keyup", function(e){// evento al oprimir tecla dentro del input con el id
e.preventDefault();// evita la recargar de la pagina
var cl = $(this).val(); // extrae el valor
var action = 'searchCliente'; // identifica la funcion

    $.ajax({
        url: 'ajax.php',
        type: "POST",
        async : true,
        data: { action:action, cliente:cl }, // captura los datos de la varibles

        success: function(response)
        {
            console.log(response);
        },
        error: function(error){

        }
    });// fin de petcion ajax

});// fin de interaccion con el teclado



