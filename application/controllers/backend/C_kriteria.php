<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_kriteria extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kriteria');
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
        $data['title'] = 'Data Kriteria';
        $tables = ['kategori'];
        $cond = ['kriteria.kategori_id = kategori.id_kategori'];
        $data['data_kriteria'] =  $this->m_kriteria->get_data_join($tables, $cond);
        $this->render('backend/kriteria/kriteria-data', $data);
    }

    public function create()
    {
        $data['data_kategori'] = $this->m_kategori->get_by_order('namakategori', 'ASC');
        $data['title'] = 'Create kriteria';
        $this->render('backend/kriteria/kriteria-create', $data);
    }

    public function save()
    {

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'kriteria_nama'  => $this->post('kriteria_nama'),
                'kriteria_bobot' => $this->post('kriteria_bobot'),
                'kriteria_sifat' => $this->post('kriteria_sifat'),
                'kategori_id'    => $this->post('kategori_id'),

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

    public function edit()
    {
        $kriteria_id = $this->uri->segment(3);
        $data['data_kriteria'] = $this->m_kriteria->get("kriteria_id = $kriteria_id");
        $data['data_kategori'] = $this->m_kategori->get_by_order('namakategori', 'ASC');
        $data['title'] = 'Update kriteria';
        $this->render('backend/kriteria/kriteria-update', $data);
    }

    public function update()
    {

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'kriteria_nama'  => $this->post('kriteria_nama'),
                'kriteria_bobot' => $this->post('kriteria_bobot'),
                'kriteria_sifat' => $this->post('kriteria_sifat'),
                'kategori_id'    => $this->post('kategori_id'),

            ];
            $this->db->trans_start();
            $insert = $this->m_kriteria->update($this->POST('kriteria_id'), $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('kriteria');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
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

    protected function rules()
    {
        $config = array(
            array(
                'field' => 'kriteria_nama',
                'label' => 'Nama kriteria',
                'rules' => 'required'
            ),
            array(
                'field' => 'kriteria_bobot',
                'label' => 'Bobot kriteria',
                'rules' => 'required'
            )
        );
        return $config;
    }
}
