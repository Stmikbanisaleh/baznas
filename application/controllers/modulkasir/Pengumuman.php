<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/model_pengumuman');
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
            $data = array(
                'page_content'     => '../pagekasir/pengumuman/view',
                'ribbon'         => '<li class="active">Dashboard</li><li>Pengumuman</li>',
                'page_name'     => 'Pengumuman',
                'js'             => 'js_file',
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
			Useriid' => $this->session->userdata('kodekaryawan'));
            $mydata = $this->model_pengumuman->viewWhereOrdering('user_login', $where, 'StatusLogin', 'asc')->result_array();
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
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $config['upload_path']          = './assets/gambar';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            // print_r($this->input->post());exit;
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                $data = array(
                    'AwalTglPengum'  => $this->input->post('awal'),
                    'AkhirTGlPengum'  => $this->input->post('akhir'),
                    'WaktuPengum'  => $this->input->post('waktu'),
                    'JenisPengum'  => $this->input->post('jenis'),
                    'IsiPengum'  => $this->input->post('isi'),
                    'keterangan' => $this->input->post('keterangan'),
                    'FileDurasi'  => $foto,
                    'createdAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_pengumuman->insert($data, 'pengumuman');
                echo json_decode($result);
            } else {
                $data = array(
                    'AwalTglPengum'  => $this->input->post('awal'),
                    'AkhirTGlPengum'  => $this->input->post('akhir'),
                    'WaktuPengum'  => $this->input->post('waktu'),
                    'JenisPengum'  => $this->input->post('jenis'),
                    'IsiPengum'  => $this->input->post('isi'),
                    'keterangan' => $this->input->post('keterangan'),
                    'createdAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_pengumuman->insert($data, 'pengumuman');
                echo json_decode($result);
            }
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil_byid()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $data = array(
                'NoPengum'  => $this->input->post('id'),
            );
            $my_data = $this->model_pengumuman->view_where('pengumuman', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $my_data = $this->model_pengumuman->viewOrdering('pengumuman', 'NoPengum', 'asc')->result_array();
            echo json_encode($my_data);
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }

    public function update()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
            $data_id = array(
                'NoPengum'  => $this->input->post('e_id')
            );
            $config['upload_path']          = './assets/gambar';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload("e_file")) {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                $data = array(
                    'gambar'  => $foto,
                    'AwalTglPengum'  => $this->input->post('e_awal'),
                    'AkhirTGlPengum'  => $this->input->post('e_akhir'),
                    'WaktuPengum'  => $this->input->post('e_waktu'),
                    'JenisPengum'  => $this->input->post('e_jenis'),
                    'IsiPengum'  => $this->input->post('e_isi'),
                    'keterangan' => $this->input->post('e_keterangan'),
                    'updatedAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_pengumuman->update($data_id, $data, 'pengumuman');
                echo json_decode($result);
            } else{
                $data = array(
                    'AwalTglPengum'  => $this->input->post('e_awal'),
                    'AkhirTGlPengum'  => $this->input->post('e_akhir'),
                    'WaktuPengum'  => $this->input->post('e_waktu'),
                    'JenisPengum'  => $this->input->post('e_jenis'),
                    'IsiPengum'  => $this->input->post('e_isi'),
                    'keterangan' => $this->input->post('e_keterangan'),
                    'updatedAt' => date('Y-m-d H:i:s')
                );
                $result = $this->model_pengumuman->update($data_id, $data, 'pengumuman');
                echo json_decode($result);
            }
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }

    public function delete()
    {
        if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {

            $data_id = array(
                'NoPengum'  => $this->input->post('id')
            );
            $data = array(
                'isdeleted'  => 1,
            );
            $action = $this->model_pengumuman->update($data_id, $data, 'pengumuman');
            echo json_encode($action);
        } else {
            $this->load->view('pagekasir/login'); //Memanggil function render_view
        }
    }
}
