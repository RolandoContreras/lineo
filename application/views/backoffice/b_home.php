<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Listado</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Todos los Cursos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        ¿Qué curso estas buscando?
                                    </div>
                                    <div class="card-block">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                <form method="get" action="<?php echo site_url() . $url; ?>">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="search" id="search" placeholder="Buscar tu Curso">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-3">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar por Categoría</button>
                                                <div class="dropdown-menu">
                                                    <?php 
                                                    foreach ($obj_category_videos as $value) { ?>
                                                        <a class="dropdown-item" href="<?php echo site_url()."backoffice/$value->slug";?>"><?php echo $value->name;?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo $category_name; ?></h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="grid">
                                            <?php foreach ($obj_courses as $value) { ?>
                                            <a href="<?php echo site_url() . "backoffice/$value->category_slug/$value->slug"; ?>">
                                                <figure class="effect-lexi">
                                                        <img src="<?php echo site_url() . "static/cms/img/cursos/$value->img"; ?>" alt="<?php echo $value->name;?>">
                                                    <figcaption>
                                                        <p class="white"><?php echo $value->name;?><br/><br/>
                                                            <span class="button_cuentas">Ver Más <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                                        </p>
                                                    </figcaption>
                                                </figure>
                                            </a>    
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5"></div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                    <?php echo $obj_pagination; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    $(document).ready(function () {
        swal("Recibe hasta un 70% de descuento", "Mira todos los cursos que tenemos para ti. Apúrate que el momento de aprender es ahora.", "success");
    });
</script>
<script src="<?php echo site_url() . 'static/backoffice/js/sweetalert.min.js'; ?>"></script>      

