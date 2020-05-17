<?php 

class Model_mataajaraktif extends CI_model{

    public function view($table){
        return $this->db->get($table);
    }

    public function getsearch($tahun, $programsekolah,$semester){
        return  $this->db->query("SELECT
        trmka.ID,
        mspelajaran.kode,
        trmka.IDKRKTRMKA,
        trmka.KDMKTRMKA,
        trmka.SMTTRMKA,
        trmka.PSTRMKA,
        trmka.THNAKDTRMKA,
        trmka.GANGENTRMKA,
        trmka.IDUSER,
        trmka.TGLINPUT,
        mspelajaran.nama,
        tbps.DESCRTBPS
        FROM
        trmka
        INNER JOIN tbps ON trmka.PSTRMKA = tbps.KDTBPS
        INNER JOIN mspelajaran ON trmka.KDMKTRMKA = mspelajaran.id_mapel
        WHERE PSTRMKA = ".$programsekolah ." AND THNAKDTRMKA = '". $tahun."'  AND GANGENTRMKA = '". $semester."' and trmka.isdeleted != 1
        ORDER BY semester");
    }

    public function getsekolah()
    {
        return  $this->db->query("SELECT a.id, a.KDTBPS, a.DESCRTBPS, a.SINGKTBPS, b.DESCRTBJS FROM tbps a JOIN tbjs b ON a.KDTBJS = b.KDTBJS order by a.id desc");
    }
    

    public function getsemester(){
        return $this->db->query('SELECT DISTINCT SEMESTER FROM tbakadmk2 ORDER BY SEMESTER DESC');
    }

    public function getthnakad(){
        return $this->db->query('SELECT DISTINCT THNAKAD FROM tbakadmk2 ORDER BY ID DESC');
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