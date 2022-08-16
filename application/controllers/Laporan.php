<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $thnbln = $this->input->get('thnbln');
        $minggu = $this->input->get('minggu');

        $data['title'] = 'Laporan transaksi';
        $data['module'] = 'laporan/';

        $result = $this->models->get_datatables($thnbln, $minggu);

        // group by minggu
        $group = array();
        foreach ($result as $key => $value) {
            $group[$value['minggu']][] = $value;
        }
        $data['reports'] = $group;

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan_v', $data); // content
        $this->load->view('template/footer', $data);
    }

    public function ajax_list()
    {
        $thnbln = $this->input->post('thnbln');
        $mingguke = $this->input->post('mingguke');
        $list = $this->models->get_datatables($thnbln, $mingguke);
        // print_r($list);

        $data = array();
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();
            $detail = $this->models->get_detail($dd->id_transaksi);

            // $row[] = $no;
            $row[] = 'Ke ' . $dd->minggu;
            $row[] = date('d-m-Y', strtotime($dd->tgl));
            $row[] = $detail['nama'] . '<br>
                    Jumlah <br>' .
                'Pengelola <br>' .
                'Petugas <br>';

            $row[] = $detail['kas_masuk'] . '<br>' .
                '(Rp. ' . number_format($dd->jumlah, 0, ',', '.') . ')<br>' .
                '(Rp. ' . number_format($dd->jumlah_pengelola, 0, ',', '.') . ')<br>' .
                '(Rp. ' . number_format($dd->jumlah_petugas, 0, ',', '.') . ')<br>';


            $row[] = $detail['enter'] . '<br><br>' .
                $dd->persentase_pengelola . '% <br>' .
                $dd->persentase_petugas . '% <br>';


            $row[] = $dd->jumlah_pengelola;


            // $row[] = $dd->persentase_pengelola . ' %';
            // $row[] = $dd->persentase_petugas . ' %';
            // $row[] = 'Rp. ' . number_format($dd->jumlah, 0, ',', '.');

            // add html for action
            $row[] = '<button class="btn btn-primary" title="Edit" onclick="edit(' . "'" . $dd->id_transaksi . "'" . ')">Edit</button>
            <button class="btn btn-danger" title="Hapus" onclick="hapus(' . "'" . $dd->id_transaksi . "'" . ')">Hapus</button>';

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function getThnBln()
    {
        echo json_encode($this->models->getThnBln());
    }
}
