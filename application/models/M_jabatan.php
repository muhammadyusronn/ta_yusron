<?php
class M_jabatan extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'jabatan';
        $this->data['primary_key']    = 'id_jabatan';
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->join('departement', 'departement.id_departement = jabatan.departement_id');
        $query = $this->db->get()->result();
        return $query;
    }
}
