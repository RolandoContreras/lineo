function new_testimony(){    
     var url = 'dashboard/testimonios/load';
     location.href = site+url;   
}
function edit_testimony(testimony_id){    
     var url = 'dashboard/testimonios/load/'+testimony_id;
     location.href = site+url;   
}
function cancel_testimony(){
	var url= 'dashboard/testimonios';
	location.href = site+url;
}
function delete_testimony(testimony_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el registro?",
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
                   url: site+"dashboard/testimonios/delete",
                   dataType: "json",
                   data: {testimony_id : testimony_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}