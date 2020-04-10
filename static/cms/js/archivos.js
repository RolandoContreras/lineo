function back_videos(course_id){
	var url= 'dashboard/videos/'+course_id;
	location.href = site+url;
}
function new_archivos(course_id, video_id){
        var url = 'dashboard/videos/'+course_id+'/archivos/'+video_id+'/load';
	location.href = site+url;
}
function edit_archivos(course_id, video_id, archive_id){    
     var url = 'dashboard/videos/'+course_id+'/archivos/'+video_id+'/load/'+ archive_id;
     location.href = site+url;   
}
function cancel_archivos(video_id){
	var url= 'dashboard/archivos/'+video_id;
	location.href = site+url;
}
function delete_archivos(archive_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el archivo?",
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
                   url: site+"dashboard/archivos/delete",
                   dataType: "json",
                   data: {archive_id : archive_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
    });
}