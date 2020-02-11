function new_users(){    
     var url = 'dashboard/usuarios/load';
     location.href = site+url;   
}
function edit_users(user_id){    
     var url = 'dashboard/usuarios/load/'+user_id;
     location.href = site+url;   
}
function cancelar_users(){
	var url= 'dashboard/usuarios';
	location.href = site+url;
}
function delete_users(user_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar al usuario?",
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
                   url: site+"dashboard/usuarios/delete",
                   dataType: "json",
                   data: {user_id : user_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}
