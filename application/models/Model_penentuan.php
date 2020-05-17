<?php

class Model_penentuan extends CI_model
{

    public function getkelas($ThnAkademik, $jenis)
    {

        $v_thnmasuk = "WHERE thnmasuk='" . $ThnAkademik . "' AND kodesekolah='" . $jenis. "'";
        return  $this->db->query("SELECT*, (SELECT z.NAMA_REV FROM msrev z WHERE z.`STATUS`='4' AND z.KETERANGAN=mssiswa.AGAMA)AS v_agama,
         (SELECT z.NAMA_REV FROM msrev z WHERE z.`STATUS`='1' AND z.KETERANGAN= mssiswa.JK)AS v_Jk,
         (SELECT z.DESCRTBPS NamaSek FROM tbps z WHERE z.KDTBPS=mssiswa.PS)AS v_sekolah, DATE_FORMAT(TGLHR,'%d-%m-%Y')tgl_lahir, 
         (SELECT (SELECT Y.nama FROM tbkelas Y WHERE Y.id_kelas=z.Kelas) FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.Thnmasuk=mssiswa.TAHUN)AS Kelas,
         (SELECT (SELECT y.id_kelas FROM tbkelas y WHERE y.id_kelas=z.Kelas) FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.Thnmasuk=mssiswa.TAHUN) AS id_kelas,
         (SELECT (SELECT y.id_kelas - 1 FROM tbkelas y WHERE y.id_kelas=z.Kelas) FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.Thnmasuk=mssiswa.TAHUN) AS id_Kelas_turun,
         (SELECT (SELECT y.id_kelas + 1 FROM tbkelas y WHERE y.id_kelas=z.Kelas) FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.Thnmasuk=mssiswa.TAHUN) AS id_Kelas_naik,
         (SELECT (SELECT y.nama FROM tbkelas y WHERE y.id_kelas=z.Naikkelas) FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.Thnmasuk=mssiswa.TAHUN) AS Kelas_naik, 
         (SELECT z.Naikkelas FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.TA='".$ThnAkademik."')AS Naikkelas, (SELECT z.GolKelas FROM baginaikkelas z WHERE z.NIS=mssiswa.NOINDUK AND z.Thnmasuk='".$ThnAkademik."')AS GolKelas 
         FROM mssiswa WHERE TAHUN ='".$ThnAkademik."' AND ps='".$jenis."' Order by NOINDUK desc 
        ");
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }
    public function getjurusan()
    {
        return $this->db->query("SELECT a.id, a.KDTBPS KodeSek, a.DESCRTBPS NamaSek, a.SINGKTBPS, b.DESCRTBJS NamaJurusan FROM tbps a JOIN tbjs b ON a.KDTBJS = b.KDTBJS ORDER BY a.KDTBPS ASC");
    }

    public function gettahun()
    {
        return  $this->db->query('select distinct TAHUN from tbakadmk2 where isdeleted != 1 ORDER BY TAHUN DESC ');
    }

    public function getguru()
    {
        return  $this->db->query('select * from tbguru where isdeleted != 1 ORDER BY id DESC ');
    }

    public function getsemester()
    {
        return  $this->db->query('select distinct SEMESTER from tbakadmk where isdeleted != 1 ORDER BY SEMESTER DESC ');
    }

    public function getrev()
    {
        return  $this->db->query('SELECT*FROM msrev WHERE `STATUS`=10 AND isdeleted != 1');
    }

    public function getjadwal($periode, $programsekolah)
    {
        return  $this->db->query("SELECT
        tbguru.IdGuru,
        tbguru.GuruNama,
        tbjadwal.id_mapel,
        mspelajaran.nama,
        tbjadwal.hari,
        msruang.RUANG,
        tbjadwal.NMKLSTRJDK,
        tbjadwal.JAM,
        tbps.DESCRTBPS,
        tbjadwal.id
        FROM
        tbjadwal
        LEFT JOIN tbguru ON tbjadwal.id_guru = tbguru.IdGuru
        INNER JOIN mspelajaran ON tbjadwal.id_mapel = mspelajaran.id_mapel
        INNER JOIN msruang ON tbjadwal.id_ruang = msruang.ID
        INNER JOIN tbps ON tbjadwal.PS = tbps.KDTBPS
        WHERE tbjadwal.periode= " . $periode . " AND tbjadwal.PS= " . $programsekolah . "
        ORDER BY hari");
    }

    public function getps()
    {
        return  $this->db->query('SELECT DISTINCT 
        KDTBPS, DESCRTBPS,SINGKTBPS 
        FROM TBPS ORDER BY KDTBPS DESC ');
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
        return $this->db->query("select RUANG from " . $table . " where RUANG = '" . $data_id['RUANG'] . "' and isdeleted != 1")->num_rows();
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
