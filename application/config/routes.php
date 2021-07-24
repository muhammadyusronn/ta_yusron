<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Routes Auth
$route['register']                        = 'backend/c_auth/register';
$route['register/proses_registrasi']      = 'backend/c_auth/proses_register';
$route['login']                           = 'backend/c_login/index';
$route['logout']                          = 'backend/c_logout/proses_logout';
$route['login-auth']                      = 'backend/c_login/proses_login';

$route['dash']                            = 'backend/c_home/index';
$route['user']                            = 'backend/c_user/index';
$route['create-usr']                      = 'backend/c_user/create';
$route['user/save']                       = 'backend/c_user/save';
$route['user/edit/(:num)']                = 'backend/c_user/edit/$1';
$route['user/update']                     = 'backend/c_user/update';
// routes Jabatan
$route['kategori']                        = 'backend/c_kategori/index';
$route['create-ktg']                      = 'backend/c_kategori/create';
$route['kategori/save']                   = 'backend/c_kategori/save';
$route['kategori/edit/(:num)']            = 'backend/c_kategori/edit/$1';
$route['kategori/update']                 = 'backend/c_kategori/update';
// Routes Departement
$route['departement']                    = 'backend/c_departement/index';
$route['create-dpt']                     = 'backend/c_departement/create';
$route['departement/save']               = 'backend/c_departement/save';
$route['departement/edit/(:num)']        = 'backend/c_departement/edit/$1';
$route['departement/update']             = 'backend/c_departement/update';

// Routes pegawai
$route['pegawai']                        = 'backend/c_pegawai/index';
$route['create-pgw']                     = 'backend/c_pegawai/create';
$route['pegawai/save']                   = 'backend/c_pegawai/save';
$route['pegawai/edit/(:num)']             = 'backend/c_pegawai/edit/$1';
$route['pegawai/update']                 = 'backend/c_pegawai/update';

// routes Kriteria
$route['kriteria']                        = 'backend/c_kriteria/index';
$route['create-krt']                      = 'backend/c_kriteria/create';
$route['kriteria/save']                   = 'backend/c_kriteria/save';
$route['kriteria/edit/(:num)']            = 'backend/c_kriteria/edit/$1';
$route['kriteria/update']                 = 'backend/c_kriteria/update';
// routes evaluasi
$route['evaluasi']                        = 'backend/c_evaluasi/index';
$route['evaluasi/result']                 = 'backend/c_evaluasi/result';
$route['evaluasi/save']                   = 'backend/c_evaluasi/save';
$route['evaluasi/destroy']                = 'backend/c_evaluasi/destroy';
$route['evaluasi/broadcast']              = 'backend/c_evaluasi/broadcast';

// Errors Handling
$route['404-error'] = 'backend/c_errors/not_found';

$route['default_controller'] = 'welcome';
$route['404_override'] = 'backend/c_errors/not_found';
$route['translate_uri_dashes'] = FALSE;
