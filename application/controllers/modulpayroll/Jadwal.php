<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('guru/model_jadwal');
    }

    function render_view($data)
    {
        $this->template->load('templateguru', $data); //Display Page

    }

    public function index()
    {
        $my_data = $this->model_jadwal->getsekolah()->result_array();
        $myakadmk = $this->model_jadwal->view_custome()->result_array();
        $mypendidikan = $this->model_jadwal->view('mspendidikan')->result_array();
        $data = array(
            'page_content'     => '../pageguru/jadwal/view',
            'ribbon'         => '<li class="active">Jadwal Mengajar</li>',
            'page_name'     => 'Jadwal Mengajar',
            'myprogram'     => $my_data,
            'myakadmk'        => $myakadmk,
            'mypendidikan'     => $mypendidikan
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_jadwal->view_guru('tbguru')->result_array();
        echo json_encode($my_data);
    }

    public function update()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'IdGuru'  => $this->input->post('e_IdGuru'),
            'GuruNoDapodik'  => $this->input->post('e_GuruNoDapodik'),
            'GuruNama'  => $this->input->post('e_nama'),
            'GuruTelp'  => $this->input->post('e_telepon'),
            'GuruAlamat'  => $this->input->post('e_alamat'),
            'GuruBase' => $this->input->post('e_program_sekolah'),
            // 'GuruWaktu'  => $this->input->post('alamat'),
            'GuruJeniskelamin'  => $this->input->post('e_jenis_kelamin'),
            'GuruPendidikanAkhir'  => $this->input->post('e_pendidikan_terakhir'),
            'GuruAgama'  => $this->input->post('e_agama'),
            'GuruEmail' => $this->input->post('e_email'),
            'GuruTglLahir'  => $this->input->post('e_tgl_lahir'),
            'GuruTempatLahir'  => $this->input->post('e_tempat_lahir'),
            'GuruStatus'  => $this->input->post('e_status'),
            'updatedAt' => date('Y-m-d H:i:s')
        );
        $action = $this->model_jadwal->update($data_id, $data, 'tbguru');
        echo json_encode($action);
    }

    public function search()
    {
        $tahun = $this->input->post('tahun');
        $programsekolah = $this->input->post('programsekolah');
        $result = $this->model_jadwal->getjadwal($tahun, $programsekolah)->result();
        echo json_encode($result);
    }
}
