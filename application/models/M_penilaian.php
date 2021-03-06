<?php
class M_penilaian extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'penilaian';
        $this->data['primary_key']    = 'id_penilaian';
    }

    // public function get_penilaian()
    // {
    //     $this->db->select('pegawai_id,kriteria_id,jawaban');
    //     $this->db->from('penilaian');
    //     return $this->db->get()->result_array();
    // }

    public function get_penilaian($cond = '')
    {
        if (is_array($cond)) {
            $this->db->select('pegawai_id,kriteria_id,jawaban');
            $this->db->from('penilaian');
            $this->db->where($cond);
        } else {
            $this->db->select('pegawai_id,kriteria_id,jawaban');
            $this->db->from('penilaian');
        }
        return $this->db->get()->result_array();
    }
}
