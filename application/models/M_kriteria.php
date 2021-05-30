<?php
class M_kriteria extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'kriteria';
        $this->data['primary_key']    = 'kriteria_id';
    }
}
