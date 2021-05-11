<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_pegawai extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pegawai');
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
        $data['title'] = 'Data Pegawai';
        $data['pegawai_data'] =  $this->m_pegawai->get_data();
        $this->render('backend/pegawai/pegawai-data', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Pegawai';
        $data['jabatan_data'] =  $this->m_jabatan->get();
        $this->render('backend/pegawai/pegawai-create', $data);
    }

    public function save()
    {
        $config = array(
            array(
                'field' => 'nip',
                'label' => 'NIP Pegawai',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama',
                'label' => 'Nama Pegawai',
                'rules' => 'required'
            ),
            array(
                'field' => 'jabatan',
                'label' => 'Jabatan Pegawai ',
                'rules' => 'required'
            ),
            array(
                'field' => 'kontak',
                'label' => 'Kontak Pegawai',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'nip' => $this->post('nip'),
                'nama' => $this->post('nama'),
                'jabatan' => $this->post('jabatan'),
                'kontak' => $this->post('kontak'),

            ];
            $this->db->trans_start();
            $insert = $this->m_pegawai->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('pegawai');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('pegawai');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_pegawai->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('pegawai');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('pegawai');
        }
    }
}
