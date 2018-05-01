@extends('layouts.navLayout')

@section('contentCss')
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/jquery-confirm.min.css">
@endsection

@section('content')
     <style type="text/css">
    .header {
    font-size: 27px;
    padding: 10px;
}

.bigicon {
    font-size: 35px;
    color: #007bff;
}
</style>
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">conjunto</a>
        </li>
         <li class="breadcrumb-item">
          <a href="#" onclick="javascript:window.location.reload();" >usuarios</a>
        </li>
        <li class="breadcrumb-item active">Registo Usuario</li>
      </ol>
      <legend class="text-center header">REGISTRAR USUARIO</legend>
                      <form action="{{route('usuarios.store')}}" method="post">
   @include("fracmentoForm");
    <div class="row" style="padding-bottom:20px;">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary" style="float: right;">registrar usuario</button>
                            </div>
                        </div>
</form>
@endsection

@section('contentScripts')
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
    <script src="../js/myScript.js"></script>
@endsection