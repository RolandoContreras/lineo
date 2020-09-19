function recuperar() {
    document.getElementById("forget_boton").innerHTML = "Procesando...";
    var form = $('#forgetForm');
    $.ajax(
            {
                type: "POST",
                url: site + "forget/recuperar",
                data: form.serialize(),
                success: function (data)
                {
                    var data = JSON.parse(data);
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Mensaje Enviado',
                            text: 'Revise su bandeja de correo, que en breves minutos le llegará un mensaje con su contraseña',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout('document.location.reload()', 3000);
                    } else if (data.status == "false2") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Capcha no verificado',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        window.setTimeout(function () {
                            window.location = site + "iniciar-sesion";
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Usuario no registrado',
                            text: 'Verifique los datos'
                        });
                        document.getElementById("forget_boton").innerHTML = "RECUPERAR";
                    }
                }
            });

}