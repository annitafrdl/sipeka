<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    var $table = 'tbl_user';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables()
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->order_by('id_user', 'desc')
            ->get();

        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $r = $this->db->insert_id();

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil ditambahkan.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal ditambahkan.';
        }
        return $res;
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table)->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function update($where, $data)
    {
        $r = $this->db->update($this->table, $data, $where);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil diupdate.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal diupdate.';
        }
        return $res;
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_user', $id);
        $r = $this->db->delete($this->table);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil dihapus.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal dihapus.';
        }

        return $res;
    }
}
