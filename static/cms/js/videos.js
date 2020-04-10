function back_cursos(){
	var url= 'dashboard/cursos';
	location.href = site+url;
}
function view_archivos(course_id, video_id){   
     var url = 'dashboard/videos/'+course_id+'/archivos/'+video_id;
     location.href = site+url;   
}
function new_video(course_id){
	var url= 'dashboard/videos/'+course_id+'/load';
	location.href = site+url;
}
function edit_video(course_id, video_id){    
     var url = 'dashboard/videos/'+course_id+'/load/'+video_id;
     location.href = site+url;   
}
function cancel_video(course_id){
	var url= 'dashboard/videos/'+course_id;
	location.href = site+url;
}
function delete_video(video_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el vídeo?",
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
                   url: site+"dashboard/videos/delete",
                   dataType: "json",
                   data: {video_id : video_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
    });
}

function create_module(){
    var course_id = document.getElementById("course_id").value;
      if(course_id > 0){
            $.ajax({
                   type: "post",
                   url: site+"dashboard/videos/verificar_curso",
                   dataType: "json",
                   data: {course_id : course_id},
                   success:function(data){                             
                   obj_modules = data.obj_modules;
                            var texto = "";
                            texto = texto+'<option value="">Seleccionar Módulo</option>';
                            var x = 0;               
                            $.each(obj_modules, function(){
                                texto = texto+'<option value="'+obj_modules[x]['module_id']+'">'+obj_modules[x]['name']+'</option>';
                                x++; 
                            });
                    $("#module_id").html(texto);
                   }         
           });
        }
}

function crear_archivos(){
    var archive = document.getElementById("archive").value;
      if(archive > 0){  
            var texto = "";
            var i = 0;               
            for (i = 0; i < archive; i++) {
                n = i + 1;
              texto = texto+'<div class="input-group mb-3">';
              texto = texto+'<div class="input-group-prepend">';
              texto = texto+'<span class="input-group-text" id="basic-addon3">Archivo'+ n +'</span>';
              texto = texto+'</div>';
              texto = texto+'<input id="archive_'+n+'" name="archive_'+n+'" type="text" class="form-control" aria-describedby="basic-addon3" placeholder="Ingrese Nombre del Archivo">';
              texto = texto+'</div>';
              texto = texto+'<div class="input-group mb-3">';
              texto = texto+'<div class="input-group-prepend">';
              texto = texto+'<span class="input-group-text" id="basic-addon3"><i class="fa fa-file f-28 text-muted" aria-hidden="true"></i></span>';
              texto = texto+'</div>';
              texto = texto+'<input id="archive_link_'+n+'" name="archive_link_'+n+'" type="text" class="form-control" aria-describedby="basic-addon3" placeholder="Ingrese enlace del archivo">';
              texto = texto+'</div>';
              texto = texto+'<br/>';
              texto = texto+'<hr/>';
              texto = texto+'<br/>';
            }
            $("#respose_archive").html(texto);
        }else{
            var texto = "";
            $("#respose_archive").html(texto);
        }
}