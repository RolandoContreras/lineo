function contestado(info_id){
  bootbox.confirm({
    message: "Confirma que desea marcarlo como contestado?",
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
                   url: site+"dashboard/pendientes/contestado",
                   dataType: "json",
                   data: {info_id : info_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
});
}
function no_contestado(info_id){
    bootbox.confirm({
    message: "Confirma que desea marcarlo como no contestado?",
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
                   url: site+"dashboard/pendientes/no_contestado",
                   dataType: "json",
                   data: {info_id : info_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
});
}

function export_info(){
    var url = 'dashboard/pendientes/export';
    location.href = site+url;   
}
