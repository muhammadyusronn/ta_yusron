<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $token = $this->session->userdata('token');
        $this->load->model('m_user');
        if (isset($token)) {
            redirect('dash');
        }
    }
    public function index()
    {
        $data['title'] = 'Halaman Login';
        $this->renders('backend/login', $data);
    }

    public function proses_login()
    {
        $nip = $this->input->post('nip');
        $cek_user = $this->m_user->get(['nip' => $nip]);
        if (count($cek_user) == 0) {
            $this->flashmsg('Data tidak ditemukan', 'danger');
            redirect('login');
        } else {
            if ($cek_user[0]->level == 'Admin' || $cek_user[0]->level == 'Pimpinan') {
                if (password_verify($this->post('password'), $cek_user[0]->password)) {
                    $data = [
                        'nip'    =>    $nip,
                        'password'    => $cek_user[0]->password,    //ganti pake enkripsi baru
                    ];
                    $user = $this->m_user->get($data);
                    $this->dump($user);
                    if (count($user) == 1) {
                        $resource = [
                            'id_user'    => $user[0]->id_user,
                            'nip'        => $user[0]->nip,
                            'level'      => $user[0]->level,
                            'nama'       => $user[0]->nama,
                            'kontak'     => $user[0]->kontak
                        ];
                        $this->data['resess']     = $resource;
                        $this->data['message']     = 'Auth success';
                        $this->data['info']     = [
                            'status'     => 'ok',
                            'response'    => 200
                        ];
                        $update = $this->m_user->update($user[0]->id_user, ['last_login' => date("Y-m-d H:i:s")]);
                    } else {
                        $this->data['message']     = 'Wrong username or password';
                        $this->data['info']     = [
                            'status'    => 'fail',
                            'response'    => 502
                        ];
                        $this->flashmsg($this->data['message'], 'danger');
                        redirect('login');
                    }
                } else {
                    $this->data['message']     = 'Wrong username or password';
                    $this->data['info']     = [
                        'status'    => 'fail',
                        'response'    => 502
                    ];
                    $this->flashmsg($this->data['message'], 'danger');
                    redirect('login');
                }
                if ($this->data['info']['status'] == 'ok') {
                    $this->flashmsg($this->data['message'], 'success');
                    $this->session->set_userdata(['token' => $this->data['resess']]);
                    redirect('dash');
                } else {
                    $this->flashmsg($this->data['message'], 'danger');
                }
            } else {
                $this->flashmsg('Forbidden Access', 'danger');
            }
        }
    }
}
