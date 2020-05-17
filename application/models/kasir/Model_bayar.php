<?php

class Model_bayar extends CI_model
{

    public function view_visi($table)
    {
        $this->db->where('jenis =', '1');
        return $this->db->get($table);
    }

    public function getsiswa($noreg){
        return $this->db->query("SELECT PS,NMSISWA FROM mssiswa WHERE NOINDUK = '".$noreg."'");
    }

    public function getsiswa2($ta,$ps){
        return $this->db->query("SELECT
                                tarif_berlaku.idtarif,
                                kodesekolah,
                                ThnMasuk,
                                (SELECT z.DESCRTBPS FROM tbps z WHERE z.KDTBPS =tarif_berlaku.kodesekolah)AS sekolah,
                                (SELECT z.namajenisbayar FROM jenispembayaran z WHERE z.Kodejnsbayar=tarif_berlaku.Kodejnsbayar)AS namajenisbayar,
                                tarif_berlaku.Kodejnsbayar,
                                tarif_berlaku.ThnMasuk,
                                tarif_berlaku.Nominal,
                                CONCAT('Rp. ',FORMAT(tarif_berlaku.Nominal,2)) Nominal2,
                                tarif_berlaku.TA,
                                tarif_berlaku.tglentri,
                                tarif_berlaku.userridd,
                                tarif_berlaku.`status`
                                FROM tarif_berlaku 
                                WHERE `status`='T' AND TA='$ta' AND kodesekolah='$ps' AND isdeleted != 1 AND Kodejnsbayar NOT IN('SPP','GDG','KGT','FRM','SRG')");
    }

    public function getsiswa1($noreg){
        if(empty($noreg)){
            $v_cek = "WHERE detail_bayar_sekolah.kodejnsbayar NOT IN('SPP','GDG','KGT','FRM')";
        } else {
            $v_cek = "WHERE detail_bayar_sekolah.kodejnsbayar NOT IN('SPP','GDG','KGT','FRM') AND pembayaran_sekolah.NIS='$noreg' OR mssiswa.Noinduk='$noreg' AND detail_bayar_sekolah.kodejnsbayar NOT IN('SPP','GDG','KGT','FRM') ";
        }
        return $this->db->query("SELECT DISTINCT
                                mssiswa.NOINDUK,
                                pembayaran_sekolah.Noreg,
                                pembayaran_sekolah.Nopembayaran,
                                mssiswa.NMSISWA,
                                tbps.DESCRTBPS NamaSek,
                                CONCAT('Rp. ',FORMAT(tarif_berlaku.Nominal,2)) AS Nominal2,
                                tarif_berlaku.Nominal,
                                pembayaran_sekolah.TA,
                                tbkelas.nama,
                                jenispembayaran.namajenisbayar,
                                jenispembayaran.Kodejnsbayar,
                                detail_bayar_sekolah.kodejnsbayar,
                                CONCAT('Rp. ',FORMAT(SUM(pembayaran_sekolah.TotalBayar),2)) AS TotalBayar2,
                                SUM(pembayaran_sekolah.TotalBayar)AS TotalBayar
                                FROM
                                pembayaran_sekolah
                                INNER JOIN mssiswa ON mssiswa.Noreg = pembayaran_sekolah.Noreg
                                INNER JOIN tbps ON mssiswa.PS = tbps.KDTBPS
                                INNER JOIN tbkelas ON pembayaran_sekolah.Kelas = tbkelas.id_kelas
                                INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
                                INNER JOIN tarif_berlaku ON detail_bayar_sekolah.idtarif = tarif_berlaku.idtarif
                                INNER JOIN jenispembayaran ON jenispembayaran.Kodejnsbayar = tarif_berlaku.Kodejnsbayar $v_cek 
                                GROUP BY jenispembayaran.kodejnsbayar");
    }

    public function view($table)
    {
        $this->db->where('isdeleted !=' ,1);
        return $this->db->get($table);
    }

    public function view_misi($table)
    {
        $this->db->where('jenis =', '2');
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

    public function view_count($table, $data_id)
    {
        return $this->db->query('select IdGuru from ' . $table . ' where IdGuru = ' . $data_id . ' and isdeleted != 1')->num_rows();
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
