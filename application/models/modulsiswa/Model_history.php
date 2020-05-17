<?php

class Model_history extends CI_model
{
   
    public function view($nip)
    {
        return $this->db->query("SELECT
        pembayaran_sekolah.NIS,Noreg,
        (SELECT z.nama FROM tbkelas z WHERE z.id_kelas=pembayaran_sekolah.Kelas)AS Kelas,
        DATE_FORMAT(pembayaran_sekolah.tglentri,'%d-%m-%Y')tglentri,
        jenispembayaran.namajenisbayar,
        detail_bayar_sekolah.nominalbayar as nominalbayar,
        CONCAT('Rp. ',FORMAT(detail_bayar_sekolah.nominalbayar,2)) as nominalbayar2,
        CONCAT('Rp. ',FORMAT(tarif_berlaku.Nominal,2)) as Nominal2,
        tarif_berlaku.Nominal,
        (tarif_berlaku.Nominal- detail_bayar_sekolah.nominalbayar)AS sisa,
        CONCAT('Rp. ',FORMAT((tarif_berlaku.Nominal - detail_bayar_sekolah.nominalbayar),2)) as sisa2,
        (SELECT nama from tbpengawas where nip = pembayaran_sekolah.useridd) useridd,
        detail_bayar_sekolah.NodetailBayar,
        pembayaran_sekolah.TA
        FROM
        pembayaran_sekolah
        INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
        INNER JOIN tarif_berlaku ON detail_bayar_sekolah.idtarif = tarif_berlaku.idtarif
        INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
        WHERE jenispembayaran.Kodejnsbayar NOT IN('SPP') and pembayaran_sekolah.NIS='$nip'
        ORDER BY UNIX_TIMESTAMP(pembayaran_sekolah.tglentri) desc");
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

    public function view_count($table, $data_id)
    {
        return $this->db->query("select NOINDUK from " . $table . " where NOINDUK = '" . $data_id['NOINDUK'] . "' and isdeleted != 1")->num_rows();
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

    public function count_visit()
    {
        return $this->db->query("SELECT COUNT(st.id) visit FROM statistik st");
    }

    public function count_click()
    {
        return $this->db->query("SELECT SUM(st.hits) klik FROM statistik st");
    }

    public function count_guru()
    {
        return $this->db->query("SELECT COUNT(*) guru FROM tbguru tg");
    }

    public function count_siswa($th_akademik)
    {
        return $this->db->query("SELECT COUNT(DISTINCT NIS) pengguna FROM tbkrs WHERE periode=$th_akademik");
    }
}
