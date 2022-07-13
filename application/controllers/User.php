<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m', 'models');

        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['module'] = 'user/';

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user_v', $data); // content
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
            $row[] = $dd->nik;
            $row[] = $dd->username;
            $row[] = $dd->alamat;
            $row[] = $dd->nohp;
            $row[] = $dd->status;
            $row[] = $dd->role;

            // add html for action
            $row[] = '<button class="btn btn-primary" title="Edit" onclick="edit(' . "'" . $dd->id_user . "'" . ')">Edit</button>
            <button class="btn btn-danger" title="Hapus" onclick="hapus(' . "'" . $dd->id_user . "'" . ')">Hapus</button>';

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'username' => $this->input->post('username'),
            'nohp' => $this->input->post('nohp'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
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
            'nik' => $this->input->post('nik'),
            'username' => $this->input->post('username'),
            'nohp' => $this->input->post('nohp'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
        );

        $result = $this->models->update(array('id_user' => $this->input->post('id')), $data);
        echo json_encode($result);
    }

    public function ajax_delete($id)
    {
        $result = $this->models->delete_by_id($id);
        echo json_encode($result);
    }
}
