function send_reclamacion() {
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var dni = document.getElementById("dni").value;
    var message = document.getElementById("message").value;
    $.ajax({
        type: "post",
        url: site + "home/send_reclamacion",
        dataType: "json",
        data: {name: name,
            last_name: last_name,
            dni: dni,
            message: message
        },
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Mensaje enviado',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site;
                }, 1500);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups! Ocurrio un error',
                    footer: 'Inténtelo nuevamente'
                });
            }
        }
    });
}