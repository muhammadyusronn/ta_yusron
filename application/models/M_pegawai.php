<?php
class M_pegawai extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'pegawai';
        $this->data['primary_key']    = 'id_pegawai';
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('departement', 'pegawai.departement_id = departement.id_departement');
        $this->db->order_by('nip', 'ASC');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_alternatif()
    {
        $this->db->select('id_pegawai,nama');
        $this->db->from('pegawai');
        $this->db->order_by('nip', 'ASC');
        return $this->db->get()->result_array();
    }
}
