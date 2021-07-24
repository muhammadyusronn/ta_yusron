<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_pegawai extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pegawai');
        $this->load->model('m_departement');
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
        $data['data_departement'] =  $this->m_departement->get();
        $this->render('backend/pegawai/pegawai-create', $data);
    }

    public function save()
    {

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'nip' => $this->post('nip'),
                'nama' => $this->post('nama'),
                'departement_id' => $this->post('departement_id'),
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

    public function edit()
    {
        $pegawai_id = $this->uri->segment(3);
        $data['title'] = 'Create Pegawai';
        $data['data_departement'] =  $this->m_departement->get();
        $data['data_pegawai'] =  $this->m_pegawai->get("id_pegawai = $pegawai_id");
        $this->render('backend/pegawai/pegawai-update', $data);
    }

    public function update()
    {

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'nip' => $this->post('nip'),
                'nama' => $this->post('nama'),
                'departement_id' => $this->post('departement_id'),
                'kontak' => $this->post('kontak'),

            ];
            $this->db->trans_start();
            $insert = $this->m_pegawai->update($this->POST('id_pegawai'), $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('pegawai');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
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

    protected function rules()
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
                'field' => 'departement_id',
                'label' => 'Departement Pegawai ',
                'rules' => 'required'
            ),
            array(
                'field' => 'kontak',
                'label' => 'Kontak Pegawai',
                'rules' => 'required'
            ),
        );
        return $config;
    }
}
