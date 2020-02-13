function login(){
    var code = document.getElementById("user_login").value;
    var pass = document.getElementById("user_pass").value;
    //GET DATA RECAPTCHA
    var response = grecaptcha.getResponse();
    //VERIFY DATA RECAPTCHA
    if(response.length == 0){
        $("#mensaje").html();
         var texto = "";
         texto = texto+'<center>';
         texto = texto+'<div class="alert alert-danger">';
         texto = texto+'<p>Captcha no verificado</p>';
         texto = texto+'</div>';                 
         texto = texto+'</center>';
         $("#mensaje").html(texto);
    } else {
        if(code == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese E-mail</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
            $("#user_login").focus();
        }else if(pass == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese Contraseña</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
            $("#user_pass").focus();
        }else{
            $.ajax({
               type: "post",
               url: site+"login/validate",
               dataType: "json",
               data: {code : code,
                      pass : pass},
               success:function(data){          
                   if(data.status == "true"){
                       $("#mensaje").html();
                         var texto = "";
                         texto = texto+'<center>';
                         texto = texto+'<div class="alert alert-success">';
                         texto = texto+'<p>Bienvenido</p>';
                         texto = texto+'</div>';                 
                         texto = texto+'</center>';
                         $("#mensaje").html(texto);
                       location.href = site + "backoffice";
                   }else{
                       $("#mensaje").html();
                         var texto = "";
                         texto = texto+'<center>';
                         texto = texto+'<div class="alert alert-danger">';
                         texto = texto+'<p>Datos Invalidos</p>';
                         texto = texto+'</div>';                 
                         texto = texto+'</center>';
                         $("#mensaje").html(texto);
                   }
               }         
             });
            }
    }
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
function fade_email(string){
    var string = document.getElementById("email").value;
    if(string != ""){ 
        document.getElementById("message_email").style.display = "none";
    }
}
function fade_password(string){
    var string = document.getElementById("password").value;
    if(string != ""){ 
        document.getElementById("message_password").style.display = "none";
    }
}