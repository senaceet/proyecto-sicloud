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
<body style="background-color: gray;">


      <div class="main">
         <div class="col-md-6 col-sm-12 mx-auto">
            <div class="login-form">
               <form class="card card-body my-5" method="POST" action="UsuarioController.php">
                  <div class="form-group">
                     <label>Nombre de usuario</label>
                     <input type="text" name="name" class="form-control" placeholder="digite su nombre de usuario">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" name="pass" class="form-control" placeholder="digite su contraseña">
                  </div>
                  <a class="my-2 mx-auto" href="#">¿Olvido su contraseña?</a><br>
                  <input type="hidden" name="action" value="login">
                  <button type="submit" class="btn btn-primary">Iniciar sesion</button><br>
               </form>
            </div>
         </div>
      </div>


</body>


</html>


