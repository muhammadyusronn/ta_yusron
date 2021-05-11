<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }
    public function register()
    {
        $data['title'] = 'Halaman Login';
        $this->renders('backend/register', $data);
    }
    public function proses_register()
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
            array(
                'field' => 'password',
                'label' => 'Password',
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
                'password' => password_hash($this->post('password'), PASSWORD_DEFAULT, $options),

            ];
            $this->db->trans_start();
            $insert = $this->m_user->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Registrasi Gagal', 'danger');
                redirect('login');
            } else {
                $this->flashmsg('Registrasi Berhasil', 'success');
                redirect('login');
            }
        }
    }
}
