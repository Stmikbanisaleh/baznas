<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		$my_data = $this->model_jenjang->view('jenjang')->result_array();
		// $my_jabatan = $this->model_jabatan->view('jabatan')->result_array();
		$data = array(
			'page_content' 	=> 'jenjang/view',
			'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Jenjang Pendidikan</li>',
			'page_name' 	=> 'Master Jenjang Pendidikan',
			'js' 			=> 'js_file',
			'mydata' 		=> $my_data,
			// 'myjabatan' 	=> $my_jabatan,
		);
		$this->render_view($data); //Memanggil function render_view
	}

	public function simpan_jenjang()
	{
		$data = array(
			'jenjang'  => $this->input->post('jenjang'),
			'createdAt' => date('Y-m-d H:i:s')
		);
        $count_id = $this->model_jenjang->view_count('jenjang', $data['jenjang']);
		if ($count_id < 1) {
			$result = $this->model_jenjang->insert($data, 'jenjang');
			if ($result) {
				echo $result;
			} else {
				echo 'insert gagal';
			}
		} else {
			echo json_encode(401);
		}
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_jenjang->view_where('jenjang', $data)->result();
		echo json_encode($my_data);
	}

	public function tampil_jenjang()
	{
		$my_data = $this->model_jenjang->view('jenjang')->result_array();
		echo json_encode($my_data);
	}

	public function update_jenjang()
	{
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		$data = array(
			'jenjang'  => $this->input->post('e_jenjang'),
		);
		$action = $this->model_jenjang->update($data_id, $data, 'jenjang');
		echo json_encode($action);
	}

	public function delete_jenjang()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
		$action = $this->model_jenjang->update($data_id,$data,'jenjang');
        echo json_encode($action);
        
    }
}
