<?php

class Model_siswa extends CI_model
{

    public function getta($ps)
    {
        // return  $this->db->query("SELECT  *,LEFT(tahunakademik.ThnAkademik,4)as thn FROM tahunakademik ORDER BY IdTA DESC"); --Last USe Remake By Dedi 29 Mar 2020
        return  $this->db->query("SELECT THNAKAD as ThnAkademik, ID,SEMESTER,TAHUN as thn, INDEK FROM tbakadmk2 WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk2) and KDSEKOLAH = '$ps'");
    }

    public function getsiswa($noreg, $ta, $sekolah)
    {
        if(empty($noreg)){
            $where = "WHERE thnmasuk ='".$ta."' Order by kodesekolah,Noreg desc";
        } else {
            $where = "WHERE thnmasuk ='".$ta."' AND kodesekolah='".$sekolah."' AND Noreg='".$noreg."' ";
        }
        return  $this->db->query("SELECT
        calon_siswa.Noreg,
        calon_siswa.Namacasis,
        (SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=calon_siswa.agama AND `STATUS`='4')AS agama,
        (SELECT z.DESCRTBPS FROM tbps z WHERE z.KDTBPS =calon_siswa.kodesekolah)AS kodesekolah,
        (SELECT (SELECT y.DESCRTBJS FROM tbjs y WHERE y.KDTBJS = z.KDTBJS) FROM tbps z WHERE z.KDTBPS=calon_siswa.kodesekolah) AS NamaJurusan,
        (SELECT (SELECT (SELECT y.nama FROM tbkelas y WHERE y.id_kelas=x.Kelas) FROM baginaikkelas x WHERE x.NIS=z.NOINDUK) FROM mssiswa z WHERE z.Noreg=calon_siswa.Noreg)AS Kelas,
        calon_siswa.AlamatRumah,
        calon_siswa.TelpRumah,
        calon_siswa.TelpHp
                FROM calon_siswa $where");
    }

    public function getsekolah($ThnAkademik)
    {
        return $this->db->query("SELECT
        tarif_berlaku.idtarif,
        kodesekolah,
        (SELECT z.DESCRTBPS FROM tbps z WHERE z.KDTBPS=tarif_berlaku.kodesekolah)AS sekolah,
        (SELECT (SELECT y.DESCRTBJS FROM tbjs y WHERE y.KDTBJS=z.KDTBJS) FROM tbps z WHERE z.KDTBPS=tarif_berlaku.kodesekolah)AS NamaJurusan,
        tarif_berlaku.Kodejnsbayar,
        tarif_berlaku.ThnMasuk,
        tarif_berlaku.Nominal,
        tarif_berlaku.TA,
        tarif_berlaku.tglentri,
        tarif_berlaku.userridd,
        tarif_berlaku.`status`
        FROM tarif_berlaku WHERE `status`='T' AND Kodejnsbayar='FRM' AND TA='$ThnAkademik'");
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function getpro()
    {
        return $this->db->query("SELECT DISTINCT KDTBPRO,PROPTBPRO	FROM tbpro GROUP BY PROPTBPRO ORDER BY KDTBPRO DESC");
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
}
