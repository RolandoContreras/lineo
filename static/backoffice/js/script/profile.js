function change_pass(){
    var pass = document.getElementById("pass").value;
    var new_pass = document.getElementById("new_pass").value;
    var new_pass_confirm = document.getElementById("new_pass_confirm").value;
            if(new_pass == ""){
                $("#message").html();
                 var texto = "";
                 texto = texto+'<center>';
                 texto = texto+'<div class="alert alert-danger">';
                 texto = texto+'<p>Ingrese nueva contraseña</p>';
                 texto = texto+'</div>';                 
                 texto = texto+'</center>';
                 $("#message").html(texto);
                $("#new_pass").focus();
            }else if(new_pass_confirm == ""){
                $("#message").html();
                 var texto = "";
                 texto = texto+'<center>';
                 texto = texto+'<div class="alert alert-danger">';
                 texto = texto+'<p>Ingrese confirmación de nueva contraseña</p>';
                 texto = texto+'</div>';                 
                 texto = texto+'</center>';
                 $("#message").html(texto);
                $("#new_pass_confirm").focus();
            }else{
                if(new_pass == new_pass_confirm){
                    $.ajax({
                       type: "post",
                       url: site+"backoffice/profile/update_password",
                       dataType: "json",
                       data: {pass : pass,
                              new_pass : new_pass,
                              new_pass_confirm : new_pass_confirm},
                       success:function(data){          
                           if(data.status == "true"){
                               $("#message").html();
                                 var texto = "";
                                 texto = texto+'<center>';
                                 texto = texto+'<div class="alert alert-success">';
                                 texto = texto+'<p>Contraseña Cambiada</p>';
                                 texto = texto+'</div>';                 
                                 texto = texto+'</center>';
                                 $("#message").html(texto);
                           }else{
                               $("#message").html();
                                 var texto = "";
                                 texto = texto+'<center>';
                                 texto = texto+'<div class="alert alert-danger">';
                                 texto = texto+'<p>Hubo un error</p>';
                                 texto = texto+'</div>';                 
                                 texto = texto+'</center>';
                                 $("#message").html(texto);
                                location.reload();
                           }
                       }         
                     });
                }else {
                        $("#message").html();
                         var texto = "";
                         texto = texto+'<center>';
                         texto = texto+'<div class="alert alert-danger">';
                         texto = texto+'<p>Las contraseña no son iguales</p>';
                         texto = texto+'</div>';                 
                         texto = texto+'</center>';
                         $("#message").html(texto);
                         $("#new_pass").focus();
                }
            } 
}   
