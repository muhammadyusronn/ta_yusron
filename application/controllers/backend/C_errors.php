<?php
class C_errors extends MY_Controller
{
    public function not_found()
    {
        $this->load->view('backend/errors/404');
    }
}
