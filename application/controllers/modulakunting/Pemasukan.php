<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('akunting/model_pemasukan');
		if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
	}

	function render_view($data)
	{
		$this->template->load('templateakunting', $data); //Display Page
	}

	public function index()
	{
		$myjurnal = $this->model_pemasukan->view('jurnal')->result_array();
		$data = array(
			'page_content' 	=> '../pageakunting/pemasukan/view',
			'ribbon' 		=> '<li class="active">Jenis Pemasukan</li><li>Sample</li>',
			'page_name' 	=> 'Jenis Pemasukan',
			'myjurnal'       => $myjurnal,
		);
		$this->render_view($data); //Memanggil function render_view
	}
	public function tampil()
	{
		$my_data = $this->model_pemasukan->viewOrdering('jenispembayaran', 'id', 'asc')->result();
		echo json_encode($my_data);
	}

	public function tampil_byid()
	{
		$data = array(
			'Kodejnsbayar'  => $this->input->post('id'),
		);
		$my_data = $this->model_pemasukan->view_where('jenispembayaran', $data)->result();
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
		$action = $this->model_pemasukan->insert($data, 'jenispembayaran');
		echo json_encode($action);
	}

	public function update()
	{
		$data_id = array(
			'Kodejnsbayar'  => $this->input->post('e_id')
		);
		$data = array(
			'Kodejnsbayar'  => $this->input->post('e_Kodejnsbayar'),
			'namajenisbayar'  => $this->input->post('e_namajenisbayar'),
			'no_jurnal'  => $this->input->post('e_no_jurnal'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_pemasukan->update($data_id, $data, 'jenispembayaran');
		echo json_encode($action);
	}
	public function delete()
	{
		$data_id = array(
			'Kodejnsbayar'  => $this->input->post('id')
		);
		$data = array(
			'isdeleted'  => 1,
		);
		$action = $this->model_pemasukan->update($data_id, $data, 'jenispembayaran');
		echo json_encode($action);
	}
}