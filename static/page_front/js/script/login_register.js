function login(){
    var code = document.getElementById("username2").value;
    var pass = document.getElementById("password2").value;
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

function register(){
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var phone = document.getElementById("phone").value;
    var country = document.getElementById("country").value;
    //GET DATA RECAPTCHA
        //validate
        if(name == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese Nombre</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
            $("#name").focus();
        }else if(last_name == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese Apellidos</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
             $("#last_name").focus();
        }else if(email == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese E-mail</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
             $("#email").focus();
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
        }else if(phone == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese Teléfono</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
            $("#phone").focus();
        }else if(country == ""){
            $("#mensaje").html();
             var texto = "";
             texto = texto+'<center>';
             texto = texto+'<div class="alert alert-danger">';
             texto = texto+'<p>Ingrese País</p>';
             texto = texto+'</div>';                 
             texto = texto+'</center>';
             $("#mensaje").html(texto);
            $("#country").focus();
        }else{
            
            var email_2 = validar_email(email);
            if(email_2 == true){
                   $.ajax({
                        type: "post",
                        url: site+"register/validate",
                        dataType: "json",
                        data: {name : name,
                                last_name : last_name,
                                email : email,
                                phone : phone,
                                pass : pass,
                                country : country},
                        success:function(data){
                            if(data.status == "email"){
                                Swal.fire({
                                  icon: 'error',
                                  title: 'El Email ya fue registrado',
                                  footer: 'Ingrese otro Email'
                                });
                                 $("#email").focus();
                            }else if(data.status == "success2"){
                                 Swal.fire({
                                      position: 'top-end',
                                      icon: 'success',
                                      title: 'Registro Creado',
                                      showConfirmButton: false,
                                      timer: 1500
                                    });
                                window.setTimeout( function(){
                                     window.location = site+"backoffice/pay_order";
                                 }, 1500 ); 
                             }else{
                                 Swal.fire({
                                      position: 'top-end',
                                      icon: 'success',
                                      title: 'Registro Creado',
                                      showConfirmButton: false,
                                      timer: 1500
                                    });
                                window.setTimeout( function(){
                                     window.location = site+"backoffice";
                                 }, 1500 ); 
                            }
                        }         
                      }); 
            }else{
                document.getElementById("message_email").style.display = "block";
                $("#email").focus();
            }
        }
}