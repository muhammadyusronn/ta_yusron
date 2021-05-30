<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_kriteria extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kriteria');
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
        $data['title'] = 'Data Kriteria';
        $data['kriteria_data'] =  $this->m_kriteria->get();
        $this->render('backend/kriteria/kriteria-data', $data);
    }

    public function create()
    {
        $data['title'] = 'Create kriteria';
        $this->render('backend/kriteria/kriteria-create', $data);
    }

    public function save()
    {
        $config = array(
            array(
                'field' => 'kriteria_nama',
                'label' => 'Nama kriteria',
                'rules' => 'required'
            ),
            array(
                'field' => 'kriteria_nilai',
                'label' => 'Nilai kriteria',
                'rules' => 'required'
            ),
            array(
                'field' => 'kriteria_bobot',
                'label' => 'Bobot kriteria',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'kriteria_nama' => $this->post('kriteria_nama'),
                'kriteria_nilai' => $this->post('kriteria_nilai'),
                'kriteria_bobot' => $this->post('kriteria_bobot'),
                'kriteria_sifat' => $this->post('kriteria_sifat'),

            ];
            $this->db->trans_start();
            $insert = $this->m_kriteria->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('kriteria');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('kriteria');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_kriteria->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('kriteria');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('kriteria');
        }
    }
}
