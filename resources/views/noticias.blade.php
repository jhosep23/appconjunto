@extends('layouts.navLayout')

@section('contentCss')
<link href="css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection
@section('content')

<div id="contenido">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">conjunto</a>
        </li>
        <li class="breadcrumb-item active">noticias</li>
      </ol>
<div class="card mb-3">
        <div class="card-body">
            <button id="nuevaNoticia" data-form="noticiaNueva" class="btn btn-primary">
              <i class="fa fa-plus"></i>nueva noticia</button>
        </div>
    </div>
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-newspaper-o"></i>Noticias del conjunto</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>TITULO</th>
                  <th>MENSAJE</th>
                  <th>FECHA</th>
                  <th>ACCION</th>
                </tr>
              </thead>
              <tbody>   
                @foreach($noticia as $n)
                <tr>
               
                  <td>{{$n->titulo}}</td>
                  <td>{{$n->cuerpo_noticia}}</td>    
                  <td>{{$n->fecha}}</td>
                  <td>

<button class="btn btn-link fa fa-reply notificarPropietario" value="{{$n->id_noticia}}"  title="reenviar" style="font-size: 20px;color: #28a745;">
</button>  

<button  class="btn btn-link fa fa-trash-o eliminarNoticia" value="{{route('noticias.destroy',$n->id_noticia)}}"  title="eliminar" style="font-size: 20px;color: #c62f2f;">
</button>           

<a  class="btn btn-link fa fa-eye" href="{{route('noticias.show',$n->id_noticia)}}"  title="ver noticia" style="font-size: 20px;color: #007bff">
</a>   

                  </td>
               
                </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>


@endsection

@section('contentScripts')
<script src="js/tablas/jquery.dataTables.js"></script>
<script src="js/tablas/dataTables.bootstrap4.js"></script>
      <script type="text/javascript">
$("#dataTable").DataTable({ 
 "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
});
$('#dataTable_info').html('');
</script>
@if(Session::has('info'))
<input  type="hidden" class="informacionS" value="{{Session::get('info')}}" >
<script type="text/javascript">
    $.confirm({
    title:"ATENCION",
    theme: 'dark',
    type:'blue',
    animation: 'scaleX',
    closeAnimation: 'scaleX',
    content: $(".informacionS").val(),
        buttons: {
        ACEPTAR:function () {
        }
    }
});
</script>
@endif
@endsection

