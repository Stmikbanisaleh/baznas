<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskelas extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('tu/model_jeniskelas');
	}

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/jeniskelas/view',
        			'ribbon' 		=> '<li class="active">Jenis Kelas</li><li>Sample</li>',
					'page_name' 	=> 'Jenis Kelas',
        		);
        $this->render_view($data); //Memanggil function render_view
	}
	public function tampil()
	{
		$my_data = $this->model_jeniskelas->viewOrdering('tbkelas', 'id', 'asc')->result();
		echo json_encode($my_data);
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_jeniskelas->view_where('tbkelas', $data)->result();
		echo json_encode($my_data);
	}

	public function simpan()
	{
		$data = array(
			'nama_kelas'  => $this->input->post('nama_kelas'),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_jeniskelas->insert($data, 'tbkelas');
		echo json_encode($action);
	}

	public function update()
	{
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		$data = array(
			'nama_kelas'  => $this->input->post('e_nama_kelas'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_jeniskelas->update($data_id, $data, 'tbkelas');
		echo json_encode($action);
		//echo $this->db->last_query();
	}
	public function delete()
	{
		$data_id = array(
			'id'  => $this->input->post('id')
		);
		$data = array(
			'isdeleted'  => 1,
		);
		$action = $this->model_jeniskelas->update($data_id, $data, 'tbkelas');
		echo json_encode($action);
	}
}