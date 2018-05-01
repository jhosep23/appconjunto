$(document).ready(function(){

$(".eliminarUsuario").on("click",function(){

	mostrarAlerta("orange","¿Seguro que desea eliminar este registro?",$(this).attr("data-id"),"borrarUsuario")

});
$("#busquedaAllUsuarios").keyup(function(){

var valor = this.value;

  if (valor < 1) {valor = "*"}
    buscarAllUsuarios(valor);
    });


function buscarAllUsuarios(valor){

$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  
  $.ajax({
  method: "GET",
  url:"usuarios/"+valor,
  data:{"form":"formBusquedaU"}
  }).done(function(resultado) {
  	$("#contenidoAllUsuarios").html();
  	$("#contenidoAllUsuarios").html(resultado);
  });
   
}

function mostrarAlerta(tipo,contenido,id,funcion){

  $.confirm({
    title:"ATENCION",
    theme: 'dark',
    type:tipo,
    animation: 'scaleX',
    closeAnimation: 'scaleX',
    content: contenido,
        buttons: {
        ACEPTAR:function () {
        	if (funcion=="borrarUsuario") {borrarUsuario(id);}
        	if (funcion=="GOusuarios") {window.location.href = "usuarios";}
        	 
        },
        CANCELAR:function () {
        }
    }
});

       }

     function borrarUsuario(id){
       	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  
  $.ajax({
  method: "DELETE",
  url:"usuarios/"+id,
  data:{"id":id}
  }).done(function(resultado) {
  mostrarAlerta("green",resultado,"id","GOusuarios");
  });
       }
     
    });
  