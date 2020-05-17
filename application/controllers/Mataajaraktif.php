<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mataajaraktif extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_mataajaraktif');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		$mysemester = $this->model_mataajaraktif->getsemester()->result_array();
		$mythnakad = $this->model_mataajaraktif->getthnakad()->result_array();
		$myps = $this->model_mataajaraktif->getsekolah()->result_array();
		$mypelajaran = $this->model_mataajaraktif->viewOrdering('mspelajaran', 'id_mapel', 'asc')->result_array();
		$mykelas = $this->model_mataajaraktif->viewOrdering('tbkelas','id_kelas','asc')->result_array();

		$data = array(
			'page_content' 	=> '/mataajaraktif/view',
			'ribbon' 		=> '<li class="active">Dashboard</li><li>Mataajar Aktif</li>',
			'page_name' 	=> 'Mataajar Aktif',
			'js' 			=> 'js_file',
			'mysemester'	=> $mysemester,
			'mythnakad'		=> $mythnakad,
			'myps'			=> $myps,
			'mypelajaran'	=> $mypelajaran,
			'mykelas'		=> $mykelas
		);
		$this->render_view($data);
	}

	public function simpan()
	{
		$this->load->library('Configfunction');
		$tampil_thnakad = $this->configfunction->getthnakd();
		$data = array(
			'KDMKTRMKA'  => $this->input->post('kodemataajar'),
			'SMTTRMKA'  => $this->input->post('semester'),
			'PSTRMKA'  => $this->input->post('programsekolahs'),
			'THNAKDTRMKA'  => $tampil_thnakad[0]['THNAKAD'],
			'GANGENTRMKA'  => $tampil_thnakad[0]['SEMESTER'],
			'IDUSER'  => $this->session->userdata('nip'),
			'TGLINPUT'  => date('Y-m-d H:i:s'),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_mataajaraktif->insert($data, 'trmka');
		echo json_encode($action);
	}

	public function tampil_byid()
	{
		$data = array(
			'ID'  => $this->input->post('id'),
		);
		$my_data = $this->model_mataajaraktif->view_where('trmka', $data)->result();
		echo json_encode($my_data);
	}

	public function search()
	{
		$tahun = $this->input->post('tahun');
		$semester = $this->input->post('semester');
		$programsekolah = $this->input->post('programsekolah');
		$result = $this->model_mataajaraktif->getsearch($tahun, $programsekolah, $semester)->result();
		echo json_encode($result);
	}

	public function tampil()
	{
		$my_data = $this->model_mataajaraktif->view_karyawan()->result_array();
		echo json_encode($my_data);
	}

	public function update()
	{
		$this->load->library('Configfunction');
		$tampil_thnakad = $this->configfunction->getthnakd();
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		
		$data = array(
			'KDMKTRMKA'  => $this->input->post('e_kodemataajar'),
			'SMTTRMKA'  => $this->input->post('e_semester'),
			'PSTRMKA'  => $this->input->post('e_programsekolah'),
			'IDUSER'  => $this->session->userdata('nip'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$result = $this->model_mataajaraktif->update($data_id, $data, 'trmka');
		echo json_decode($result);
	}

	public function delete()
	{
		$data_id = array(
			'ID'  => $this->input->post('id')
		);

		$data = array(
			'isdeleted'  => 1,
		);
		$action = $this->model_mataajaraktif->update($data_id, $data, 'trmka');
		echo json_encode($action);
	}
}
