<?php

class Model_tarif extends CI_model
{

    public function view()
    {
        return  $this->db->query('select * from tarif where isdeleted != 1 ');
    }

    public function getdata()
    {
        return  $this->db->query("SELECT
                                    idtarif,
                                    kodesekolah,
                                    DESCRTBPS,
                                    DESCRTBJS,
                                    Kodejnsbayar,
                                    ThnMasuk,
                                    Nominal,
                                    TA,
                                    tglentri,
                                    tarif_berlaku.createdAt,
                                    status,
                                    (select tp.nama from tbpengawas tp where tp.nip = tarif_berlaku.userridd) userridd,
                                    CONCAT('Rp. ',FORMAT(Nominal,2)) as nominal_v
                                from tarif_berlaku join tbps on tarif_berlaku.kodesekolah = tbps.KDTBPS
                                join tbjs on tbps.KDTBJS = tbjs.KDTBJS
                                where tarif_berlaku.isdeleted != 1 order by idtarif desc");
    }

    public function getsekolah()
    {
        return  $this->db->query('SELECT
        tbps.KDTBPS,
        tbps.DESCRTBPS,
        tbjs.DESCRTBJS
        FROM
        tbps
        JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS where tbps.isdeleted !=1 
        ORDER BY KDTBPS DESC ');
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
        $this->db->where('isdeleted !=', 1);
        $this->db->where('tarif =', $data_id);
        $hasil = $this->db->get($table);
        return $hasil->num_rows();
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
