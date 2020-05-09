function recuperar(){
    var email = document.getElementById("email").value;
        //validate
        if(email == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese E-mail</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
            $("#email").focus();
        }else{
            var email_2 = validar_email(email);
            if(email_2 == true){
                   $.ajax({
                        type: "post",
                        url: site+"forget/recuperar",
                        dataType: "json",
                        data: { email : email},
                        success:function(data){
                            if(data.status == false){
                                Swal.fire({
                                  icon: 'error',
                                  title: 'E-mail no registrado',
                                  footer: 'Intente nuevamente'
                                });
                                 $("#email").focus();
                            }else{
                                 Swal.fire({
                                      position: 'top-end',
                                      icon: 'success',
                                      title: 'Mensaje enviado',
                                      footer: 'Revise su bandeja de entrada',
                                      showConfirmButton: false,
                                      timer: 1500
                                    });
                                window.setTimeout( function(){
                                     window.location = site+"recuperar-contrasena";
                                 }, 1500 ); 
                            }
                        }         
                      }); 
            }else{
                document.getElementById("message_email").style.display = "block";
                $("#email").focus();
            }
        }
//    }
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}