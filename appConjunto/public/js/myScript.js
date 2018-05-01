$(document).ready(function(){

$("#nuevaNoticia").on("click",function(){obtenerFormulario($("#nuevaNoticia").attr("data-form"))});

$(".eliminarNoticia").on("click",function(e){estadoNoticia(e)});

$(".notificarPropietario").on("click",function(e){notificarPropietarios(e);});


function notificarPropietarios(e){

var id_noticia = e.target.value;

$.confirm({

      title:"NOTIFICAR PROPIETARIOS",
      theme: 'dark',
      type:"blue",
    content: function () {
       var self = this;       
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
 return $.ajax({
  method: "POST",
  url:"obtenerFormNotificacion",
  data: {"form": "enviarNotificacion"}
  }).done(function(resultado) {
self.setContent(resultado);
  });
},
buttons: {

formSubmit: {
            text: 'ENVIAR',
            btnClass: 'btn-blue',
            action: function () {
                var chekBx = this.$content.find('#todosCheck');
                if(!chekBx.is(':checked')){
                var interior = this.$content.find('.selectInts').val();
                enviarNotificacion(interior,id_noticia);
                }else{
                enviarNotificacion(chekBx.val(),id_noticia);
                }
            }
        },CANCELAR:function () {
        }
      }
  });
}

function enviarNotificacion(topic,id_noticia){

  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  $.ajax({
  method: "POST",
  url:"enviarNotificacion",
  data: {"topic": topic,"id_noticia":id_noticia}
  }).done(function(resultado) {

    $.confirm({
    title:"NOTICIA ENVIADA",
    theme: 'dark',
    type:'green',
    content: resultado,
        buttons: {
        ACEPTAR:function () {
        }
      }
    });

  });
}

function estadoNoticia(e){

$.confirm({
    title:"ATENCION",
    theme: 'dark',
    type:'red',
    animation: 'scaleX',
    closeAnimation: 'scaleX',
    content: "¿Seguro que desea eliminar este registro?",
        buttons: {
        ACEPTAR:function () {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
  method: "DELETE",
  url:e.target.value,
  }).done(function(resultado) {
 mostrarAlerta(resultado);
  });
        },
        CANCELAR:function () {
        }
    }
});

}

function obtenerFormulario(tipoForm){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.ajax({
  method: "POST",
 url:"obtenerFormulario",
  data: {"form": tipoForm}
	}).done(function(resultado) {
	  $("#contenido").html(resultado)
  });

  }

function mostrarAlerta(contenido){
  $.confirm({
    title:"ATENCION",
    theme: 'dark',
    type:'green',
    animation: 'scaleX',
    closeAnimation: 'scaleX',
    content: contenido,
        buttons: {
        ACEPTAR:function () {
          window.location.href = "noticias";
        }
      }
    });/**/
}

});