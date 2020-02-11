function active(customer_id){
    bootbox.dialog("Confirma que desea marcar al cliente como calificado para el binario?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/clientes/active_customer",
               dataType: "json",
               data: {customer_id : customer_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}

function edit_customer(customer_id){    
     var url = 'dashboard/clientes/load/'+customer_id;
     location.href = site+url;   
}
function cancelar_customer(){
	var url= 'dashboard/clientes';
	location.href = site+url;
}
function delete_customer(customer_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar al cliente?",
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
                   url: site+"dashboard/clientes/delete",
                   dataType: "json",
                   data: {customer_id : customer_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}
