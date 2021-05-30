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
$route['jabatan']                        = 'backend/c_jabatan/index';
$route['create-jbt']                     = 'backend/c_jabatan/create';
$route['jabatan/save']                   = 'backend/c_jabatan/save';
$route['jabatan/destroy']                = 'backend/c_jabatan/destroy';
// Routes pegawai
$route['pegawai']                        = 'backend/c_pegawai/index';
$route['create-pgw']                     = 'backend/c_pegawai/create';
$route['pegawai/save']                   = 'backend/c_pegawai/save';
$route['pegawai/destroy']                = 'backend/c_pegawai/destroy';
// routes Jabatan
$route['kriteria']                        = 'backend/c_kriteria/index';
$route['create-krt']                      = 'backend/c_kriteria/create';
$route['kriteria/save']                   = 'backend/c_kriteria/save';
$route['kriteria/destroy']                = 'backend/c_kriteria/destroy';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
