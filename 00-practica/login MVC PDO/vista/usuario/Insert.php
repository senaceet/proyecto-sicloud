<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: grey;">
<div class="main">
         <div class="col-md-6 col-sm-12 mx-auto">
            <div class="login-form">
                
               <form class="card card-body my-5" method="POST" action="UsuarioController.php">
                  <label class="my-4 mx-auto"><b>REGISTRAR</b></label>
                  <div class="form-group">
                     <label for="rol">Rol</label>
                     <select class="form-control" name="rol" id="">
                        <option value="Administrador">Administrador</option>
                        <option value="Empleado">Empleado</option>
                        <option value="Usuario">Usuario</option>
                     </select>
                  </div>  
                  
                  <div class="form-group">
                     <label>Nombre de usuario</label>
                     <input type="text" class="form-control" name="nombre" placeholder="digite su nombre de usuario">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" name="pass" placeholder="digite su contraseña">
                  </div>

                  <input type="hidden" name="action" value="insert">
                  <button type="submit" class="btn btn-primary">Registrarse</button><br>
               </form>
            </div>
         </div>
      </div>
</body>
</html>