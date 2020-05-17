<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifbayar extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('tu/model_tarifbayar');
	}

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
		
		$myjenis = $this->model_tarifbayar->view1('spem_jenispembayaran')->result_array();
		$sklh = $this->model_tarifbayar->view1('tbps')->result_array();
		$ta = $this->model_tarifbayar->view1('tbakadmk')->result_array();
        $data = array(
        			'page_content' 	=> '../pagetu/tarifbayar/view',
        			'ribbon' 		=> '<li class="active">Tarif Pembayaran</li><li>Sample</li>',
					'page_name' 	=> 'Tarif Pembayaran',
					'myjenis'       => $myjenis,
					'sklh'       => $sklh,
					'ta'       => $ta
        		);
        $this->render_view($data); //Memanggil function render_view
	}
	public function tampil()
	{
		$my_data = $this->model_tarifbayar->view('spem_tarif_berlaku', 'id', 'asc')->result();
		echo json_encode($my_data);
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_tarifbayar->view_where('spem_tarif_berlaku', $data)->result();
		echo json_encode($my_data);
	}

	public function simpan()
	{
		$data = array(
			'kodesekolah'  => $this->input->post('kodesekolah'),
			'Kodejnsbayar'  => $this->input->post('Kodejnsbayar'),
			'tahun'  => $this->input->post('tahun'),
			'Nominal'  => $this->input->post('Nominal'),
			//'userridd'  => $this->session->userdata('userridd'),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_tarifbayar->insert($data, 'spem_tarif_berlaku');
		echo json_encode($action);
	}

	public function update()
	{
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		$data = array(
			'kodesekolah'  => $this->input->post('e_kodesekolah'),
			'Kodejnsbayar'  => $this->input->post('e_Kodejnsbayar'),
			'tahun'  => $this->input->post('e_tahun'),
			'Nominal'  => $this->input->post('e_Nominal'),
			//'e_userridd'  => $this->session->userdata('userridd'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_tarifbayar->update($data_id, $data, 'spem_tarif_berlaku');
		echo json_encode($action);
	}
	public function delete()
	{
		$data_id = array(
			'id'  => $this->input->post('id')
		);
		$data = array(
			'isdeleted'  => 1,
		);
		$action = $this->model_tarifbayar->update($data_id, $data, 'spem_tarif_berlaku');
		echo json_encode($action);
	}
}