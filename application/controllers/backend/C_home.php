<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['token'] = $this->session->userdata('token');
        $this->load->model('m_user');
        $this->load->model('m_pegawai');
        $this->load->model('m_penilaian');
        $this->load->model('m_departement');
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
        $data['data_user'] = $this->m_user->get();
        $data['data_departement'] = $this->m_departement->get();
        $data['data_pegawai'] = $this->m_pegawai->get();
        $data['title'] = 'Dashboard';
        $this->render('backend/home', $data);
    }
}
