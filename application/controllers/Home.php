<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['module'] = 'home/';

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('home_v', $data); // content
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
            $row[] = $dd->nama_jabatan;

            // add html for action

            $row[] = '<button type="button" class="btn btn-sm btn-primary" title="Edit" onclick="edit(' . "'" . $dd->id_jabatan . "'" . ')"><i class="bi bi-pencil-square"></i></button>
            <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="hapus(' . "'" . $dd->id_jabatan . "'" . ')"><i class="bi bi-trash-fill"></i></button>';

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan'),
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
            'nama_jabatan' => $this->input->post('nama_jabatan'),
        );

        $result = $this->models->update(array('id_jabatan' => $this->input->post('id')), $data);
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id($id);
        echo json_encode($result);
    }
}
