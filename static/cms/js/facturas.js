function edit_invoices(invoice_id){    
     var url = 'dashboard/facturas/load/'+invoice_id;
     location.href = site+url;   
}
function cancel_invoices(){
	var url= 'dashboard/facturas';
	location.href = site+url;
}
function delete_invoices(invoice_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar la factura?",
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
                   url: site+"dashboard/facturas/delete",
                   dataType: "json",
                   data: {invoice_id : invoice_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
        }
    }
    });
}
