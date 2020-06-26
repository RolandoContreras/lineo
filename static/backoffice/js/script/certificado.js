function download_certificado(id) {
    $.ajax({
        type: "post",
        url: site + "backoffice/certificados/download",
        dataType: "json",
        data: {id: id},
        success: function (data) {
            if (data.status == "true") {
                document.getElementById("quantity_error").style.display = "none";
                document.getElementById("quantity_success").style.display = "block";
                location.reload();
            }
        }
    });
}

function copy(id) {
    /* Get the text field */
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/
    /* Copy the text inside the text field */
    document.execCommand("copy");

    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Copiado',
        showConfirmButton: false,
        timer: 1500
    })
}