<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_departement extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['title'] = 'Data Departement';
        $data['departement_data'] =  $this->m_departement->get();
        $this->render('backend/departement/departement-data', $data);
    }

    public function create()
    {
        $data['title'] = 'Create departement';
        $this->render('backend/departement/departement-create', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'namadepartement' => $this->post('namadepartement'),
                'deskripsidepartement' => $this->post('deskripsidepartement'),

            ];
            $this->db->trans_start();
            $insert = $this->m_departement->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('departement');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('departement');
            }
        }
    }

    public function edit()
    {
        $departement_id = $this->uri->segment(3);
        $data['data_departement'] = $this->m_departement->get("id_departement = $departement_id");
        $data['title'] = 'Update departement';
        $this->render('backend/departement/departement-update', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'namadepartement' => $this->post('namadepartement'),
                'deskripsidepartement' => $this->post('deskripsidepartement'),

            ];
            $this->db->trans_start();
            $insert = $this->m_departement->update($this->POST('id_departement'), $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('departement');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
                redirect('departement');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_departement->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('departement');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('departement');
        }
    }

    protected function rules()
    {
        $config = array(
            array(
                'field' => 'namadepartement',
                'label' => 'Nama departement',
                'rules' => 'required'
            ),
            array(
                'field' => 'deskripsidepartement',
                'label' => 'Deskripsi departement',
                'rules' => 'required'
            ),
        );
        return $config;
    }
}
