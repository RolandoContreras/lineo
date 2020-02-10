function send_message(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
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
        if(name == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Nombre</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#name").focus();
        }else if(email == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese E-mail</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#email").focus();
        }else if(subject == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Asunto</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#subject").focus();
        }else if(message == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Mensaje</p>';
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
                           $("#respose").html();
                            var texto = "";
                            texto = texto+'<div class="alert alert-success">';
                            texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                            texto = texto+'<p style="text-align: center;">Mensaje enviado, en la brevedad nos comunicaremos con usted.</p>';
                            texto = texto+'</div>';                 
                            $("#respose").html(texto);
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