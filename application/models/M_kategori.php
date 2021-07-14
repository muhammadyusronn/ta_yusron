<?php
class M_kategori extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'kategori';
        $this->data['primary_key']    = 'id_kategori';
    }
}
