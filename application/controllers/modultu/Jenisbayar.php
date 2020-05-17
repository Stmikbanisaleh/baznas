<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisbayar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tu/model_jenisbayar');
	}

	function render_view($data)
	{
		$this->template->load('templatetu', $data); //Display Page
	}

	public function index()
	{
		$myjurnal = $this->model_jenisbayar->view('spem_jurnal')->result_array();
		$data = array(
			'page_content' 	=> '../pagetu/jenisbayar/view',
			'ribbon' 		=> '<li class="active">Jenis Pembayaran</li><li>Sample</li>',
			'page_name' 	=> 'Jenis Pembayaran',
			'myjurnal'       => $myjurnal,
		);
		$this->render_view($data); //Memanggil function render_view
	}
	public function tampil()
	{
		$my_data = $this->model_jenisbayar->viewOrdering('spem_jenispembayaran', 'id', 'asc')->result();
		echo json_encode($my_data);
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_jenisbayar->view_where('spem_jenispembayaran', $data)->result();
		echo json_encode($my_data);
	}

	public function simpan()
	{
		$data = array(
			'Kodejnsbayar'  => $this->input->post('Kodejnsbayar'),
			'namajenisbayar'  => $this->input->post('namajenisbayar'),
			'no_jurnal'  => $this->input->post('no_jurnal'),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_jenisbayar->insert($data, 'spem_jenispembayaran');
		echo json_encode($action);
	}

	public function update()
	{
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		$data = array(
			'Kodejnsbayar'  => $this->input->post('e_Kodejnsbayar'),
			'namajenisbayar'  => $this->input->post('e_namajenisbayar'),
			'no_jurnal'  => $this->input->post('e_no_jurnal'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_jenisbayar->update($data_id, $data, 'spem_jenispembayaran');
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
		$action = $this->model_jenisbayar->update($data_id, $data, 'spem_jenispembayaran');
		echo json_encode($action);
	}
}
