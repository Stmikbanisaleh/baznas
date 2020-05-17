<?php 

class Model_kelulusan extends CI_model{

    public function view($table){
        return $this->db->get($table);
    }

    public function getsearch($tahun, $gangenap, $programsekolah){
        return  $this->db->query("SELECT
        rkpaktvsiswa.IDRKP,
        rkpaktvsiswa.NISRKP,
        rkpaktvsiswa.THNAKDRKP,
        rkpaktvsiswa.GANGENRKP,
        rkpaktvsiswa.SMTRKP,
        rkpaktvsiswa.STSRKP,
        rkpaktvsiswa.TANGGAL_KELUAR,
        mssiswa.NMSISWA,
        tbps.DESCRTBPS,
        mssiswa.STATUSCALONSISWA,
        mssiswa.NOREG
        FROM
        rkpaktvsiswa
        INNER JOIN mssiswa ON rkpaktvsiswa.NISRKP = mssiswa.NOINDUK
        INNER JOIN tbps ON mssiswa.PS = tbps.KDTBPS
        WHERE
        rkpaktvsiswa.STSRKP IN ('L') AND rkpaktvsiswa.THNAKDRKP='$tahun' AND rkpaktvsiswa.GANGENRKP='$gangenap' and mssiswa.PS = '$programsekolah' and rkpaktvsiswa.isdeleted !=1
        ");
    }

    public function get_sekjur(){
        return $this->db->query('SELECT
                                    DISTINCT ps.id,
                                    ps.DESCRTBPS sekolah,
                                    js.DESCRTBJS jurusan
                                from tbps ps
                                JOIN tbjs js on js.kdtbjs = ps.kdtbjs
                                JOIN mssiswa s on s.PS = ps.KDTBPS
                                WHERE ps.isdeleted != 1');
    }

    public function check_siswaaktif($kd_sekolah, $thn_masuk){
        return $this->db->query('SELECT s.NOINDUK, s.STATUSCALONSISWA, s.PS
                                FROM mssiswa s
                                where s.isdeleted !=1
                                AND s.STATUSCALONSISWA = 4
                                AND s.TAHUN = "'.$thn_masuk.'"
                                AND s.PS = "'.$kd_sekolah.'"');
    }

    public function validate(){
        return $this->db->query('SELECT s.NOINDUK
                                FROM mssiswa s
                                JOIN rkpaktvsiswa rs ON rs.NISRKP = s.NOINDUK
                                where s.isdeleted !=1
                                AND s.STATUSCALONSISWA = 4');
    }

    public function getsemester(){
        return $this->db->query('SELECT DISTINCT SEMESTER FROM tbakadmk ORDER BY SEMESTER DESC');
    }

    public function getthnmasuk(){
        return $this->db->query('SELECT DISTINCT s.TAHUN
                                FROM mssiswa s
                                where s.isdeleted !=1
                                AND s.STATUSCALONSISWA = 4');
    }

    public function getthnakad(){
        return $this->db->query('SELECT DISTINCT THNAKAD FROM tbakadmk ORDER BY ID DESC');
    }

    public function viewtampil(){
        return $this->db->query('select a.*,b.DESCRTBPS from mspelajaran a join tbps b on a.ps = b.KDTBPS where a.isdeleted != 1');
    }

    public function viewOrdering($table,$order,$ordering){
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order,$ordering);
        return $this->db->get($table);
    }

    public function viewWhereOrdering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        return $this->db->get($table);
    }
    
    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_count($table,$data_id){
        $this->db->where($data_id);
        $this->db->where('isdeleted !=', 1);
        $hasil = $this->db->get($table);
        return $hasil->num_rows();
    }
      
    public function insert($data, $table){
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where,$data,$table){
		$this->db->where($where);
		return $this->db->update($table,$data);
	}	
    
    function delete($where,$table){
    	$this->db->where($where);
    	return $this->db->delete($table);
    }

    function truncate($table){
      $this->db->truncate($table);
    }
}