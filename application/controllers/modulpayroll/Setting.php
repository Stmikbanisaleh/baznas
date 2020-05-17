<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('guru/model_guru');
    }

    function render_view($data)
    {
        $this->template->load('templateguru', $data); //Display Page

    }

	public function edit()
    {
        if ($this->session->userdata('username_guru') != null && $this->session->userdata('idguru') != null) {
			$where = array('
			IdGuru' => $this->session->userdata('idguru'));
            $mydata = $this->model_guru->viewWhereOrdering('tbguru',$where, 'id' ,'asc')->result_array();
            $data = array(
                'page_content'     => '../pageguru/setting/editpassword',
                'ribbon'         => '<li class="active">Dashboard</li><li>Edit Password</li>',
                'page_name'     => 'Edit Password',
                'js'             => 'js_file',
                'mydata'        => $mydata,
            );
            $this->render_view($data);
        } else {
            $this->load->view('pageguru/login'); //Memanggil function render_view
        }
	}
    public function index()
    {
        $data = array(
            'page_content'     => '../pageguru/setting/editpassword',
            'ribbon'         => '<li class="active">Profil Guru</li><li>Sample</li>',
            'page_name'     => 'Setting Password',
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_guru->viewOrdering('sys_config', 'id', 'asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_guru->view_where('sys_config', $data)->result();
        echo json_encode($my_data);
    }

    public function update()
    {
        if($this->input->post('password') == $this->input->post('password_new')){
            $data_id = array(
                'IdGuru'  => $this->session->userdata('idguru')
            );
            $data = array(
                'password'  => hash('sha512',md5($this->input->post('password'))),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_guru->update($data_id, $data, 'tbguru');
            echo json_encode($action);
        } else {
            echo json_encode(false);
        }
        
    }
}
