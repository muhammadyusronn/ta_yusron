<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_home extends MY_Controller
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
        if ($this->data['token']['level'] != 'Admin') {
            redirect('404-error');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->render('backend/home', $data);
    }
}
