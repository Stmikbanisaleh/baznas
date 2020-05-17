<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_karyawan');
		$this->load->model('model_jabatan');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$myjabatan = $this->model_karyawan->viewOrdering('msjabatan', 'ID', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/karyawan/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Karyawan</li>',
				'page_name' 	=> 'Master Karyawan',
				'js' 			=> 'js_file',
				'myjabatan'		=> $myjabatan,
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$config['upload_path']          = './assets/gambar';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("file")) {
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'email'	=> $this->input->post('email'),
					'password'  => hash('sha512',md5($this->input->post('password'))),
					'level' => $this->input->post('level'),
					'status'  => 1,
					'gambar'  => $foto,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->insert($data, 'tbpengawas');
				echo json_decode($result);
			} else {
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'password'  => hash('sha512',md5($this->input->post('password'))),
					'level' => $this->input->post('level'),
					'status'  => 1,
					'email' => $this->input->post('email'),
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->insert($data, 'tbpengawas');
				echo json_decode($result);
			}
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'id_pengawas'  => $this->input->post('id'),
			);
			$my_data = $this->model_karyawan->view_where('tbpengawas', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_karyawan->view_karyawan()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
	public function import()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$files = $_FILES;
			$file = $files['file'];
			$fname = $file['tmp_name'];
			$file = $_FILES['file']['name'];
			$fname = $_FILES['file']['tmp_name'];
			$ext = explode('.', $file);
			/** Include path **/
			set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
			/** PHPExcel_IOFactory */
			include 'PHPExcel/IOFactory.php';
			$objPHPExcel = PHPExcel_IOFactory::load($fname);
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, false, true);
			$data_exist = [];

			foreach ($allDataInSheet as $ads) {
				if (array_filter($ads)) {
					array_push($data_exist, $ads);
				}
			}
			foreach ($data_exist as $key => $value) {
				if ($key == '0') {
					continue;
				} else {
					$arrayCustomerQuote = array(
						'NOINDUK' => $value[0],
						'NOREG' => $value[1],
						'NMSISWA' => $value[2],
						'TPLHR' => $value[3],
						'TGLHR' => $value[4],
						'JK' => $value[5],
						'AGAMA' => $value[6],
						'TAHUN' => $value[7],
						'PS' => $value[8],
						'KDWARGA' => $value[9],
						'EMAIL' => $value[10],
						'TELP' => $value[11],
						'createdAt'    => date('Y-m-d H:i:s')
					);
					$result = $this->model_karyawan->insert($arrayCustomerQuote, 'tbpengawas');
				}
			}
			if ($result) {
				$result = 1;
			}

			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
	}
	public function update()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id_pengawas'  => $this->input->post('e_id')
			);
			$config['upload_path']          = './assets/gambar';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload("e_file")) {
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'password'  => hash('sha512',md5($this->input->post('password'))),
					'level' => $this->input->post('level'),
					'status'  => 1,
					'gambar'  => $foto,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
				echo json_decode($result);
			} else {
				$data = array(
					'nip'  => $this->input->post('e_nip'),
					'nama'  => $this->input->post('e_nama'),
					'jabatan'  => $this->input->post('e_jabatan'),
					'username'  => $this->input->post('e_email'),
					'password'  => hash('sha512',md5($this->input->post('password'))),
					'level' => $this->input->post('e_level'),
					'status'  => $this->input->post('e_status'),
					'gambar'  => null,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
				echo json_decode($result);
			}
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id_pengawas'  => $this->input->post('id')
			);
			$data = array(
				'isdeleted'  => 1,
			);
			$action = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
