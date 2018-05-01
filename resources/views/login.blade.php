<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ingresar</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/jquery-confirm.min.css">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center>Ingresar</center></div>
      <div class="card-body">
        <form id="ingresar" action="ingresar" method="post">
          @csrf
          <div class="form-group">
            <label for="correo">Email</label>
            <input name="correo" class="form-control" id="correo" type="email" aria-describedby="emailHelp" placeholder="Escriba su correo">
          </div>
          <div class="form-group">
            <label for="pass">Contraceña</label>
            <input name="pass" class="form-control" id="pass" type="password" placeholder="Escriba su contraceña">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Ingresar">
        </form>
      </div>
    </div>
  </div>
  
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="js/validacionLogin.js"></script>

</body>

</html>
