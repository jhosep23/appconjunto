
       <?php if ($data["form"] == "noticiaNueva") { ?>
   <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">conjunto</a>
        </li>
         <li class="breadcrumb-item">
          <a href="#" onclick="javascript:window.location.reload();" >noticias</a>
        </li>
        <li class="breadcrumb-item active">registrar</li>
      </ol>
<div class="row" style="padding-bottom: 20px">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <form action="{{route('noticias.store')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="Titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

    <div class="form-group">
    <label for="cuerpo">Cuerpo de la noticia</label>
    <textarea class="form-control" id="cuerpo" name="cuerpo" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Imagen </label>
        <input type="file" name="imagen" class="form-control-file" id="imagen">
    </div>

  <div class="form-group">
    <label for="punto">Punto de encuentro</label>
    <input type="text" class="form-control" id="punto" name="punto" placeholder="punto">
        <small id="puntoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="">Tipo de noticia</label>
    <select class="form-control" id="tipoNoticia" name="tipoNoticia">
    <option value="0">seleccione...</option>
    @foreach($data["tipos"] as $tipo)
    <option value="{{$tipo->id_tipo_noticia}}">{{$tipo->nombre}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary" style="float: right;">registrar noticia</button>

        </form>
    </div>
</div>
        <?php } else if ($data["form"] == "formBusquedaU") {?>
  @foreach($data["usuarios"] as $u)
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

 <?php } else if ($data["form"] == "enviarNotificacion") {?>
<form id="formEnviarNotificacion" action="javascript:void()">
    <p>Enviar noticia a todos los propietarios </p>
<input id="todosCheck" type="checkbox" value="allInts"  checked="" >

<div id="selectIntsDiv">
    <center><label>Seleccione el interior</label></center>
    <center>
<select class="selectInts">
    <option>seleccione..</option>
    @foreach($data["ints"] as $key => $i)
    <option value="{{$key}}">{{$i}}</option>
    @endforeach
</select>
</center>
</div>
</form>
<script type="text/javascript">

checkedAll();
$("#todosCheck").click(checkedAll);

function checkedAll(){
      if ($("#todosCheck").is(':checked')) {
$("#selectIntsDiv").hide();
    }else{
        $("#selectIntsDiv").show();
    }  
}
    
</script>
        <?php }?>