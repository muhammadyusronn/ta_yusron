<?php
class M_user extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'user';
        $this->data['primary_key']    = 'id_user';
    }
}
