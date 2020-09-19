function register() {
    document.getElementById("register_boton").innerHTML = "Procesando...";
    var form = $('#register-form');
    $.ajax(
            {
                type: "POST",
                url: site + "register/validate",
                data: form.serialize(),
                success: function (data)
                {
                    var data = JSON.parse(data);
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Bienvenido',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        setTimeout('document.location.reload()', 1000);
                        window.setTimeout(function () {
                            window.location = site + "backoffice";
                        }, 1000);
                    } else if (data.status == "true2") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Bienvenido',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "backoffice/pay_order";
                        }, 1500);
                    } else if (data.status == "email") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'El Email ya fue registrado',
                            text: 'Ingrese un nuevo correo',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        document.getElementById("register_boton").innerHTML = "Registrar";
                    } else if (data.status == "false2") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Capcha no verificado',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        window.setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Usuario no registrado',
                            text: 'Verifique los datos'
                        });
                        document.getElementById("register_boton").innerHTML = "Registrar";
                    }
                }
            });

}
function validar_email(email) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}