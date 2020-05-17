<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('akunting/model_parameter');
		if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
	}


	function render_view($data) {
        $this->template->load('templateakunting', $data); //Display Page
    }

	public function index() {
		$myjurnal = $this->model_parameter->view('jurnal')->result_array();
        $data = array(
        			'page_content' 	=> '../pageakunting/parameter/view',
        			'ribbon' 		=> '<li class="active">Parameter</li><li>Sample</li>',
					'page_name' 	=> 'Parameter',
					'myjurnal'       => $myjurnal,
        		);
        $this->render_view($data); //Memanggil function render_view
	}
	public function tampil()
	{
		$my_data = $this->model_parameter->viewOrdering()->result();
		echo json_encode($my_data);
	}

	public function tampil_byid()
	{
		$data = array(
			'id'  => $this->input->post('id'),
		);
		$my_data = $this->model_parameter->view_where('parameter', $data)->result();
		echo json_encode($my_data);
	}

	public function simpan()
	{
		$data = array(
			'no_jurnal'  => $this->input->post('no_jurnal'),
			'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_parameter->insert($data, 'parameter');
		echo json_encode($action);
	}

	public function update()
	{
		$data_id = array(
			'id'  => $this->input->post('e_id')
		);
		$data = array(
			'no_jurnal'  => $this->input->post('e_no_jurnal'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_parameter->update($data_id, $data, 'parameter');
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
		$action = $this->model_parameter->update($data_id, $data, 'parameter');
		echo json_encode($action);
	}
}