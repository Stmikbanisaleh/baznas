<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('modulsiswa/model_profile');
    }

    function render_view($data)
    {
        $this->template->load('templatesiswa', $data); //Display Page

    }

	public function edit()
    {
			$where = array('
			IdGuru' => $this->session->userdata('idguru'));
            $mydata = $this->model_guru->viewWhereOrdering('tbguru',$where, 'id' ,'asc')->result_array();
            $data = array(
                'page_content'     => '../pagesiswa/setting/editpassword',
                'ribbon'         => '<li class="active">Dashboard</li><li>Edit Password</li>',
                'page_name'     => 'Edit Password',
                'js'             => 'js_file',
                'mydata'        => $mydata,
            );
            $this->render_view($data);
	}
    public function index()
    {
        $data = array(
            'page_content'     => '../pagesiswa/setting/editpassword',
            'ribbon'         => '<li class="active">Edit Password</li>',
            'page_name'     => 'Setting Password',
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function update()
    {
        if($this->input->post('password') == $this->input->post('password_new')){
            $data_id = array(
                'NOINDUK'  => $this->session->userdata('nis')
            );
            $data = array(
                'PASSWORD'  => hash('sha512',md5($this->input->post('password'))),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_profile->update($data_id, $data, 'mssiswa');
            echo json_encode($action);
        } else {
            echo json_encode(false);
        }
        
    }
}
