<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'TopControl/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'TopControl/login';
$route['logout'] = 'TopControl/logout';

$route['administrator/tentang'] = 'TopControl/tentang';
$route['tentang'] = 'TopControl/tentang';

$route['profile'] = 'TopControl/profile';
$route['timeline'] = 'TopControl/timeline';

$route['administrator/profile'] = 'Administrator/profile';
$route['administrator/timeline'] = 'Administrator/timeline';
$route['administrator/ganti-password'] = 'Administrator/ganti_password';
$route['administrator/search'] = 'AdministratorIb/search_surat';
$route['administrator/file'] = 'Administrator/file_p';

$route['administrator/ib'] = 'AdministratorIb';
$route['administrator/ib/hapus'] = 'AdministratorIb/hapus';
$route['administrator/ib/hapus_semua'] = 'AdministratorIb/hapus_semua';
$route['administrator/ib/(:num)/print'] = 'AdministratorIb/print_surat/$1';
$route['administrator/ib/tag/(:any)'] = 'AdministratorIb/tag/$1';
$route['administrator/ib/verifikasi_satu'] = 'AdministratorIb/verifikasi_satu';
$route['administrator/ib/verifikasi_dua'] = 'AdministratorIb/verifikasi_dua';
$route['administrator/ib/(:num)/(:any)'] = 'AdministratorIb/view/$1/$2';
$route['administrator/ib/(:num)/(:num)/(:any)'] = 'AdministratorIb/view_eizin/$1/$2/$3';

$route['administrator/sklk'] = 'AdministratorSklk';
$route['administrator/sklk/hapus'] = 'AdministratorSklk/hapus';
$route['administrator/sklk/hapus_semua'] = 'AdministratorSklk/hapus_semua';
$route['administrator/sklk/(:num)/print'] = 'AdministratorSklk/print_surat/$1';
$route['administrator/sklk/tag/(:any)'] = 'AdministratorSklk/tag/$1';
$route['administrator/sklk/verifikasi_satu'] = 'AdministratorSklk/verifikasi_satu';
$route['administrator/sklk/verifikasi_dua'] = 'AdministratorSklk/verifikasi_dua';
$route['administrator/sklk/(:num)/(:any)'] = 'AdministratorSklk/view/$1/$2';
$route['administrator/sklk/(:num)/(:num)/(:any)'] = 'AdministratorSklk/view_eizin/$1/$2/$3';

$route['administrator/dinas'] = 'Dinas';
$route['administrator/dinas/print'] = 'Dinas/printd';
$route['administrator/dinas/tambah'] = 'Dinas/tambah';
$route['administrator/dinas/hapus'] = 'Dinas/hapus';
$route['administrator/dinas/(:num)/edit'] = 'Dinas/edit/$1';
$route['administrator/dinas/tag/(:any)'] = 'Dinas/tag/$1';

$route['administrator/lampiran'] = 'Lampiran';
$route['administrator/lampiran/(:any)/tag'] = 'Lampiran/tag/$1';
$route['administrator/lampiran/tambah'] = 'Lampiran/tambah';
$route['administrator/lampiran/hapus'] = 'Lampiran/hapus';
$route['administrator/lampiran/(:num)/edit'] = 'Lampiran/edit/$1';

$route['ib/(:num)/view'] = 'Ib/view/$1';
$route['ib/hapus_data'] = 'Ib/hapus_data';
$route['ib/(:num)/input/(:num)'] = 'Ib/input/$1/$2';
$route['ib/(:num)/edit/(:num)'] = 'Ib/edit/$1/$2';
$route['ib/(:num)/hapus/(:num)'] = 'Ib/hapus/$1/$2';


$route['sklk/(:num)/view'] = 'Sklk/view/$1';
$route['sklk/hapus_data'] = 'sklk/hapus_data';
$route['sklk/(:num)/input/(:num)'] = 'Sklk/input/$1/$2';
$route['sklk/(:num)/edit/(:num)'] = 'Sklk/edit/$1/$2';
$route['sklk/(:num)/hapus/(:num)'] = 'Sklk/hapus/$1/$2';

$route['get_list_notif'] = 'TopControl/notif';
$route['get_rows_notif_delive'] = 'TopControl/notif_delive';
$route['notif_read'] = 'TopControl/notif_read';
$route['notif_clean'] = 'TopControl/notif_clean';
