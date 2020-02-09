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
    callback: function () {
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
    });
}