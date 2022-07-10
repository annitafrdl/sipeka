<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    var $table = 'tbl_user';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}
