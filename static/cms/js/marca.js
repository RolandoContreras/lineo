function new_marca(){    
     var url = 'dashboard/marcas/load';
     location.href = site+url;   
}
function edit_marca(marca_id){    
     var url = 'dashboard/marcas/load/'+marca_id;
     location.href = site+url;   
}
function cancel_marca(){
	var url= 'dashboard/marcas';
	location.href = site+url;
}
function delete_marca(marca_id){
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
                   url: site+"dashboard/marcas/delete",
                   dataType: "json",
                   data: {marca_id : marca_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}
