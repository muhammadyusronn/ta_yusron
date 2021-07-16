<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Welcome extends MY_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['token'] = $this->session->userdata('token');
		if (!isset($this->data['token'])) {
			$this->flashmsg('Anda harus login untuk mengakses halaman tersebut', 'warning');
			redirect('login');
			exit;
		}
	}
	public function index()
	{
		if ($this->data['token']['level'] == 'Admin') {
			redirect('dash');
		} else {
			redirect('evaluasi');
		}
	}
}
