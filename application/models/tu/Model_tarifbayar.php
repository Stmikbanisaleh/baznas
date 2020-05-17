<?php

class Model_tarifbayar extends CI_model
{
    public function view1($table)
    {
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }
    public function view()
    {
        return  $this->db->query('SELECT a.*, b.id as id_jenisbayar, b.Kodejnsbayar, b.namajenisbayar ,c.DESCRTBPS, c.KDTBPS, d.TAHUN, d.THNAKAD FROM
        spem_tarif_berlaku a join spem_jenispembayaran b on a.Kodejnsbayar = b.Kodejnsbayar 
        join tbps c on a.kodesekolah = c.KDTBPS 
        join tbakadmk d on a.tahun = d.ID
        where a.isdeleted != 1 ');
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

    // public function view_count($table, $data_id)
    // {
    //     return $this->db->query("select RUANG from " . $table . " where RUANG = '" . $data_id['RUANG'] . "' and isdeleted != 1")->num_rows();
    // }

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
