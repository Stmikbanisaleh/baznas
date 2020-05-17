<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_biodata');
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page

    }

    public function index()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data = array(
                'page_content'     => 'biodata/view',
                'ribbon'         => '<li class="active">Biodata Sekolah</li><li>Sample</li>',
                'page_name'     => 'Biodata Sekolah',
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $my_data = $this->model_biodata->viewOrdering('sys_config', 'id', 'asc')->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil_byid()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data = array(
                'id'  => $this->input->post('id'),
            );
            $my_data = $this->model_biodata->view_where('sys_config', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function update()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            
            $data_id = array(
                'id'  => $this->input->post('e_id')
            );
            $data = array(
                'apps_name'  => $this->input->post('e_appsname'),
                'address'  => $this->input->post('e_alamat'),
                'email'  => $this->input->post('e_email'),
                'name_school'  => $this->input->post('e_sekolah'),
                'url'  => $this->input->post('e_url'),
                'satker'  => $this->input->post('e_satker'),
                'facebook'  => $this->input->post('e_facebook'),
                'google'  => $this->input->post('e_google'),
                'tweeter'  => $this->input->post('e_tweeter'),
                'no_telp'  => $this->input->post('e_telp'),
                'meta_deskripsi'  => $this->input->post('e_deskripsi'),
                'meta_keyword'  => $this->input->post('e_keyword'),
                'favicon'  => $this->input->post('e_favicon'),
                'directory'  => $this->input->post('e_folder'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_biodata->update($data_id, $data, 'sys_config');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
}