<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
    var $table = 'tbl_transaksi';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables($thnbln, $mingguke)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('thn_bln', $thnbln)
            ->where('minggu', $mingguke)
            ->order_by('id_transaksi', 'asc')
            ->get();

        return $query->result();
    }

    public function getThnBln()
    {
        $query = $this->db->query("SELECT * FROM thn_bln");
        $data = array();

        foreach ($query->result() as $row) {
            $data[] = array(
                'id' => $row->id_thn_bln,
                'nama' => $row->thn_bln,
            );
        }

        return $data;
    }

}
