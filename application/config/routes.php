<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'errors/error_404';

$route['home'] = 'home';
$route['home/boletin'] = 'home/boletin';
$route['contacto'] = 'contact';
$route['home/send_reclamacion'] = 'home/send_reclamacion';
$route['terminos-condiciones'] = 'home/term_condition';
$route['politica-privacidad'] = 'home/policy';
$route['libro-de-reclamaciones'] = 'home/reclamaciones';

$route['certificados'] = 'certificados';
$route['certificados/validate'] = 'certificados/validate';

$route['activar_curso'] = 'home/active_course';
$route['delete_cart'] = 'home/delete_cart';

$route['mensaje'] = 'home/mensaje';

$route['iniciar-sesion'] = 'login';
$route['recuperar-contrasena'] = 'forget';
$route['recuperar-contrasena'] = 'forget';

$route['cursos'] = 'courses';
$route['cursos/([0-9]+)'] = 'courses/index/$1';
$route['cursos/([0-9a-z_-]+)'] = 'courses/category/$1';
$route['cursos/([0-9a-z_-]+)/([0-9]+)'] = 'courses/category/$1';
$route['cursos/([0-9a-z_-]+)/([0-9a-z|&_-]+)'] = 'courses/detail/$1';
$route['cursos/([0-9a-z_-]+)/([0-9a-z|&_-]+)/resumen'] = 'courses/resumen/$1';

$route['registro'] = "register/index";
$route['registro/validate_username'] = "register/validate_username";
$route['registro/validate'] = "register/validate";

$route['compra'] = "home/pagar";

$route['backoffice'] = "b_home";

$route['backoffice/pay_order'] = "b_home/pay_order";
$route['backoffice/shopping'] = "b_home/order";
$route['backoffice/order/add_cart'] = 'b_home/add_cart';
$route['backoffice/order/delete_cart'] = 'b_home/delete_cart';
$route['backoffice/active_course'] = 'b_home/active_course';
$route['backoffice/miscursos'] = 'b_home/mis_cursos';

$route['backoffice/upload_perfil'] = "b_profile/upload";
$route['backoffice/certificados'] = "b_home/certificados";

$route['foro/([0-9a-z_-]+)/([0-9a-z_-]+)'] = "foro/detail/$1";

$route['backoffice/nuevo_foro'] = "b_foro";
$route['backoffice/nuevo_foro/editar/([0-9]+)'] = "b_foro/edit/$1";

$route['backoffice/b_foro/validate'] = "b_foro/validate";
$route['backoffice/b_foro/update_description'] = "b_foro/update_description";


$route['backoffice/soporte'] = "b_home/soporte";

$route['backoffice/certificados/download'] = "b_home/certificados_download";

$route['backoffice/perfil/update_data'] = "b_home/update_data";
$route['backoffice/perfil/change_pass'] = "b_home/change_pass";

$route['backoffice/cursos'] = "b_home/cursos";
$route['backoffice/perfil/upload'] = "b_home/upload";

$route['backoffice/([0-9]+)'] = 'b_home/index/$1';
$route['backoffice/cursos/categorias'] = 'b_home/category';

$route['backoffice/active_course'] = 'b_home/active_course';



//$route['backoffice/([0-9a-z_-]+)/([0-9]+)'] = 'b_home/category/$1';
//$route['backoffice/([0-9a-z_-]+)/([0-9a-z|&_-]+)'] = 'b_home/detail/$1';

$route['plataforma'] = "c_home";
$route['plataforma/send_message'] = "c_home/send_message";
$route['plataforma/([0-9]+)'] = 'c_home/index/$1';
$route['plataforma/([0-9a-z_-]+)'] = 'c_home/category/$1';
$route['plataforma/([0-9a-z_-]+)/([0-9]+)'] = 'c_home/category/$1';
$route['plataforma/([0-9a-z_-]+)/([0-9a-z|&_-]+)'] = 'c_home/detail/$1';
$route['plataforma/([0-9a-z_-]+)/([0-9a-z_|&-]+)/([0-9a-z|&_-]+)'] = 'c_home/detail/$1';

$route['backoffice/profile'] = "b_profile";
$route['backoffice/profile/update_password'] = "b_profile/update_password";

