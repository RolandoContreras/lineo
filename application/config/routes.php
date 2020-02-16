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
$route['contacto'] = 'contact';
$route['terminos-condiciones'] = 'home/term_condition';
$route['politica-privacidad'] = 'home/policy';

$route['login'] = 'login';
$route['forget'] = 'forget';

$route['cursos'] = 'courses';
$route['cursos/([0-9]+)'] = 'courses/index/$1';
$route['cursos/([0-9a-z_-]+)'] = 'courses/category/$1';
$route['cursos/([0-9a-z_-]+)/([0-9]+)'] = 'courses/category/$1';
$route['cursos/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'courses/detail/$1';

$route['registro'] = "register/index";
$route['registro/validate_username'] = "register/validate_username";
$route['registro/validate'] = "register/validate";

$route['backoffice'] = "b_home";

$route['backoffice/pay_order'] = "b_home/pay_order";
$route['backoffice/shopping'] = "b_home/order";
$route['backoffice/order/add_cart'] = 'b_home/add_cart';
$route['backoffice/order/delete_cart'] = 'b_home/delete_cart';



$route['backoffice/([0-9]+)'] = 'b_home/index/$1';
$route['backoffice/([0-9a-z_-]+)'] = 'b_home/category/$1';
$route['backoffice/([0-9a-z_-]+)/([0-9]+)'] = 'b_home/category/$1';
$route['backoffice/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'b_home/detail/$1';


$route['plataforma'] = "c_home";
$route['plataforma/([0-9]+)'] = 'c_home/index/$1';
$route['plataforma/([0-9a-z_-]+)'] = 'c_home/category/$1';
$route['plataforma/([0-9a-z_-]+)/([0-9]+)'] = 'c_home/category/$1';
$route['plataforma/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'c_home/detail/$1';


$route['backoffice/profile'] = "b_profile";
$route['backoffice/profile/update_password'] = "b_profile/update_password";
$route['backoffice/profile/update_bank'] = "b_profile/update_bank";

$route['backoffice/plan'] = "b_plan";
$route['backoffice/plan/create_invoice'] = "b_plan/create_invoice";

$route['backoffice/history'] = "b_finance";
$route['backoffice/invoice'] = "b_finance/invoice";
$route['backoffice/invoice/upload'] = "b_finance/upload";

$route['backoffice/files'] = "b_files";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";

$route['dashboard/categorias'] = "d_category";
$route['dashboard/categorias/load'] = "d_category/load";
$route['dashboard/categorias/load/([0-9]+)'] = "d_category/load/$1";
$route['dashboard/categorias/validate'] = "d_category/validate";
$route['dashboard/categorias/delete'] = "d_category/delete";

$route['dashboard/cursos'] = "d_courses";
$route['dashboard/cursos/load'] = "d_courses/load";
$route['dashboard/cursos/load/([0-9]+)'] = "d_courses/load/$1";
$route['dashboard/cursos/validate'] = "d_courses/validate";
$route['dashboard/cursos/delete'] = "d_courses/delete";

$route['dashboard/videos'] = "d_videos";
$route['dashboard/videos/load'] = "d_videos/load";
$route['dashboard/videos/load/([0-9]+)'] = "d_videos/load/$1";
$route['dashboard/videos/validate'] = "d_videos/validate";
$route['dashboard/videos/delete'] = "d_videos/delete";

$route['dashboard/facturas'] = "d_invoices"; 
$route['dashboard/facturas/load/([0-9]+)'] = "d_invoices/load/$1";
$route['dashboard/facturas/validate'] = "d_invoices/validate";
$route['dashboard/facturas/delete'] = "d_invoices/delete";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";
$route['dashboard/clientes/delete'] = "d_customer/delete";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";
$route['dashboard/usuarios/delete'] = "d_users/delete";

$route['dashboard/reportes/asociados'] = "d_report_customer";
$route['dashboard/reportes/cuentas'] = "d_report_membership";
$route['dashboard/reportes/pagos'] = "d_report_pays";

$route['salir'] = "login/logout";




/* End of file routes.php */
/* Location: ./application/config/routes.php */