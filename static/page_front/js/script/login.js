function login() {
    document.getElementById("login_boton").innerHTML = "Procesando...";
    var form = $('#loginForm');
    $.ajax(
            {
                type: "POST",
                url: site + "login/validate",
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
                    } else if(data.status == "true2"){
                       Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Bienvenido',
                              showConfirmButton: false,
                              timer: 1500
                            });
                        window.setTimeout( function(){
                             window.location = site+"backoffice/pay_order";
                         }, 1500 );
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
                        document.getElementById("login_boton").innerHTML = "Iniciar Sesión";
                    }
                }
            });

}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
