<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_profile');
        if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulkasir/dashboard/login');
        }
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page
    }

    public function index()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $mytahun = $this->model_profile->gettahun()->result_array();
            $mysemester = $this->model_profile->getsemester()->result_array();
            $myps = $this->model_profile->getps()->result_array();

            $data = array(
                'page_content'     => '/setting/view',
                'ribbon'         => '<li class="active">Dashboard</li><li>Setting</li>',
                'page_name'     => 'Setting Password',
                'js'             => 'js_file',
                'mytahun'        => $mytahun,
                'mysemester'    => $mysemester,
                'myps'            => $myps
            );
            $this->render_view($data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }



    public function simpan2()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
            if ($this->input->post('password1') != $this->input->post('password2')) {
                echo json_decode(0);
            } else {
                $data_id = array(
                    'kodekaryawan' => $this->session->userdata('kodekaryawan')
                );
                $data = array(
                    'password'  => md5($this->input->post('password1')),
                    'updatedAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_profile->update($data_id, $data, 'tbpengawas');
                echo json_decode($result);
            }
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function update()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $data_id = array(
                'id'  => $this->input->post('e_id')
            );
            $config['upload_path']          = './assets/gambar';
            $config['allowed_types']        = 'gif|jpg|png';
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
                    'password'  => $this->input->post('password'),
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
                    'password'  => $this->input->post('e_password'),
                    'level' => $this->input->post('e_level'),
                    'status'  => $this->input->post('e_status'),
                    'gambar'  => null,
                    'createdAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
                echo json_decode($result);
            }
            echo json_encode($result);
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }
}
