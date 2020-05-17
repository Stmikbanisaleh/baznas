<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
                'page_content'     => '../pageguru/profile/editprofile',
                'ribbon'         => '<li class="active">Dashboard</li><li>Edit Profile</li>',
                'page_name'     => 'Edit Profile',
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
            'page_content'     => '../pageguru/profile/view',
            'ribbon'         => '<li class="active">Profil Guru</li>',
            'page_name'     => 'Profil Guru',
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
        $data_id = array(
            'IdGuru'  => $this->input->post('e_id')
        );
        $data = array(
            'GuruEmail'  => $this->input->post('email'),
            'GuruAlamat'  => $this->input->post('alamat'),
            'GuruTelp'  => $this->input->post('telp'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_guru->update($data_id, $data, 'tbguru');
        echo json_encode($action);
    }
}
