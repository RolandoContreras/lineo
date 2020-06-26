function certificate() {
    var code = document.getElementById("code").value;
//    var texto = "";
//            texto = texto+'<div class="alert alert-danger alert-dismissible fade show" role="alert">';
//            texto = texto+'<p style="text-align: center;">Ingrese su nombre</p>';
//            texto = texto+'</div>';                 
//            $("#respose").html(texto);
//            $("#name").focus();


    $.ajax({
        type: "post",
        url: site + "certificados/validate",
        dataType: "json",
        data: {code: code},
        success: function (data) {
            if (data.status == true) {
                
                var texto = "";
                texto = texto+'<div class="stm-lms-wrapper">';
                texto = texto+'<div class="container">';
                texto = texto+'<div class="row">';                 
                
                texto = texto+'<div class="col-md-3 col-sm-12">';                 
                texto = texto+'<div class="stm_lms_user_side">';                 
                texto = texto+'<div class="stm-lms-user_avatar">';                 
                texto = texto+'<img src="'+data.img+'"></div>';                 
                texto = texto+'<h3>'+data.name+'</h3>';                 
                texto = texto+'</div>';                 
                texto = texto+'</div>';  
                texto = texto+'<div class="col-md-9 col-sm-12">';                 
                texto = texto+'<div class="stm_lms_user_info_top">';                 
                texto = texto+'<h1>Certificado Verificado <img src="' + site + 'static/page_front/images/checkmark.svg"></h1>';                 
                texto = texto+'</div>';       
                texto = texto+'<div class="stm_lms_user_bio">';                 
                texto = texto+'<div class="stm_lms_update_field__description"> ';                 
                texto = texto+'El certificado pertenece a '+data.name+' por haber terminado satisfactoriamente nuestro curso en U-Linex';                 
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'<div class="space-30"></div>';                 
                texto = texto+'<div class="stm_lms_courses all_loaded">';                 
                texto = texto+'<div class="stm_lms_courses">';                 
                texto = texto+'<h4>Curso: <b>'+data.course_name+'</b></h4>';   
                texto = texto+'<h4>Horas: <b>'+data.time+' horas</b></h4>';   
                texto = texto+'<h4>Fecha de Inicio: <b>'+data.date_start+'</b></h4>';   
                texto = texto+'<h4>Fecha de Termino: <b>'+data.date_end+'</b></h4>';   
                texto = texto+'<h4>Estado : <b>Terminado</b></h4>';   
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'<div class="space-30"></div>';   
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                $("#respose").html(texto);
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'EL código no es valido',
                    footer: 'Inténtelo con otro código'
                });
            }
        }
    });
}