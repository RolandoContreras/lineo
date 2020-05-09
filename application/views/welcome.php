<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Edukate Pro | Bienvenido</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/css/vendor/bootstrap/bootstrap.min.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/fonts/font-awesome-4.7.0/css/font-awesome.min.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/css/animate/animate.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/css/select2/select2.min.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/css/countdowntime/flipclock.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/css/util.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/welcome/css/main.css';?>">
        <!-- favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/welcome/img/logo/favicon/apple-touch-icon.png';?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/welcome/img/logo/favicon/favicon-32x32.png';?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/welcome/img/logo/favicon/favicon-16x16.png';?>">
        <link rel="manifest" href="<?php echo site_url().'static/welcome/img/logo/favicon/site.webmanifest';?>">
    </head>
    <body>
        <div class="bg-img1 size1 overlay1 p-b-35 p-l-15 p-r-15" style="background-image: url('<?php echo site_url().'static/page_front/images/bg_header.jpg';?>');">
            <div class="flex-col-c p-t-160 p-b-215 respon1">
                <div class="wrappic1">
                    <a href="<?php echo site_url();?>">
                        <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" width="400" alt="logo" >
                    </a>
                </div>
                <h3 class="l1-txt1 txt-center p-t-30 p-b-100">
                    Volvemos en 1 hora - U - LINEX
                </h3>
                <div class="cd100"></div>
            </div>

            <div class="flex-w flex-c-m p-b-35">
                <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5" target="_blank">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
        </div>
        <script src="<?php echo site_url().'static/welcome/js/vendor/jquery/jquery-3.2.1.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/bootstrap/popper.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/bootstrap/bootstrap.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/select2/select2.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/countdowntime/flipclock.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/countdowntime/moment.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/countdowntime/moment-timezone.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/countdowntime/moment-timezone-with-data.min.js';?>"></script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/countdowntime/countdowntime.js';?>"></script>
        <script>
            $('.cd100').countdown100({
            /*Set Endtime here*/
            /*Endtime must be > current time*/
            endtimeYear: 0,
            endtimeMonth: 0,
            endtimeDate: 0,
            endtimeHours: 1,
            endtimeMinutes: 0,
            endtimeSeconds: 0,
            timeZone: "" 
            // ex:  timeZone: "America/New_York"
            //go to " http://momentjs.com/timezone/ " to get timezone
            });
        </script>
        <script src="<?php echo site_url().'static/welcome/js/vendor/tilt/tilt.jquery.min.js';?>"></script>
        <script>
            $('.js-tilt').tilt({
            scale: 1.1
            })
        </script>
        <script src="<?php echo site_url().'assets/welcome/js/main.js';?>"></script>
        <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="b75fb0feba481a6d40e1b069-|49" defer=""></script>
    </body>
</html>