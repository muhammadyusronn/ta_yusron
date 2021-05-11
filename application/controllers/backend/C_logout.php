<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_logout extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['token'] = $this->session->userdata('token');
        if (!isset($this->data['token'])) {
            $this->flashmsg('Anda harus login untuk mengakses halaman tersebut', 'warning');
            redirect('login');
            exit;
        }
    }
    public function proses_logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
