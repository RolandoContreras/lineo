function save_preguntas(video_message_id){
    var respose = document.getElementById(video_message_id).value;
  bootbox.confirm({
    message: "Confirma que desea guardar la respuesta?",
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
                   url: site+"dashboard/preguntas/save",
                   dataType: "json",
                   data: {video_message_id : video_message_id,
                            respose:respose},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
});
}
function delete_preguntas(video_message_id){
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
                   url: site+"dashboard/preguntas/delete",
                   dataType: "json",
                   data: {video_message_id : video_message_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
    });
}
