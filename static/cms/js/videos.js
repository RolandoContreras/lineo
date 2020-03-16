function new_video(){
	var url= 'dashboard/videos/load';
	location.href = site+url;
}
function edit_video(video_id){    
     var url = 'dashboard/videos/load/'+video_id;
     location.href = site+url;   
}
function cancel_video(){
	var url= 'dashboard/videos';
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