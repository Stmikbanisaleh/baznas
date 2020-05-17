<?php

class Model_rekening extends CI_model
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

    public function view_rekening()
    {
        return  $this->db->query('SELECT
                                    jur.no_jurnal,
                                    jur.kode_jurnal,
                                    jur.nama_jurnal,
                                    (SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jur.JR AND z.`STATUS`=7)AS JR,
                                    (SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jur.type AND z.`STATUS`=8)AS type,
                                    jur.kurs,
                                    jur.rek_konsol,
                                    jur.UserId,
                                    jur.TglInput
                                FROM jurnal jur
                                WHERE jur.isDeleted != 1
                                Order by jur.no_jurnal desc');
    }

    public function view_count($table, $field, $data_id)
    {
        return $this->db->query('select '.$field.' from ' . $table . ' where '.$field.' = "' . $data_id . '" and isdeleted != 1')->num_rows();
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
