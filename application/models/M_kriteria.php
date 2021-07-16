<?php
class M_kriteria extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']    = 'kriteria';
        $this->data['primary_key']    = 'kriteria_id';
    }

    public function get_kriteria()
    {
        $this->db->select('kriteria.*,MAX(penilaian.jawaban) as nilai_max');
        $this->db->from('kriteria');
        $this->db->join('penilaian', 'penilaian.kriteria_id=kriteria.kriteria_id');
        $this->db->group_by('kriteria.kriteria_id');
        return $this->db->get()->result_array();
    }
}
