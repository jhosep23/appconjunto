$(document).ready(function(){

$("#correo").focus(function(){
	
});

$("#ingresar").on("submit",function(e){validarCampos(e)});

	function validarCampos(e){

		if ($("#correo").val() == 0 || $("#pass").val() == 0) {
			mostrarAlerta("no debe dejar campos vacios");
		}else{

		if (!caracteresCorreoValido($("#correo").val())) {
				mostrarAlerta("ingrese un correo valido");
			}else{

			if ($("#pass").val().length < 6 || $("#pass").val() == 0 ) {
				mostrarAlerta("ingrese una contraceña valida");
				}else{
					return;
				}
				e.preventDefault();
			}
		}
		e.preventDefault();

}

function caracteresCorreoValido(email){
	
	var retorno;
    
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        retorno = false;
    }else{
    
        retorno = true;
    }
    return retorno;
}

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