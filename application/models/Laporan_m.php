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
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('thn_bln', $thnbln);
        if ($mingguke != '0') {
            $this->db->where('minggu', $mingguke);
        }
        $this->db->order_by('id_transaksi', 'asc');
        $query = $this->db->get();

        // return $query->result();

        $data = array();
        foreach ($query->result() as $row) {
            $detail = $this->get_detail($row->id_transaksi);

            $data[] = [
                'id_transaksi' => $row->id_transaksi,
                'thn_bln' => $row->thn_bln,
                'minggu' => $row->minggu,
                'pengeluaran' => $row->pengeluaran,
                'tgl' => $row->tgl,
                'persentase_pengelola' => $row->persentase_pengelola,
                'persentase_petugas' => $row->persentase_petugas,
                'jumlah_pengelola' => $row->jumlah_pengelola,
                'jumlah_petugas' => $row->jumlah_petugas,
                'jumlah' => $row->jumlah,
                'jumlah_bersih' => $row->jumlah_bersih,

                'nama' => $detail['nama'],
                'kas_masuk' => $detail['kas_masuk'],
                'enter' => $detail['enter'],
            ];
        }

        return $data;
    }

    public function getThnBln()
    {
        $query = $this->db->query("SELECT * FROM thn_bln order by thn_bln asc");
        $data = array();

        foreach ($query->result() as $row) {
            $data[] = array(
                'id' => $row->id_thn_bln,
                'nama' => $row->thn_bln,
            );
        }

        return $data;
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
}
