<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_m', 'models');
    }

    public function index()
    {
        // cek apakah sudah login atau belum
        if (!$this->session->userdata('id_user')) {
            $this->load->view('login_v');
        } else {
            redirect('home');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $ress = $this->models->login($username, $password);

        if ($ress) {
            // simpan ke session
            $this->session->set_userdata('id_user', $ress->id_user);
            $this->session->set_userdata('username', $ress->username);
            $this->session->set_userdata('nama', $ress->nama);
            $this->session->set_userdata('role', $ress->role);

            // redirect ke halaman dashboard
            redirect('home');
        } else {
            // set flash data message dengan notifikasi gagal
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            Oh noo! Login gagal. Silahkan coba lagi.
                        </div>
                    </div>'
            );
            // redirect ke halaman login
            redirect('auth');
        }
    }

    public function logout()
    {
        // hapus session
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');
        // redirect ke halaman login
        redirect('auth');
    }
}
