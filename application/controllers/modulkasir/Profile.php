<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/model_profile');
        if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulkasir/dashboard/login');
        }
    }

    function render_view($data)
    {
        $this->template->load('templatekasir', $data); //Display Page
    }

    public function index()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $mytahun = $this->model_profile->gettahun()->result_array();
            $mysemester = $this->model_profile->getsemester()->result_array();
            $myps = $this->model_profile->getps()->result_array();

            $data = array(
                'page_content'     => '../pagekasir/profile/view',
                'ribbon'         => '<li class="active">Dashboard</li><li>Profile</li>',
                'page_name'     => 'Profile',
                'js'             => 'js_file',
                'mytahun'        => $mytahun,
                'mysemester'    => $mysemester,
                'myps'            => $myps
            );
            $this->render_view($data);
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }

    public function edit()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
            $where = array('
			nip' => $this->session->userdata('kodekaryawan'));
            $mydata = $this->model_profile->viewWhereOrdering('tbpengawas', $where, 'nip', 'asc')->result_array();
            // print_r($mydata);exit;
            $data = array(
                'page_content'     => '../pagekasir/profile/editprofile',
                'ribbon'         => '<li class="active">Dashboard</li><li>Edit Profile</li>',
                'page_name'     => 'Edit Profile',
                'js'             => 'js_file',
                'mydata'        => $mydata,
            );
            $this->render_view($data);
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

            $config['upload_path']          = './assets/gambar';
            $config['allowed_types']        = 'gif|jpg|png';
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
                    'password'  => $this->input->post('password'),
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
                    'password'  => $this->input->post('password'),
                    'level' => $this->input->post('level'),
                    'status'  => 1,
                    'gambar'  => null,
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

    public function update()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
            $data_id = array(
                'nip'  => $this->input->post('e_id')
            );
            $config['upload_path']          = './assets/gambar';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                $data = array(
                    'gambar'  => $foto,
                    'updatedAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_profile->update($data_id, $data, 'tbpengawas');
                echo json_decode($result);
            }
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
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
