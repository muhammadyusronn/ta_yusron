<?php
class M_departement extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'departement';
        $this->data['primary_key']    = 'id_departement';
    }
}
