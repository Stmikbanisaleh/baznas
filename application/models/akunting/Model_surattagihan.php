<?php

class Model_surattagihan extends CI_model
{
	public function view($table)
    {
        $this->db->where('isdeleted !=', '1');
        return $this->db->get($table);
    }

	public function view_siswatg($nis, $kelas)
	{
		return $this->db->query("SELECT sp.nis,sp.Kelas,sp.sisa,s.nmsiswa,jk.nama kelas, sk.DESCRTBPS NamaSek, sp.Kelas FROM saldopembayaran_sekolah sp JOIN mssiswa s ON sp.NIS = s.NOINDUK JOIN tbkelas jk ON sp.Kelas = jk.id_kelas JOIN tbps sk ON s.PS = sk.KDTBPS WHERE sp.NIS = '$nis' AND sp.Kelas  = '$kelas'");
	}
}

?>