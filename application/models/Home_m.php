<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    var $table = 'tbl_jabatan';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables()
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->order_by('id_jabatan', 'desc')
            ->get();

        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $r = $this->db->insert_id();

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data Jabatan berhasil ditambahkan.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data Jabatan gagal ditambahkan.';
        }
        return $res;
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table)->where('id_jabatan', $id);
        return $this->db->get()->row();
    }

    public function update($where, $data)
    {
        $r = $this->db->update($this->table, $data, $where);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data Jabatan berhasil diupdate.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data Jabatan gagal diupdate.';
        }
        return $res;
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_jabatan', $id);
        $r = $this->db->delete($this->table);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data Jabatan berhasil dihapus.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data Jabatan gagal dihapus.';
        }

        return $res;
    }
}
