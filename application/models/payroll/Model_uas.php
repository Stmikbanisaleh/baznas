<?php

class Model_uas extends CI_model
{
    public function views($session)
    {
        return $this->db->query("SELECT * FROM tbguru WHERE IdGuru= '" . $session . "' and isdeleted != 1");
    }

    public function getmapel($session)
    {
        return $this->db->query("SELECT
        tbjadwal.id,
        msruang.RUANG,
        (SELECT z.nama FROM mspelajaran z WHERE z.id_mapel=tbjadwal.id_mapel)AS nama,
        (SELECT x.SINGKTBPS FROM tbps x WHERE x.KDTBPS = tbjadwal.ps)AS ps,
        tbjadwal.nmklstrjdk as kelas,
        tbjadwal.jam as jam,
        tbjadwal.hari as hari
        FROM
        tbjadwal join msruang on tbjadwal.id_ruang = msruang.ID
        WHERE
        tbjadwal.id_guru = '" . $session . "' and tbjadwal.isdeleted != 1 order by tbjadwal.id desc");
    }

    public function getuts($mapel)
    {
        return $this->db->query("SELECT
        tbjadwal.hari,
        tbjadwal.NMKLSTRJDK,
        tbjadwal.JAM,
        mssiswa.NMSISWA,
        trnilai.UTSTRNIL,
        trnilai.UASTRNIL,
        tbjadwal.id,
        tbkrs.id_krs,
        mssiswa.NOINDUK,
        tbjadwal.id_mapel,
        (trnilai.ID)AS idnilai
        FROM
        tbjadwal
        INNER JOIN tbkrs ON tbjadwal.id = tbkrs.id_jadwal
        INNER JOIN mssiswa ON tbkrs.NIS = mssiswa.NOINDUK
        LEFT JOIN trnilai ON tbkrs.NIS = trnilai.IDKRS
        WHERE
        tbjadwal.id = '" .$mapel. "'");
    }

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

    public function view_where_v2($table, $data)
    {
        return  $this->db->query('select * from tbguru a 
        left join tbagama b on a.GuruAgama = b.KDTBAGAMA
        left join mspendidikan c on a.GuruPendidikanAkhir = c.IDMSPENDIDIKAN
        left join tbps d on a.GuruBase = d.KDTBPS
        where a.isdeleted != 1 and a.id = ' . $data['id'] . '
        ');
    }

    public function view_guru()
    {
        return  $this->db->query('select * from tbguru a 
        left join tbagama b on a.GuruAgama = b.KDTBAGAMA
        left join mspendidikan c on a.GuruPendidikanAkhir = c.IDMSPENDIDIKAN
        left join tbps d on a.GuruBase = d.KDTBPS
        where a.isdeleted != 1
        ');
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
}
