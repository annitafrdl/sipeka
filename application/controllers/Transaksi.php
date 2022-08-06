<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Input Transaksi';
        $data['module'] = 'transaksi/';

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('transaksi_v', $data); // content
        $this->load->view('template/footer', $data);
    }

    public function getList()
    {
        $list = $this->models->getList();

        $no = 0;
        $row = '';
        foreach ($list as $dd) {
            $no++;

            $row .= '<a class="list-group-item list-group-item-action" id="' . $dd->thn_bln . '" data-toggle="list" onclick="getDatatable(' . "'" . $dd->thn_bln . "'" . ')" role="tab">' . $dd->thn_bln .
                ' <span class="badge badge-info badge-pill">1</span> <i class="fa fa-trash text-danger ml-5" onclick="hapus_data(' . "'" . $dd->id_thn_bln . "'" . ')"></i> 
                    </a>';
        }

        echo json_encode($row);
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

    public function ajax_add()
    {
        // echo $this->input->post('i_thn_bln');
        // exit;
        $data = array(
            'thn_bln' => $this->input->post('i_thn_bln'),
            'minggu' => $this->input->post('minggu'),
            'tgl' => $this->input->post('tgl'),
            'persentase_pengelola' => $this->input->post('persentase_pengelola'),
            'persentase_petugas' => $this->input->post('persentase_petugas'),
            'pengeluaran' => $this->input->post('pengeluaran'),
            'jumlah' => $this->input->post('jumlah'),
            'jumlah_pengelola' => $this->input->post('jumlah_pengelola'),
            'jumlah_petugas' => $this->input->post('jumlah_petugas'),
        );

        $result = $this->models->insert_trans($data);
        echo json_encode($result);
    }

    public function ajax_add_thnbln()
    {
        $data = array(
            'thn_bln' => $this->input->post('thn_bln'),
        );

        $result = $this->models->insert($data, 'thn_bln');
        echo json_encode($result);
    }

    public function ajax_edit($id)
    {
        $data = $this->models->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $data = array(
            'thn_bln' => $this->input->post('i_thn_bln'),
            'minggu' => $this->input->post('minggu'),
            'tgl' => $this->input->post('tgl'),
            'persentase_pengelola' => $this->input->post('persentase_pengelola'),
            'persentase_petugas' => $this->input->post('persentase_petugas'),
            'pengeluaran' => $this->input->post('pengeluaran'),
            'jumlah' => $this->input->post('jumlah'),
            'jumlah_pengelola' => $this->input->post('jumlah_pengelola'),
            'jumlah_petugas' => $this->input->post('jumlah_petugas'),
        );

        $result = $this->models->update(array('id_transaksi' => $this->input->post('id')), $data);
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id($id);
        echo json_encode($result);
    }

    public function ajax_delete_thnbln($id)
    {
        $result = $this->models->delete_by_id_thnbln($id);
        echo json_encode($result);
    }

    public function get_from_jenis_kas()
    {
        $list = $this->models->get_from_jenis_kas();

        $data = '';
        foreach ($list as $dd) {

            $data .= '<input type="hidden" name="id_jenis_kas[]" value="' . $dd->id_jenis_kas . '">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kas_masuk"> Kas Masuk ' . $dd->nama . ' </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> Rp. </div>
                                    <input type="number" class="form-control jlh currency" name="kas_masuk[]" id="' . str_replace(' ', '_', strtolower($dd->nama)) . '">
                                </div>
                            </div>
                        </div>';
        }

        echo json_encode($data);
        // echo json_encode($list);
    }
}
