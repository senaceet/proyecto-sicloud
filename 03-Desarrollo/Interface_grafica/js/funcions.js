//alert("Hola mundo");



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



