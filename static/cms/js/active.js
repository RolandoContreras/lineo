function new_activate(){
    var url= 'dashboard/activaciones/load';
    location.href = site+url;
}
function edit_activate(customer_course_id){
    var url= 'dashboard/activaciones/load/' + customer_course_id;
    location.href = site+url;
}
function cancel_activate_kit(){
    var url= 'dashboard/activaciones';
    location.href = site+url;
}
function delete_activate(customer_course_id, course_id, customer_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar la activación?",
    buttons: {
        confirm: {
            label: 'Confirmar',
            className: 'btn-success'
        },
        cancel: {
            label: 'Cerrar',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result == true){
            $.ajax({
                   type: "post",
                   url: site+"dashboard/activaciones/delete",
                   dataType: "json",
                   data: {customer_course_id : customer_course_id,
                          course_id : course_id,
                          customer_id : customer_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
    });
}




function active(){
    var customer_id = document.getElementById("customer_id").value;
    var course_id = document.getElementById("course_id").value;
    
    if(customer_id == ""){
        var texto = "";
        texto = texto+'<div class="alert alert-danger">';
        texto = texto+'<p style="text-align: center;">Cliente no encontrado</p>';
        texto = texto+'</div>';                 
        $("#message").html(texto);
        $("#username").focus();
    }else if(course_id == ""){
        var texto = "";
        texto = texto+'<div class="alert alert-danger">';
        texto = texto+'<p style="text-align: center;">Seleccione un Curso</p>';
        texto = texto+'</div>';                 
        $("#message").html(texto);
        $("#course_id").focus();
    }else{
            bootbox.confirm({
                message: "Confirma que desea activar al Cliente?",
                buttons: {
                    confirm: {
                        label: 'Confirmar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cerrar',
                        className: 'btn-danger'
                    }
                },
                callback: function () {
                     $.ajax({
                               type: "post",
                               url: site+"dashboard/activaciones/active",
                               dataType: "json",
                               data: {customer_id : customer_id,
                                      course_id : course_id},
                               success:function(data){ 
                                   if(data.status == "true"){
                                        var texto = "";
                                        texto = texto+'<div class="alert alert-success">';
                                        texto = texto+'<p style="text-align: center;">Activado Éxitosamente</p>';
                                        texto = texto+'</div>';                 
                                        $("#message").html(texto);
                                        location.href = site + "dashboard/activaciones";
                                   }else{
                                        var texto = "";
                                        texto = texto+'<div class="alert alert-danger">';
                                        texto = texto+'<p style="text-align: center;">Hubo un error</p>';
                                        texto = texto+'</div>';                 
                                        $("#message").html(texto);
                                   }
                                   
                               }         
                       });
                }
            });
    }
    
    
}
function validate_user(username){
    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "dashboard/activaciones/validate_user",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
                var inputCustomer_id = document.getElementById("customer_id");
                inputCustomer_id.value = data.customer_id;
                var inputCustomer = document.getElementById("customer");
                inputCustomer.value = data.name;
                var inputDni = document.getElementById("dni");
                inputDni.value = data.dni;
                var inputId = document.getElementById("id");
                inputId.value = data.customer_id;
            }else{
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
            }
        }            
        });
    }
}
    