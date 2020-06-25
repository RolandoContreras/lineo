function boletin() {
    var email = document.getElementById("email").value;
    var email_2 = validar_email(email);
    if (email_2 == true) {
        $.ajax({
            type: "post",
            url: site + "home/boletin",
            dataType: "json",
            data: {email: email
            },
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Suscrito',
                        showConfirmButton: false,
                        footer: 'Te enviaremos las últimas noticias a tu email',
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups! Ocurrio un error',
                        footer: 'Inténtelo nuevamente'
                    });
                }
            }
        });
    } else {
         Swal.fire({
                              icon: 'error',
            title: 'E-mail Invalido',
        });
    }


}
function validar_email(email) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}