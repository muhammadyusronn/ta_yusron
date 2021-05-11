<?php
class M_jabatan extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'jabatan';
        $this->data['primary_key']    = 'id_jabatan';
    }
}
