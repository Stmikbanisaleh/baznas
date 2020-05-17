<?php

class Model_laporan extends CI_model
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

    public function view_count($table, $field, $data_id)
    {
        return $this->db->query('select '.$field.' from ' . $table . ' where '.$field.' = "' . $data_id . '" and isdeleted != 1')->num_rows();
    }

    public function view_byquery($query)
    {
        return  $this->db->query($query);
    }

    public function view_rekeninglist()
    {
        return  $this->db->query("SELECT
            transaksi_buk.No_bukti,
            DATE_FORMAT(Tgl_bukti,'%d-%m-%Y') AS tgl1,
            transaksi_buk.Tgl_bukti,
            transaksi_buk.no_rek,
            transaksi_buk.Ket,
            transaksi_buk.DK,
            sum(transaksi_buk.Nilai)as Nilai,
            jurnal.nama_jurnal,
            transaksi_buk.id,
            jurnal.JR
            FROM
            transaksi_buk
            INNER JOIN jurnal 
            ON transaksi_buk.no_rek = jurnal.kode_jurnal
            WHERE jurnal.JR =3
            AND jurnal.isdeleted != 1
            AND transaksi_buk.isdeleted != 1
            GROUP BY no_rek
            ORDER BY Tgl_bukti,no_rek");
    }

    public function view_rekeninglist4()
    {
        return  $this->db->query("SELECT
            transaksi_buk.No_bukti,
            DATE_FORMAT(Tgl_bukti,'%d-%m-%Y') AS tgl1,
            transaksi_buk.Tgl_bukti,
            transaksi_buk.no_rek,
            transaksi_buk.Ket,
            transaksi_buk.DK,
            sum(transaksi_buk.Nilai)as Nilai,
            jurnal.nama_jurnal,
            transaksi_buk.id,
            jurnal.JR
            FROM
            transaksi_buk
            INNER JOIN jurnal ON transaksi_buk.no_rek = jurnal.kode_jurnal
            WHERE jurnal.JR =4
            AND jurnal.isdeleted != 1
            AND transaksi_buk.isdeleted != 1
            GROUP BY no_rek
            ORDER BY Tgl_bukti,no_rek");
    }

    public function view_rekeninglist_dyn($jr)
    {
        return  $this->db->query("SELECT
            transaksi_buk.No_bukti,
            DATE_FORMAT(Tgl_bukti,'%d-%m-%Y') AS tgl1,
            transaksi_buk.Tgl_bukti,
            transaksi_buk.no_rek,
            transaksi_buk.Ket,
            transaksi_buk.DK,
            sum(transaksi_buk.Nilai)as Nilai,
            jurnal.nama_jurnal,
            transaksi_buk.id,
            jurnal.JR
            FROM
            transaksi_buk
            INNER JOIN jurnal ON transaksi_buk.no_rek = jurnal.kode_jurnal
            WHERE jurnal.JR = $jr
            AND jurnal.isdeleted != 1
            AND transaksi_buk.isdeleted != 1
            GROUP BY no_rek
            ORDER BY Tgl_bukti,no_rek");
    }

    public function view_rekeninglist_rbb()
    {
        return  $this->db->query("                SELECT
            transaksi_buk.No_bukti,
            DATE_FORMAT(Tgl_bukti,'%d-%m-%Y') AS tgl1,
            transaksi_buk.Tgl_bukti,
            transaksi_buk.no_rek,
            transaksi_buk.Ket,
            transaksi_buk.DK,
            sum(transaksi_buk.Nilai)as Nilai,
            jurnal.nama_jurnal,
            transaksi_buk.id,
            jurnal.JR
            FROM
            transaksi_buk
            INNER JOIN jurnal ON transaksi_buk.no_rek = jurnal.kode_jurnal
            WHERE jurnal.isdeleted != 1
            AND transaksi_buk.isdeleted != 1
            GROUP BY no_rek
            ORDER BY no_rek");
    }

    public function view_transaksibuk($id)
    {
        return  $this->db->query("SELECT 
            id,
            DK,
            Nilai FROM transaksi_buk where id='".$id."'");
    }

    public function view_parameter()
    {
        return  $this->db->query("SELECT
            jurnal.kode_jurnal,
            jurnal.nama_jurnal
            FROM
            parameter
            INNER JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal
            WHERE parameter.isdeleted != 1
            AND jurnal.kode_jurnal is NOT NULL");
    }

    public function view_nilatransbuk($tgl_awal, $tgl_akhir, $norek)
    {
        return  $this->db->query("SELECT sum(tb.Nilai) as ruladebet,tb.Tgl_bukti,tb.no_rek,tb.DK,j.JR
            FROM transaksi_buk tb
            JOIN jurnal j ON j.kode_jurnal = tb.no_rek
            WHERE tb.Tgl_bukti BETWEEN ".$tgl_awal." AND last_day('".$tgl_akhir."') 
            AND tgl_bukti != '0000-00-00'
            AND  tb.no_rek= ".$norek);
    }

    public function view_nilatransbukbes($tgl_awal, $tgl_akhir, $jurnal)
    {
        return  $this->db->query("SELECT
            transaksi_buk.No_bukti,
            DATE_FORMAT(Tgl_bukti,'%d-%m-%Y') AS tgl1,
            transaksi_buk.Tgl_bukti,
            transaksi_buk.no_rek,
            transaksi_buk.Ket,
            transaksi_buk.DK,
            transaksi_buk.Nilai,
            jurnal.nama_jurnal,
            transaksi_buk.id
            FROM
            transaksi_buk
            INNER JOIN jurnal ON transaksi_buk.no_rek = jurnal.kode_jurnal
            WHERE Tgl_bukti BETWEEN '".$tgl_awal."' AND last_day('".$tgl_akhir."') 
            AND jurnal.kode_jurnal='".$jurnal."'
            AND transaksi_buk.tgl_bukti != '0000-00-00'
            ORDER BY Tgl_bukti,no_rek");
    }

    public function nr_nilatransbuk($tgl_awal, $tgl_akhir, $norek)
    {
        return  $this->db->query("SELECT sum(tb.Nilai) as ruladebet,tb.Tgl_bukti,tb.no_rek,tb.DK,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti BETWEEN '".$tgl_awal."' AND last_day('".$tgl_akhir."') AND tb.no_rek= 1001 AND tgl_bukti != '0000-00-00' AND DK='D'");
    }

    public function get_jurnalbycode($kd_jurnal)
    {
        return  $this->db->query("SELECT
            jurnal.kode_jurnal,
            jurnal.nama_jurnal
            FROM
            parameter
            RIGHT JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal
            WHERE kode_jurnal='".$kd_jurnal."'");
    }

    public function get_saldoawalbukbes($tgl_awal, $tgl_akhir, $jurnal)
    {
        return  $this->db->query("SELECT
            SUM(Nilai)AS nml
            FROM
            transaksi_buk
            INNER JOIN jurnal ON transaksi_buk.no_rek = jurnal.kode_jurnal
            WHERE Tgl_bukti <'".$tgl_awal."' AND jurnal.kode_jurnal='".$jurnal."'");
    }

    public function get_transbuk($id)
    {
        return  $this->db->query("SELECT 
            id,
            DK,
            Nilai FROM transaksi_buk where id='".$id."'");
    }

    public function get_pemb_siswa($p_awal, $p_akhir)
    {
        return  $this->db->query("SELECT
            (SELECT z.DESCRTBPS FROM tbps z WHERE z.KDTBPS=pembayaran_sekolah.kodesekolah)AS kodesekolah,
                jenispembayaran.namajenisbayar,
                detail_bayar_sekolah.nominalbayar,
                pembayaran_sekolah.TA,
                (SELECT z.nama FROM tbkelas z WHERE z.id_kelas=pembayaran_sekolah.Kelas)AS Kelas,
                DATE_FORMAT(tglentri,'%d-%m-%Y')tglentri,pembayaran_sekolah.Nopembayaran
            FROM
                pembayaran_sekolah
                INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
                INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
                WHERE tglentri BETWEEN '$p_awal' AND '$p_akhir'
            ORDER BY UNIX_TIMESTAMP(tglentri) asc");
    }

}
