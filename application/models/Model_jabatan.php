<?php 

class Model_jabatan extends CI_model{
    public function view($table){
        return $this->db->get($table);
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