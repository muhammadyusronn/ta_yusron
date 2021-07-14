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
$route['user/destroy']                    = 'backend/c_user/destroy';
// routes Jabatan
$route['kategori']                        = 'backend/c_kategori/index';
$route['create-ktg']                      = 'backend/c_kategori/create';
$route['kategori/save']                   = 'backend/c_kategori/save';
$route['kategori/destroy']                = 'backend/c_kategori/destroy';
// Routes Departement
$route['departement']                    = 'backend/c_departement/index';
$route['create-dpt']                     = 'backend/c_departement/create';
$route['departement/save']               = 'backend/c_departement/save';

// Routes pegawai
$route['pegawai']                        = 'backend/c_pegawai/index';
$route['create-pgw']                     = 'backend/c_pegawai/create';
$route['pegawai/save']                   = 'backend/c_pegawai/save';
$route['pegawai/destroy']                = 'backend/c_pegawai/destroy';
// routes Kriteria
$route['kriteria']                        = 'backend/c_kriteria/index';
$route['create-krt']                      = 'backend/c_kriteria/create';
$route['kriteria/save']                   = 'backend/c_kriteria/save';
$route['kriteria/destroy']                = 'backend/c_kriteria/destroy';
// routes evaluasi
$route['evaluasi']                        = 'backend/c_evaluasi/index';
$route['evaluasi/save']                   = 'backend/c_evaluasi/save';
$route['evaluasi/destroy']                = 'backend/c_evaluasi/destroy';

// Errors Handling
$route['404-error'] = 'backend/c_errors/not_found';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
