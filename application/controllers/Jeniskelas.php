<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskelas extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_jeniskelas');
	}

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> 'jeniskelas/view',
        			'ribbon' 		=> '<li class="active">Jenis Kelas</li>',
					'page_name' 	=> 'Master Jenis Kelas',
        		);
        $this->render_view($data); //Memanggil function render_view
	}
	public function tampil()
	{
		$my_data = $this->model_jeniskelas->viewOrdering('tbkelas', 'id_kelas', 'asc')->result();
		echo json_encode($my_data);
	}

	public function tampil_byid()
	{
		$data = array(
			'id_kelas'  => $this->input->post('id'),
		);
		$my_data = $this->model_jeniskelas->view_where('tbkelas', $data)->result();
		echo json_encode($my_data);
	}

	public function simpan()
	{
		$data = array(
			'nama'  => $this->input->post('nama_kelas'),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_jeniskelas->insert($data, 'tbkelas');
		echo json_encode($action);
	}

	public function update()
	{
		$data_id = array(
			'id_kelas'  => $this->input->post('e_id')
		);
		$data = array(
			'nama'  => $this->input->post('e_nama_kelas'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_jeniskelas->update($data_id, $data, 'tbkelas');
		echo json_encode($action);
	}
	public function delete()
	{
		$data_id = array(
			'id_kelas'  => $this->input->post('id')
		);
		$data = array(
			'isdeleted'  => 1,
		);
		$action = $this->model_jeniskelas->update($data_id, $data, 'tbkelas');
		echo json_encode($action);
	}
}