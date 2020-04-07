function eviar_mensaje(){
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var course = document.getElementById("course").value;
    
        if(name == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Nombre</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#name").focus();
        }else if(last_name == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Apellidos</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#last_name").focus();
        }else if(email == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese E-mail</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#email").focus();
        }else if(phone == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Télefono</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#phone").focus();
        }else if(course == ""){
                    $("#respose").html();
                    var texto = "";
                    texto = texto+'<div class="alert alert-danger">';
                    texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                    texto = texto+'<p style="text-align: center;">Ingrese Curso de Interes</p>';
                    texto = texto+'</div>';                 
                    $("#respose").html(texto);
                    $("#course").focus();
        }else{
            var email_2 = validar_email(email);
            if(email_2 == true){
                   $.ajax({
                   type: "post",
                   url: site+"mensaje",
                   dataType: "json",
                   data: {name : name,
                          last_name : last_name,
                          email : email,
                          phone : phone,
                          course : course
                          },
                   success:function(data){
                       if(data.status == true){
                           $("#respose").html();
                            var texto = "";
                            texto = texto+'<div class="alert alert-success">';
                            texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                            texto = texto+'<p style="text-align: center;">Mensaje enviado, en la brevedad nos comunicaremos con usted.</p>';
                            texto = texto+'</div>';                 
                            $("#respose").html(texto);
                       }else{
                           $("#respose").html();
                            var texto = "";
                            texto = texto+'<div class="alert alert-danger">';
                            texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                            texto = texto+'<p style="text-align: center;">Hubo un error, vuelve a intentar.</p>';
                            texto = texto+'</div>';                 
                            $("#respose").html(texto);
                       }
                   }         
                 });
            }else{
                $("#respose").html();
                var texto = "";
                texto = texto+'<div class="alert alert-danger">';
                texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                texto = texto+'<p style="text-align: center;">E-mail no válido</p>';
                texto = texto+'</div>';                 
                $("#respose").html(texto);
                $("#email").focus();
            }
        }
}
function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}