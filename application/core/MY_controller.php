<?php
class MY_Controller extends CI_Controller
{
    protected function sendingemail($to, $subject, $message)
    {
        $config = [
            'mailtype'   => 'text',
            'charset'    => 'iso-8859-1',
            'protocol'   => 'smptp',
            'smptp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user'  => 'testingemailcodeku@gmail.com',
            'smtp_pass'  => '123yusron,./',
            'smtp_port'  => 465

        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('testingemailcodeku@gmail.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $send = $this->email->send();
        if ($send) {
            echo 'success';
        } else {
            show_error($this->email->print_debugger());
        }
    }
    protected function arr_bulan($id)
    {
        $arrNamaBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
        return $arrNamaBulan[$id];
    }
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
