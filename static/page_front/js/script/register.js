function register(){
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var phone = document.getElementById("phone").value;
    var country = document.getElementById("country").value;
    //GET DATA RECAPTCHA
//    var response = grecaptcha.getResponse();
//        if(response.length == 0){
//            $("#mensaje").html();
//             var texto = "";
//             texto = texto+'<center>';
//             texto = texto+'<div class="alert alert-danger">';
//             texto = texto+'<p>Captcha no validado</p>';
//             texto = texto+'</div>';                 
//             texto = texto+'</center>';
//             $("#mensaje").html(texto);
//    }else{
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
                                     window.location = site+"backoffice";
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
//    }
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}