$route['backoffice/history'] = "b_finance";
$route['backoffice/invoice'] = "b_finance/invoice";
$route['backoffice/invoice/upload'] = "b_finance/upload";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";

$route['dashboard/categorias'] = "d_category";
$route['dashboard/categorias/load'] = "d_category/load";
$route['dashboard/categorias/load/([0-9]+)'] = "d_category/load/$1";
$route['dashboard/categorias/delete'] = "d_category/delete";

$route['dashboard/pendientes'] = "d_info";
$route['dashboard/pendientes/contestado'] = "d_info/contestado";
$route['dashboard/pendientes/no_contestado'] = "d_info/no_contestado";
$route['dashboard/pendientes/export'] = "d_info/export";

$route['dashboard/cursos'] = "d_courses";
$route['dashboard/cursos/load'] = "d_courses/load";
$route['dashboard/cursos/load/([0-9]+)'] = "d_courses/load/$1";
$route['dashboard/cursos/validate'] = "d_courses/validate";
$route['dashboard/cursos/delete'] = "d_courses/delete";

$route['dashboard/modulos/([0-9]+)'] = "d_modulos";
$route['dashboard/modulos/([0-9]+)/load'] = "d_modulos/load";
$route['dashboard/modulos/([0-9]+)/load/([0-9]+)'] = "d_modulos/load/$1";
$route['dashboard/modulos/([0-9]+)/validate'] = "d_modulos/validate";
$route['dashboard/modulos/delete'] = "d_modulos/delete";

$route['dashboard/videos/([0-9]+)'] = "d_videos";
$route['dashboard/videos/([0-9]+)/load'] = "d_videos/load";
$route['dashboard/videos/([0-9]+)/load/([0-9]+)'] = "d_videos/load/$1";
$route['dashboard/videos/([0-9]+)/validate'] = "d_videos/validate";
$route['dashboard/videos/delete'] = "d_videos/delete";
$route['dashboard/videos/verificar_curso'] = "d_videos/verificar_curso";

$route['dashboard/videos/([0-9]+)/archivos/([0-9]+)'] = "d_archivos";
$route['dashboard/videos/([0-9]+)/archivos/([0-9]+)/load'] = "d_archivos/load";
$route['dashboard/videos/([0-9]+)/archivos/([0-9]+)/load/([0-9]+)'] = "d_archivos/load/$1";
$route['dashboard/videos/([0-9]+)/archivos/([0-9]+)/validate'] = "d_archivos/validate";
$route['dashboard/archivos/delete'] = "d_archivos/delete";

$route['dashboard/facturas'] = "d_invoices"; 
$route['dashboard/facturas/load/([0-9]+)'] = "d_invoices/load/$1";
$route['dashboard/facturas/validate'] = "d_invoices/validate";
$route['dashboard/facturas/delete'] = "d_invoices/delete";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";
$route['dashboard/clientes/delete'] = "d_customer/delete";

$route['dashboard/crear_clientes'] = "d_crear_clientes";
$route['dashboard/crear_clientes/validate'] = "d_crear_clientes/validate";


$route['dashboard/preguntas'] = "d_preguntas";
$route['dashboard/preguntas/save'] = "d_preguntas/save";
$route['dashboard/preguntas/delete'] = "d_preguntas/delete";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";
$route['dashboard/usuarios/delete'] = "d_users/delete";

$route['dashboard/activaciones'] = "d_activate";
$route['dashboard/activaciones/load'] = "d_activate/load";
$route['dashboard/activaciones/load/([0-9]+)'] = "d_activate/load/$1";
$route['dashboard/activaciones/validate_user'] = "d_activate/validate_user";
$route['dashboard/activaciones/active'] = "d_activate/active";
$route['dashboard/activaciones/update_confirmation'] = "d_activate/update_confirmation";
$route['dashboard/activaciones/validate'] = "d_activate/validate";
$route['dashboard/activaciones/delete'] = "d_activate/delete";

$route['dashboard/reportes/asociados'] = "d_report_customer";
$route['dashboard/reportes/cuentas'] = "d_report_membership";
$route['dashboard/reportes/pagos'] = "d_report_pays";

$route['salir'] = "login/logout";




/* End of file routes.php */
/* Location: ./application/config/routes.php */