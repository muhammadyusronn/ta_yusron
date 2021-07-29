<?php
class C_404 extends MY_Controller
{
    public function index()
    {
        $this->load->view('backend/errors/404');
    }
}
