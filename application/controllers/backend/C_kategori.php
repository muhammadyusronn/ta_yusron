<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
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
        $data['title'] = 'Data Kategori';
        $data['data_kategori'] =  $this->m_kategori->get_by_order('namakategori', 'ASC');
        $this->render('backend/kategori/kategori-data', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Kategori';
        $this->render('backend/kategori/kategori-create', $data);
    }

    public function save()
    {
        $config = array(
            array(
                'field' => 'namakategori',
                'label' => 'Nama Kategori',
                'rules' => 'required'
            ),
            array(
                'field' => 'deskripsikategori',
                'label' => 'Deskripsi Kategori',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'namakategori'      => $this->post('namakategori'),
                'deskripsikategori' => $this->post('deskripsikategori'),

            ];
            $this->db->trans_start();
            $insert = $this->m_kategori->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('kategori');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('kategori');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_kategori->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('kategori');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('kategori');
        }
    }
}
