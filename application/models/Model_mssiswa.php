<?php

class Model_mssiswa extends CI_model
{

    public function getta($ps)
    {
        // return  $this->db->query("SELECT  *,LEFT(tahunakademik.ThnAkademik,4)as thn FROM tahunakademik ORDER BY IdTA DESC"); --Last USe Remake By Dedi 29 Mar 2020
        return  $this->db->query("SELECT THNAKAD as ThnAkademik, ID,SEMESTER,TAHUN as thn, INDEK FROM tbakadmk2 WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk2) and KDSEKOLAH = '$ps'");
    }

    public function getsiswa($noreg,$ps)
    {
        if(!empty($noreg)){
            $where = "WHERE PS = '".$ps."' and NOINDUK ='".$noreg."' or NOINDUK = '".$noreg."' Order by Noreg desc";
        } else {
            $where = "WHERE PS = '".$ps."' Order by Noreg desc";
        } 
        return  $this->db->query("SELECT mssiswa.*,tbagama.DESCRTBAGAMA,tbps.DESCRTBPS,tbjs.DESCRTBJS from mssiswa 
        join tbagama on mssiswa.agama = tbagama.KDTBAGAMA
        join tbps on mssiswa.PS = tbps.KDTBPS
        join tbjs on tbps.KDTBJS = tbjs.KDTBJS
        $where");
    }
    public function exportsiswa($PS)
    {
        return  $this->db->query("SELECT * FROM mssiswa where PS = $PS");
    }

    public function getsekolah()
    {
        return  $this->db->query("SELECT a.id, a.KDTBPS, a.DESCRTBPS, a.SINGKTBPS, b.DESCRTBJS FROM tbps a JOIN tbjs b ON a.KDTBJS = b.KDTBJS");
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
