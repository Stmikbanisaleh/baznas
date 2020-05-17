<?php

class Model_trx_keluar extends CI_model
{
    public function view($table)
    {
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }

    public function dyn_query($query)
    {
        return  $this->db->query($query);
    }

    public function view_jenis_trx()
    {
        return  $this->db->query("SELECT
									jnstransaksi.JnsTransaksi,
									jnstransaksi.NamaTransaksi,
									jurnal.no_jurnal,
									jurnal.kode_jurnal,
									jurnal.nama_jurnal,
									(SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.JR AND z.`STATUS`=7)AS JR,
									(SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.type AND z.`STATUS`=8)AS type
									FROM
									jnstransaksi
									LEFT JOIN jurnal ON jnstransaksi.no_jurnal = jurnal.no_jurnal
                                    WHERE jnstransaksi.isdeleted != 1
                                    AND jurnal.isdeleted != 1
									Order by JnsTransaksi desc");
    }

    public function view_dk($status)
    {
        return  $this->db->query('SELECT*FROM msrev WHERE `STATUS`= '.$status.' AND isdeleted != 1');
    }

    public function view_transaksi()
    {
        return  $this->db->query("SELECT
										id,
										no_rek,
										DATE_FORMAT(Tgl_bukti,'%d-%m-%Y')Tgl_bukti,
										No_bukti,
										Ket,
										Nilai,
										DK,
										Jurnal
										FROM transaksi_buk	
								WHERE No_bukti NOT IN(SELECT
								akuntansi.bukti
								FROM akuntansi
								WHERE akuntansi.isdeleted != 1)
								AND isdeleted != 1 Order by id desc");
    }

    public function view_nopembytahun($tahun)
    {
        return  $this->db->query('SELECT EXTRACT(YEAR FROM tglentri) as tahun,DATE_FORMAT(tglentri, "%d/%m/%Y")AS tglentri,Nopembayaran FROM pembayaran_sekolah WHERE EXTRACT(YEAR FROM tglentri) = "'.$tahun.'"');
    }

    public function view_count($table, $field, $data_id)
    {
        return $this->db->query('select '.$field.' from ' . $table . ' where '.$field.' = "' . $data_id . '" and isdeleted != 1')->num_rows();
    }

    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
