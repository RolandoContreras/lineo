function imprimir(id){
        $.ajax({
            type: "post",
            url: site + "backoffice/certificados/imprimir",
            dataType: "json",
            data: {id: id},
            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("quantity_error").style.display = "none";
                    document.getElementById("quantity_success").style.display = "block";
                    location.reload();
                }
            }            
        });
}