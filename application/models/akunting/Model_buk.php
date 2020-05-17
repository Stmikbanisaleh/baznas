<?php

class Model_buk extends CI_model
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

    public function dyn_query($query)
    {
        return  $this->db->query($query);
    }

    public function view_buk($cp)
    {
        return  $this->db->query("SELECT akuntansi.no_akuntansi, akuntansi.bukti, DATE_FORMAT(tgl,'%d-%m-%Y')tgl1, tgl, akuntansi.jurnal, akuntansi.tdebet, akuntansi.tkredit, akuntansi.urai, akuntansi.posting FROM akuntansi ".$cp." Order by no_akuntansi desc");
    }

    public function view_tahun()
    {
        return  $this->db->query('SELECT distinct EXTRACT(YEAR FROM tglentri) as tahun FROM pembayaran_sekolah ORDER BY tglentri DESC');
    }

    public function view_nopembytahun($tahun)
    {
        return  $this->db->query('SELECT EXTRACT(YEAR FROM tglentri) as tahun,DATE_FORMAT(tglentri, "%d/%m/%Y")AS tglentri,Nopembayaran FROM pembayaran_sekolah WHERE EXTRACT(YEAR FROM tglentri) = "'.$tahun.'"');
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
