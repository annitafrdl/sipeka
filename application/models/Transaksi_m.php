<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{
    var $table = 'tbl_transaksi';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables($thnbln, $mingguke)
    {
        // $query = $this->db->select('*')
        //     ->from('tbl_transaksi_jenis a')
        //     ->join('tbl_transaksi b', 'b.id_transaksi = a.id_transaksi', 'left')
        //     ->join('jenis_kas c', 'c.id_jenis_kas = a.id_jenis_kas', 'left')
        //     ->where('thn_bln', $thnbln)
        //     // ->order_by('id_transaksi', 'desc')
        //     ->get();

        $query = $this->db->select('*')
            ->from($this->table)
            ->where('thn_bln', $thnbln)
            ->where('minggu', $mingguke)
            ->order_by('id_transaksi', 'asc')
            ->get();

        // print_r($this->db->last_query());

        return $query->result();
    }

    public function get_detail($id_transaksi)
    {
        // $query = $this->db->get_where('tbl_transaksi_jenis', ['id_transaksi' => $id_transaksi]);

        $query = $this->db->select('*')
            ->from('tbl_transaksi_jenis a')
            ->join('jenis_kas b', 'b.id_jenis_kas = a.id_jenis_kas', 'left')
            ->where('a.id_transaksi', $id_transaksi)
            ->order_by('id_transaksi', 'desc')
            ->get();

        $data = array();
        $nama = '';
        $kas_masuk = '';
        $enter = '';
        foreach ($query->result() as $row) {
            $nama .= $row->nama . '<br>';
            $kas_masuk .= 'Rp. ' . number_format($row->kas_masuk, 0, ',', '.') . '<br>';
            $enter .= '<br>';
        }

        $data['nama'] = $nama;
        $data['kas_masuk'] = $kas_masuk;
        $data['enter'] = $enter;
        return $data;
    }

    public function getList()
    {
        $query = $this->db->select('*')
            ->from('thn_bln')
            ->order_by('thn_bln', 'desc')
            ->get();

        return $query->result();
    }

    public function insert($data, $table = null)
    {
        $this->db->insert($table, $data);
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

    public function insert_trans($data)
    {
        $this->db->insert($this->table, $data);
        $r = $this->db->insert_id();

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil ditambahkan.';
            $this->insert_trans_detail($r);
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal ditambahkan.';
        }
        return $res;
    }

    public function insert_trans_detail($id)
    {
        $id_jenis_kas = $this->input->post('id_jenis_kas');
        $kas_masuk = $this->input->post('kas_masuk');

        $this->db->where('id_transaksi', $id);
        $this->db->delete('tbl_transaksi_jenis');

        foreach ($id_jenis_kas as $key => $val) {
            if ($kas_masuk[$key] != '' || $kas_masuk[$key] != 0) {
                $data = array(
                    'id_transaksi' => $id,
                    'id_jenis_kas' => $val,
                    'kas_masuk' => $kas_masuk[$key],
                );
                $r = $this->db->insert('tbl_transaksi_jenis', $data);
            }
        }

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil ditambahkan.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal ditambahkan.';
        }
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table)->where('id_transaksi', $id);
        return $this->db->get()->row();
    }

    public function update($where, $data)
    {
        $r = $this->db->update($this->table, $data, $where);

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil diupdate.';
            $this->insert_trans_detail($where['id_transaksi']);
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal diupdate.';
        }
        return $res;
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_transaksi', $id);
        $r = $this->db->delete($this->table);

        $this->db->where('id_transaksi', $id);
        $this->db->delete('tbl_transaksi_jenis');

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil dihapus.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal dihapus.';
        }

        return $res;
    }

    public function delete_by_id_thnbln($id)
    {
        $this->db->where('id_thn_bln', $id);
        $r = $this->db->delete('thn_bln');

        if ($r) {
            $res['status'] = '00';
            $res['mess'] = 'Data berhasil dihapus.';
        } else {
            $res['status'] = '01';
            $res['mess'] = 'Data gagal dihapus.';
        }

        return $res;
    }

    public function get_from_jenis_kas()
    {
        $query = $this->db->select('*')
            ->from('jenis_kas')
            ->order_by('id_jenis_kas', 'desc')
            ->get();

        return $query->result();
    }
}
