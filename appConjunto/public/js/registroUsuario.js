$(document).ready(function(){

alert("hola");




function mostrarAlerta(contenido){

  $.confirm({
    title:"ATENCION",
    theme: 'dark',
    type:'red',
    animation: 'scaleX',
    closeAnimation: 'scaleX',
    content: contenido,
        buttons: {
        ACEPTAR:function () {
        }
      }
    });
  
}

});