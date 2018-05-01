@extends('layouts.navLayout')

@section('content')

<div id="contenido">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">conjunto</a>
        </li>
        <li class="breadcrumb-item active">usuarios</li>
      </ol>

<center><h1>usuarios</h1></center>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-9">
      <div class="form-group">
        <input id="busquedaAllUsuarios" type="text" class="form-control" placeholder="Buscar" >
      </div>
<hr>
	</div>
	<div class="col-md-2">
    <a href="{{route('usuarios.create')}}" class="">
		<button class="btn btn-primary">nuevo usuario</button>
    </a>
	</div>
</div>


<div class="row">
  <div class="col-md-1"></div>
    <div class="col-md-10">
      <div id="contenidoAllUsuarios">
  @foreach($usuarios as $u)
<div class="col-md-3" style="margin: 1% ;float: left;">
      <div class="card">
        <h5 style="text-align: center;" class="card-header">
          {{$u->nombre}}
        </h5>
        <div class="card-block">
          <center><i class="fa fa-user-circle" aria-hidden="true" style="font-size: 80px;padding:6%"></i></center>
          <p style="text-align: center;" class="card-text">
            {{$u->nombre}}&nbsp;
            {{$u->apellido}}
          </p>
          <center><small>{{$u->correo}}</small></center>
        </div>
        <div class="card-footer">
          <a href="{{route('usuarios.edit',$u->id_usuario)}}"><button class="btn btn-outline-warning btn-sm">actualizar</button></a>
          <button class="btn btn-outline-danger btn-sm eliminarUsuario" data-id ="{{$u->id_usuario}}">eliminar</button>
        </div>
      </div>
    </div>
  @endforeach
  </div>
  </div>
    <div class="col-md-1"></div>
  </div>
</div>
@endsection



@section('contentScripts')
<script type="text/javascript" src="js/usuarioScript.js"></script>
@endsection
