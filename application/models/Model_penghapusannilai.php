<?php

class Model_penghapusannilai extends CI_model
{

    public function view()
    {
        return  $this->db->query('select g.*, j.nama as nama_jabatan from guru g join jabatan j on g.jabatan = j.id where g.isdeleted != 1 ');
    }
    public function getpermataajar($tahun, $semester, $programsekolah){
        return $this->db->query("SELECT
         A.ID, A.IDKRS, A.IDJDK, A.NPMTRNIL, 
        (SELECT z.NMSISWA FROM mssiswa z WHERE z.NOINDUK= A.NPMTRNIL)AS nama_siswa,
        KDMKTRNIL, (SELECT z.nama FROM mspelajaran z WHERE z.id_mapel = A.KDMKTRNIL)AS nama_mapel, 
        SMTTRNIL, KLSTRNIL, UTSTRNIL, UASTRNIL, TGLUTSTRNIL, TGLUASTRNIL, USERUTSTRNIL, USERUASTRNIL, C.GuruNama 
        FROM trnilai A JOIN tbjadwal B ON A.IDJDK = B.id LEFT JOIN tbguru C ON B.id_guru = C.IdGuru JOIN mssiswa D ON A.NPMTRNIL = D.NOINDUK 
        WHERE B.periode = ". $tahun ." AND B.semester= '" .$semester. "' AND D.PS = '". $programsekolah ."'
        ORDER BY A.NPMTRNIL");
    }

    public function gettahun()
    {
        return  $this->db->query('select distinct TAHUN from tbakadmk where isdeleted != 1 ORDER BY TAHUN DESC ');
    }

    public function getsemester()
    {
        return  $this->db->query('select distinct SEMESTER from tbakadmk where isdeleted != 1 ORDER BY SEMESTER DESC ');
    }

    public function getps()
    {
        return  $this->db->query('SELECT DISTINCT 
        KDTBPS, DESCRTBPS,SINGKTBPS 
        FROM TBPS ORDER BY KDTBPS DESC ');
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
