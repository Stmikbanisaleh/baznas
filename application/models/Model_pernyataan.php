<?php

class Model_pernyataan extends CI_model
{

    public function view($periode,$ps)
    {
        return  $this->db->query("select * from tbjadwal a 
        left join tbguru b on a.id_guru = b.idGuru
        join mspelajaran c on a.id_mapel = c.id_mapel
        join msruang d on a.id_ruang = d.ID
        join tbps e on a.ps = e.KDTBPS where a.periode = " .$periode ." and a.ps = ".$ps." 
        ");
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function gettahun()
    {
        return  $this->db->query('select distinct TAHUN from tbakadmk where isdeleted != 1 ORDER BY TAHUN DESC ');
    }

    public function getguru()
    {
        return  $this->db->query('select * from tbguru where isdeleted != 1 ORDER BY id DESC ');
    }

    public function getsemester()
    {
        return  $this->db->query('select distinct SEMESTER from tbakadmk where isdeleted != 1 ORDER BY SEMESTER DESC ');
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
        WHERE tbjadwal.periode= ".$periode ." AND tbjadwal.PS= ". $programsekolah."
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
