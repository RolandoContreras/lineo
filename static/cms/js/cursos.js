function new_course(){    
     var url = 'dashboard/cursos/load';
     location.href = site+url;   
}
function edit_course(course_id){    
     var url = 'dashboard/cursos/load/'+course_id;
     location.href = site+url;   
}
function cancel_course(){
	var url= 'dashboard/cursos';
	location.href = site+url;
}
function delete_course(course_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el Curso?",
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
                   url: site+"dashboard/cursos/delete",
                   dataType: "json",
                   data: {course_id : course_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}
