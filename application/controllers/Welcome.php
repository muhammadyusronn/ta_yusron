<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Welcome extends MY_controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		// $this->load->view('welcome_message');
		$this->render('welcome_message', $data);
	}
}
