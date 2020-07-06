   <!-- Complementos bootstrap java script-->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
           <script src="https://kit.fontawesome.com/451d49791e.js" crossorigin="anonymous"></script>
<!-- data tables----------------------------------------------------------------------------------  -->
    <!-- jQuery, Popper.js, Bootstrap JS -->

      
    <!-- datatables JS -->
</body>     



   <!-- java script--------------------------------------------------------------------- -->
   <script type="text/javascript">
                    $(document).ready(function(){

                        recargarLista();
                        $('#lista1').change(function(){
                            recargarLista();
                        });
                    })// fin deprimera funcion 
                    </script>



                    <script type="text/javascript">
                        function recargarLista(){
                            $.ajax({
                                type:"POST",
                                url:"datos.php",
                                data: "localidad=" + $('#lista1').val(),
                                success:function(r){
                                    $('#select2lista').html(r);
                                }


                            });// fin de ajax
                        }// fin de funcion recargar lista



                    </script>


</html>