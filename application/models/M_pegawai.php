<?php
class M_pegawai extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'pegawai';
        $this->data['primary_key']    = 'id_pegawai';
    }
}
