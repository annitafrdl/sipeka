<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    var $table = 'tbl_transaksi';

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
        $data['totadmin'] = $this->db->get('tbl_user')->num_rows();

        $result = $this->models->get_datatables();

        // group by minggu
        $group = array();
        foreach ($result as $key => $value) {
            $group[$value['minggu']][] = $value;
        }
        $data['reports'] = $group;

        // templates
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('home_v', $data); // content
        $this->load->view('template/footer', $data);
    }
}
