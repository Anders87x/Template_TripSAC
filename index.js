function init(){
    $("#envio_form").on("submit",function(e){
        enviar(e);	
    });
}

$(document).ready(function(){

});

function enviar(e){
    e.preventDefault();
	var formData = new FormData($("#envio_form")[0]);
    $.ajax({
        url: "controller/email.php?op=send_alerta",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){  
            console.log(datos);  
            $('#envio_form')[0].reset();
            Swal.fire('Enviado!','Se envio correctamente.','success');
        }
    }); 
}

init();