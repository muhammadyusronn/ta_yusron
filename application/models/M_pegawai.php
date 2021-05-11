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
        $this->db->join('jabatan', 'pegawai.jabatan = jabatan.id_jabatan');
        $query = $this->db->get()->result();
        return $query;
    }
}
