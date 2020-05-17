<?php 

class Model_kurikulum extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function viewtampil(){
        return $this->db->query('select a.*,b.DESCRTBPS,c.DESCRTBJS from mspelajaran a join tbps b on a.ps = b.KDTBPS join tbjs c on b.KDTBJS = c.KDTBJS where a.isdeleted != 1 order by id_mapel desc');
    }

    public function getsekolah()
    {
        return  $this->db->query("SELECT a.id, a.KDTBPS, a.DESCRTBPS, a.SINGKTBPS, b.DESCRTBJS FROM tbps a JOIN tbjs b ON a.KDTBJS = b.KDTBJS");
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