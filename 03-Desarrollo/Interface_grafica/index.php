<?php 
require  "conexion.php";
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>



   <link rel="stylesheet" href="css/my_css.css">
	<link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">

	
  
</head>
<body>





<!--  NAV -->
<nav class="navbar navbar-expand-lg    navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Hola ADSI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="">Aprendiz <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Por: Javier Reyes Neira</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Trimestre V</a>
              </li>
           
          </ul>
        </div>
	  </nav>
	  
	  <!--  NAV -->

  <div class = "container pt-4">


<!--MODULO insertar datos -->


        <div class = "col-md-4 offset-md-4 ">
			<div class = "card card-body">
				<div class = "form-group">
		
					<form action="post.php" method='POST'>
						<input type="text" placeholder="Nombre"  name="nombre" class="form-control">
						<input type="text" placeholder="Apellido" name="apellido" class="form-control">
						<input type="text" placeholder="Correo" name="email" class="form-control">
						<input type="text" placeholder="Telefono" name="telefono" class="form-control">
						<input type="hidden" name="accion" value="insert">
						<input type="submit" name="submit" class = "btn btn-primary form-control">
					</form>
				</div>
			</div>
		</div>
		








<!-- Fin de insertar datos -->






<!-- Visulizar datos -->

		<div class="container pt-4">


				<br>
					<table  class="table table-bordered table-striped bg-white table-sm" >
						<thead>
							<tr>
								<td>id</td>
								<td>nombre</td>
								<td>apellido</td>
								<td>email</td>
								<td>telefono</td>	
							</tr>
						</thead>
									<?php 
									//mostrar
											$sql="SELECT * from t_persona";
											$result=mysqli_query($conexion,$sql);

											while($mostrar=mysqli_fetch_array($result)){
									?>
												<tr>
														<td><?php echo $mostrar['id'] ?></td>
														<td><?php echo $mostrar['nombre'] ?></td>
														<td><?php echo $mostrar['apellido'] ?></td>
														<td><?php echo $mostrar['email'] ?></td>
														<td><?php echo $mostrar['telefono'] ?></td>
													</tr>
										<?php }?>  <!-- Cierre de while -->
					</table>




		</div>
	</div>
<!-- fin de visulizar datos -->




</body>
</html>