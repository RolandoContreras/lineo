function send_message(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
        if(name == ""){
            var texto = "";
            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            texto = texto+'<p style="text-align: center;">Ingrese su nombre</p>';
            texto = texto+'</div>';                 
            $("#respose").html(texto);
            $("#name").focus();
        $("#name").focus();
        }else if(email == ""){
            var texto = "";
            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            texto = texto+'<p style="text-align: center;">Ingrese su e-mail</p>';
            texto = texto+'</div>';                 
            $("#respose").html(texto);
            $("#email").focus();
        }else if(subject == ""){
            var texto = "";
            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            texto = texto+'<p style="text-align: center;">Ingrese el asunto</p>';
            texto = texto+'</div>';                 
            $("#respose").html(texto);
            $("#subject").focus();
        }else if(message == ""){
            var texto = "";
            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            texto = texto+'<p style="text-align: center;">Ingrese el mensaje</p>';
            texto = texto+'</div>';                 
            $("#respose").html(texto);
            $("#message").focus();
        }else{
            var email_2 = validar_email(email);
            if(email_2 == true){
                   $.ajax({
                   type: "post",
                   url: site+"contact/send_messages",
                   dataType: "json",
                   data: {name : name,
                          email : email,
                          subject : subject,
                          message : message
                          },
                   success:function(data){
                       if(data.message == true){
                           Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Mensaje enviado',
                              showConfirmButton: false,
                              footer: 'En breve nos comunicaremos con usted',
                              timer: 1500
                            });
                            window.setTimeout( function(){
                                 window.location = site+"contacto";
                             }, 1500 );  
                       }else{
                           Swal.fire({
                              icon: 'error',
                              title: 'Ups! Ocurrio un error',
                              footer: 'Inténtelo nuevamente'
                            });
                       }
                   }         
                 });
            }else{
                document.getElementById("message").style.display = "block";
                $("#email").focus();
            }
        }
    
}
function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}