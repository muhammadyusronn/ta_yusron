<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_jabatan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jabatan');
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
        $data['title'] = 'Data Jabatan';
        $data['jabatan_data'] =  $this->m_jabatan->get();
        $this->render('backend/jabatan/jabatan-data', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Jabatan';
        $this->render('backend/jabatan/jabatan-create', $data);
    }

    public function save()
    {
        $config = array(
            array(
                'field' => 'namajabatan',
                'label' => 'Nama Jabatan',
                'rules' => 'required'
            ),
            array(
                'field' => 'deskripsijabatan',
                'label' => 'Deskripsi Jabatan',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'namajabatan' => $this->post('namajabatan'),
                'deskripsijabatan' => $this->post('deskripsijabatan'),

            ];
            $this->db->trans_start();
            $insert = $this->m_jabatan->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('jabatan');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('jabatan');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_jabatan->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('jabatan');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('jabatan');
        }
    }
}
