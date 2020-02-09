function new_diseño(){    
     var url = 'dashboard/disenos/load';
     location.href = site+url;   
}
function edit_diseño(diseño_id){    
     var url = 'dashboard/disenos/load/'+diseño_id;
     location.href = site+url;   
}
function cancel_diseños(){
	var url= 'dashboard/disenos';
	location.href = site+url;
}
function delete_marca(diseño_id){
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
                   url: site+"dashboard/disenos/delete",
                   dataType: "json",
                   data: {diseño_id : diseño_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}
