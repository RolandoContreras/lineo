function new_course(){    
     var url = 'dashboard/cursos/load';
     location.href = site+url;   
}
function edit_course(course_id){    
     var url = 'dashboard/cursos/load/'+course_id;
     location.href = site+url;   
}
function view_videos(course_id){    
     var url = 'dashboard/videos/'+course_id;
     location.href = site+url;   
}
function view_modulos(course_id){    
     var url = 'dashboard/modulos/'+course_id;
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
    callback: function (result) {
        if(result == true){
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
    }
    });
}
function crear_modulo(){
    var modulo = document.getElementById("modulo").value;
      if(modulo > 0){  
            var texto = "";
            var i = 0;               
            for (i = 0; i < modulo; i++) {
                n = i + 1;
              texto = texto+'<div class="input-group mb-3">';
              texto = texto+'<div class="input-group-prepend">';
              texto = texto+'<span class="input-group-text" id="basic-addon3">Módulo'+ n +'</span>';
              texto = texto+'</div>';
              texto = texto+'<input id="module_'+n+'" name="module_'+n+'" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Ingrese Nombre del Módulo">';
              texto = texto+'</div>';
              texto = texto+'<br/>';
            }
            $("#respose").html(texto);
        }
}


