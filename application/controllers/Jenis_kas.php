<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_kas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_kas_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Jenis Kas';
        $data['module'] = 'jenis_kas/';

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('jenis_kas_v', $data); // content
        $this->load->view('template/footer', $data);
    }

    public function ajax_list()
    {
        $list = $this->models->get_datatables();
        // print_r($list);

        $data = array();
        $no = 0;
        foreach ($list as $dd) {
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $dd->nama;

            // add html for action
            $row[] = '<button class="btn btn-primary" title="Edit" onclick="edit(' . "'" . $dd->id_jenis_kas . "'" . ')">Edit</button>
            <button class="btn btn-danger" title="Hapus" onclick="hapus(' . "'" . $dd->id_jenis_kas . "'" . ')">Hapus</button>';

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
        );

        $result = $this->models->insert($data);
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
            'nama' => $this->input->post('nama'),
        );

        $result = $this->models->update(array('id_jenis_kas' => $this->input->post('id')), $data);
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id($id);
        echo json_encode($result);
    }
}
