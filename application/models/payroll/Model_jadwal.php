<?php

class Model_jadwal extends CI_model
{

    public function getjadwal($tahun, $programsekolah)
    {
        return $this->db->query("SELECT
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
        INNER JOIN msruang ON tbjadwal.ID_RUANG = msruang.ID
        INNER JOIN tbps ON tbjadwal.PS = tbps.KDTBPS
        WHERE tbjadwal.periode='$tahun' AND tbjadwal.PS='$programsekolah'
        ORDER BY hari");
    }

    public function view($table)
    {
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }

    public function view_custome()
    {
        return $this->db->query("SELECT DISTINCT 
        tbakadmk2.TAHUN FROM tbakadmk2 ORDER BY TAHUN DESC");
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

    public function getsekolah()
    {
        return  $this->db->query("SELECT a.id, a.KDTBPS, a.DESCRTBPS, a.SINGKTBPS, b.DESCRTBJS FROM tbps a JOIN tbjs b ON a.KDTBJS = b.KDTBJS");
    }
}
