<?php

class Model_tagihan extends CI_model
{

    public function view()
    {
        return  $this->db->query('SELECT a.*,b.DESCRTBAGAMA as agama,c.DESCRTBPS as ps FROM
         mssiswa a join tbagama b on a.AGAMA = b.KDTBAGAMA 
         join tbps c on a.PS = c.KDTBPS 

          where a.isdeleted != 1 ');
    }

    public function getnis($where)
    {
        $where = "WHERE NIS='".$where."' OR Noreg='".$where."'";
        return  $this->db->query("SELECT saldopembayaran_sekolah.idsaldo,
		saldopembayaran_sekolah.NIS,
		saldopembayaran_sekolah.Noreg,
		(SELECT z.NMSISWA FROM mssiswa z WHERE z.Noreg = saldopembayaran_sekolah.Noreg)AS nama,
		saldopembayaran_sekolah.Kdjnsbayar,
		saldopembayaran_sekolah.idtarif,
		saldopembayaran_sekolah.TotalTagihan,
        CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.TotalTagihan,2)) as TotalTagihan2,
		saldopembayaran_sekolah.Bayar,
        CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.Bayar,2)) as Bayar2,
		saldopembayaran_sekolah.Sisa,
        CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.Sisa,2)) as Sisa2,
		saldopembayaran_sekolah.TA,
		(SELECT zx.nama FROM tbkelas zx WHERE zx.id_kelas = saldopembayaran_sekolah.Kelas)AS Kelas,
		tbakadmk.THNAKAD
		FROM saldopembayaran_sekolah 
		INNER JOIN tbakadmk ON tbakadmk.ID = saldopembayaran_sekolah.TA ".$where."");
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
