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

$route['catalog'] = 'catalog';
$route['catalog/([0-9a-z_-]+)'] = 'catalog/detail';

$route['login'] = 'login';
$route['forget'] = 'forget';

$route['cursos'] = 'courses';
$route['courses/personal'] = 'courses/all';
$route['courses/profetional'] = 'courses/all';
$route['courses/finance'] = 'courses/all';
$route['courses/extras'] = 'courses/all';

$route['courses/extras/([0-9a-z_-]+)'] = 'courses/detail';
$route['courses/personal/([0-9a-z_-]+)'] = 'courses/detail';
$route['courses/profetional/([0-9a-z_-]+)'] = 'courses/detail';
$route['courses/finance/([0-9a-z_-]+)'] = 'courses/detail';


$route['register/([0-9a-z_-]+)'] = "register/index/$1";
$route['register/validate_username'] = "register/validate_username";
$route['register/validate'] = "register/validate";

$route['backoffice'] = "b_home";

$route['course'] = "c_home";
$route['course/forex/([0-9a-z_-]+)'] = "c_home/all";
$route['course/mkt/([0-9a-z_-]+)'] = "c_home/all";
$route['course/document'] = "c_home/document";
$route['course/profile'] = "c_home/profile";

$route['backoffice/profile'] = "b_profile";
$route['backoffice/profile/update_password'] = "b_profile/update_password";
$route['backoffice/profile/update_bank'] = "b_profile/update_bank";

$route['backoffice/plan'] = "b_plan";
$route['backoffice/plan/create_invoice'] = "b_plan/create_invoice";

$route['backoffice/referred'] = "b_network";
$route['backoffice/unilevel'] = "b_network/unilevel";
$route['backoffice/unilevel/([0-9a-z_A-Z-=+/]+)'] = "b_network/unilevel/unilevel/$1";

$route['backoffice/history'] = "b_finance";
$route['backoffice/invoice'] = "b_finance/invoice";
$route['backoffice/invoice/upload'] = "b_finance/upload";

$route['backoffice/files'] = "b_files";

$route['backoffice/carrera'] = "b_carrera";

$route['backoffice/pay'] = "b_pay";
$route['backoffice/pay/validate_amount'] = "b_pay/validate_amount";
$route['backoffice/pay/make_pay'] = "b_pay/make_pay";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";

$route['dashboard/categorias'] = "d_category";
$route['dashboard/categorias/load'] = "d_category/load";
$route['dashboard/categorias/load/([0-9]+)'] = "d_category/load/$1";
$route['dashboard/categorias/validate'] = "d_category/validate";

$route['dashboard/cursos'] = "d_courses";
$route['dashboard/cursos/load'] = "d_courses/load";
$route['dashboard/cursos/load/([0-9]+)'] = "d_courses/load/$1";
$route['dashboard/cursos/validate'] = "d_courses/validate";

$route['dashboard/videos'] = "d_videos";
$route['dashboard/videos/load'] = "d_videos/load";
$route['dashboard/videos/load/([0-9]+)'] = "d_videos/load/$1";
$route['dashboard/videos/validate'] = "d_videos/validate";

$route['dashboard/facturas'] = "d_invoices"; 
$route['dashboard/facturas/load/([0-9]+)'] = "d_invoices/load/$1";
$route['dashboard/facturas/validate'] = "d_invoices/validate";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/financiados'] = "d_customer/financiados";
$route['dashboard/clientes/active_customer'] = "d_customer/active_customer";
$route['dashboard/clientes/no_active_customer'] = "d_customer/no_active_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";



$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";

$route['dashboard/reportes/asociados'] = "d_report_customer";
$route['dashboard/reportes/cuentas'] = "d_report_membership";
$route['dashboard/reportes/pagos'] = "d_report_pays";

$route['salir'] = "login/logout";




/* End of file routes.php */
/* Location: ./application/config/routes.php */