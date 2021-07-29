<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_pengumuman extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_departement');
        $this->load->model('m_pegawai');
        $this->load->model('m_kriteria');
        $this->load->model('m_penilaian');
    }

    public function reports()
    {
        $current_month = date('m');
        $current_year = date('Y');
        $cond = [
            'periode_bulan' => $current_month,
            'periode_tahun' =>  $current_year
        ];
        $kriteria = $this->kriteria();
        $nilai = $this->nilai($cond);
        if (count($nilai) == 0) {
            $day = $this->POST('periode_bulan');
            if ($day > 9) {
                $days = $day;
            } else {
                $days = '0' . $day;
            }
            $data['message'] = 'Tidak ada evaluasi pada bulan ' . $this->arr_bulan($days) . ' tahun ' . $this->POST('periode_tahun');
            $data['title'] = 'Hasil Evaluasi Kinerja';
            $this->render('backend/evaluasi/evaluasi-notfound', $data);
        } else {
            $alternatif = $this->alternatif();
            $data_array = $this->data_array($alternatif, $kriteria, $nilai);

            $normalisasi = $this->normalisasi($alternatif, $kriteria, $data_array);
            $preferensi = $this->preferensi($alternatif, $kriteria, $normalisasi);
            @$sum_arr = $this->sum_arr($alternatif, $kriteria, $preferensi);
            $data['data_hasilpenilaian'] = $sum_arr;

            $data['data_pegawai'] = $this->m_pegawai->get_data();
            $bulan = $this->arr_bulan($current_month);
            $data['title'] = 'Hasil Evaluasi Kinerja ' . $bulan . ' Tahun ' . $current_year;
            $this->renderp('frontend/evaluasi/hasil-evaluasi', $data);
        }
    }

    private function kriteria()
    {
        return $this->m_kriteria->get_kriteria();
    }

    private function nilai($cond = '')
    {
        return $this->m_penilaian->get_penilaian($cond);
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
                $sum_arr[$i] +=  ($preferensi[$i][$j]);
            }
        }
        return $sum_arr;
    }
}
