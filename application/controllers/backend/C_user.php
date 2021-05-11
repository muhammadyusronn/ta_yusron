<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_user extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
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
        $data['title'] = 'Data User';
        $data['user_data'] =  $this->m_user->get();
        $this->render('backend/user/user-data', $data);
    }

    public function create()
    {
        $data['title'] = 'Create User';
        $this->render('backend/user/user-create', $data);
    }

    public function save()
    {
        $config = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ),
            array(
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required'
            ),
            array(
                'field' => 'kontak',
                'label' => 'Kontak',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $options = [
                'cost' => 10,
            ];
            $data = [
                'nip' => $this->post('nip'),
                'nama' => $this->post('nama'),
                'kontak' => $this->post('kontak'),
                'level' => $this->post('level'),
                'password' => password_hash($this->post('nip'), PASSWORD_DEFAULT, $options),

            ];
            $this->db->trans_start();
            $insert = $this->m_user->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('user');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('user');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_user->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('user');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('user');
        }
    }
}
