<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_evaluasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_departement');
        $this->load->model('m_pegawai');
        $this->load->model('m_kriteria');
        $this->load->model('m_penilaian');
        $this->data['token'] = $this->session->userdata('token');
        if (!isset($this->data['token'])) {
            $this->flashmsg('Anda harus login untuk mengakses halaman tersebut', 'warning');
            redirect('login');
            exit;
        }
        if ($this->data['token']['level'] != 'Penilai') {
            redirect('404-error');
        }
    }

    public function index()
    {
        $data['data_departement'] = $this->m_departement->get_by_order('namadepartement', 'ASC');
        $data['data_pegawai'] = $this->m_pegawai->get_by_order('nama', 'ASC');
        $data['data_kriteria'] = $this->m_kriteria->get_data_join(['kategori'], ['kategori.id_kategori = kriteria.kategori_id']);
        $data['title'] = 'Evaluasi Kinerja';
        $this->render('backend/evaluasi/evaluasi', $data);
    }

    public function save()
    {
        for ($i = 0; $i < count($this->POST('jawaban')); $i++) {
            $data = [
                'periode_bulan' => $this->post('periode_bulan'),
                'periode_tahun' => $this->post('periode_tahun'),
                'pegawai_id' => $this->post('pegawai_id'),
                'kriteria_id' => $this->post('kriteria_id')[$i],
                'jawaban' => $this->post('jawaban')[$i],

            ];
            $this->db->trans_start();
            $insert = $this->m_penilaian->insert($data);
            $this->db->trans_complete();
        }
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal melakukan evaluasi', 'danger');
            redirect('evaluasi');
        } else {
            $this->flashmsg('Sukses melakukan evaluasi', 'success');
            redirect('evaluasi');
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->m_kriteria->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('kriteria');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('kriteria');
        }
    }

    public function result()
    {
        $kriteria = $this->kriteria();
        $nilai = $this->nilai();
        $alternatif = $this->alternatif();
        $data_array = $this->data_array($alternatif, $kriteria, $nilai);

        $normalisasi = $this->normalisasi($alternatif, $kriteria, $data_array);
        $preferensi = $this->preferensi($alternatif, $kriteria, $normalisasi);
        @$sum_arr = $this->sum_arr($alternatif, $kriteria, $preferensi);
        $data['data_hasilpenilaian'] = $sum_arr;
        $data['data_pegawai'] = $this->m_pegawai->get_data();
        $data['title'] = 'Hasil Evaluasi Kinerja';
        $this->render('backend/evaluasi/evaluasi-hasil', $data);
    }

    private function kriteria()
    {
        return $this->m_kriteria->get_kriteria();
    }

    private function nilai()
    {
        return $this->m_penilaian->get_penilaian();
    }

    private function alternatif()
    {
        return $this->m_pegawai->get_alternatif();
    }

    private function data_array($alternatif, $kriteria, $nilai)
    {
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($kriteria); $j++) {
                foreach ($nilai as $n) {
                    if ($n['pegawai_id'] == $alternatif[$i]['id_pegawai'] && $n['kriteria_id'] == $kriteria[$j]['kriteria_id']) {
                        $data_array[$i][$j] = $n['jawaban'];
                    }
                }
            }
        }
        return $data_array;
    }

    private function normalisasi($alternatif, $kriteria, $data_array)
    {
        foreach ($alternatif as $i => $v) {
            foreach ($kriteria as $j => $k) {
                $normalisasi[$i][$j] = $data_array[$i][$j] / $k['nilai_max'];
            }
        }
        return $normalisasi;
    }

    private function preferensi($alternatif, $kriteria, $normalisasi)
    {
        foreach ($alternatif as $i => $v) {
            foreach ($kriteria as $j => $k) {
                $preferensi[$i][$j] =  $normalisasi[$i][$j] * ($k['kriteria_bobot'] / 100);
            }
        }
        return $preferensi;
    }

    private function sum_arr($alternatif, $kriteria, $preferensi)
    {
        foreach ($alternatif as $i => $v) {
            foreach ($kriteria as $j => $k) {
                $sum_arr[$i] +=  $preferensi[$i][$j];
            }
        }
        return $sum_arr;
    }
}
