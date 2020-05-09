function login(){
    var code = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    //VERIFY DATA RECAPTCHA
        if(code == ""){
            $("#respose").html();
            var texto = "";
            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            texto = texto+'<p style="text-align: center;">Ingrese su usuario</p>';
            texto = texto+'</div>';                 
            $("#respose").html(texto);
            $("#username").focus();
        }else if(pass == ""){
            var texto = "";
            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            texto = texto+'<p style="text-align: center;">Ingrese su contraseña</p>';
            texto = texto+'</div>';                 
            $("#respose").html(texto);
            $("#password").focus();
        }else{
            $.ajax({
               type: "post",
               url: site+"login/validate",
               dataType: "json",
               data: {code : code,
                      pass : pass},
               success:function(data){          
                   if(data.status == "true"){
                       Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Bienvenido',
                              showConfirmButton: false,
                              timer: 1500
                            });
                        window.setTimeout( function(){
                             window.location = site+"backoffice";
                         }, 1500 );    
                   }else if(data.status == "true2"){
                       Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Bienvenido',
                              showConfirmButton: false,
                              timer: 1500
                            });
                        window.setTimeout( function(){
                             window.location = site+"backoffice/pay_order";
                         }, 1500 );
                   }else{
                       Swal.fire({
                              icon: 'error',
                              title: 'Usuario Invalido',
                            });
                   }
               }         
             });
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