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

    public function get_id_pegawai()
    {
        $this->db->select('id_pegawai');
        $this->db->from('pegawai');
        return $this->db->get()->result();
    }

    public function get_alt($cond = '')
    {
        $query = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai NOT IN
        (SELECT pegawai_id from penilaian WHERE periode_bulan=" . $cond['periode_bulan'] . " 
        AND periode_tahun=" . $cond['periode_tahun'] . ")");
        // $id_pegawai = $this->push_id();
        // $this->db->select('id_pegawai,nama');
        // $this->db->from('pegawai');
        // $this->db->join('penilaian', 'pegawai.id_pegawai = penilaian.pegawai_id');
        // $this->db->where_not_in('penilaian.pegawai_id', $id_pegawai);
        // $this->db->where($cond);
        // $this->db->order_by('nama', 'ASC');
        return $query->result();
    }

    public function push_id()
    {
        $id_pegawai = $this->get_id_pegawai();
        $pegawai = array();
        foreach ($id_pegawai as $i) {
            array_push($pegawai, $i->id_pegawai);
        };
        return $pegawai;
    }
}
