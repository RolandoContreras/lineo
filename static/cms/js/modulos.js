function back_cursos(){
	var url= 'dashboard/cursos';
	location.href = site+url;
}
function new_modulo(course_id){    
     var url = 'dashboard/modulos/'+course_id+'/load';
     location.href = site+url;   
}
function edit_modulo(course_id, module_id){    
     var url = 'dashboard/modulos/'+course_id+'/load/'+module_id;
     location.href = site+url;   
}

function cancel_modulos(course_id){    
     var url = 'dashboard/modulos/'+course_id;
     location.href = site+url;   
}
function delete_modulo(module_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el módulo?",
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
                   url: site+"dashboard/modulos/delete",
                   dataType: "json",
                   data: {module_id : module_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
    });
}

