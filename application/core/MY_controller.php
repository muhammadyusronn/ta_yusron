<?php
class MY_Controller extends CI_Controller
{
    protected function POST($name)
    {
        return $this->input->post($name);
    }
    protected function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
    protected function __generate_random_string($length = 5)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    protected function render($view, $data = '')
    {
        $this->load->view('backend/layouts/head', $data);
        $this->load->view($view, $data);
        $this->load->view('backend/layouts/foot');
    }
    protected function renders($view, $data = '')
    {
        $this->load->view('backend/layouts/head-login', $data);
        $this->load->view($view, $data);
        $this->load->view('backend/layouts/foot-login');
    }
    protected function flashmsg($msg, $type = 'success', $name = 'msg')
    {
        return $this->session->set_flashdata($name, '<div class="alert alert-' . $type . ' alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    ' . $msg . '
                  </div>');
    }
}
