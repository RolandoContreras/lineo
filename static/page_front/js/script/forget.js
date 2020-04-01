function recuperar(){
    var email = document.getElementById("email").value;
    //GET DATA RECAPTCHA
    var response = grecaptcha.getResponse();
    if(response.length == 0){
        $("#respose").html();
        var texto = "";
        texto = texto+'<div class="alert alert-danger">';
        texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
        texto = texto+'<p style="text-align: center;">Captcha no verificado</p>';
        texto = texto+'</div>';                 
        $("#respose").html(texto);
    } else{
        if(email == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese E-mail</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#email").focus();
        }else{
            var email_2 = validar_email(email);
            if(email_2 == true){
                   $.ajax({
                   type: "post",
                   url: site+"forget/recuperar",
                   dataType: "json",
                   data: {email : email},
                   success:function(data){
                       if(data.message == true){
                           swal("Mensaje enviado", "En breves minutos le llegará un correo electrónico con tu contraseña actual. Gracias", "success");
                       }else{
                           swal("E-mail no registrado", "El e-mail que ingresó no está registrado con nosotros. Gracias", "error");
                       }
                   }         
                 });
            }else{
                document.getElementById("email").style.display = "block";
                $("#email").focus();
            }
        }
    }
    
    
}
function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}