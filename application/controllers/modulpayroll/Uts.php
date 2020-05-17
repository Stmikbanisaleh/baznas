<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('guru/model_uts');
    }

    function render_view($data)
    {
        $this->template->load('templateguru', $data); //Display Page

    }

    public function simpannilai()
    {
        $data_id = array(
            'ID'  => $this->input->post('idnilai')
        );
        $data = array(
            'IDKRS'  => $this->input->post('id_krs'),
            'TGLUTSTRNIL'  => date('Y-m-d H:i:s'),
            'IDJDK' => $this->input->post('idjadwal'),
            'NPMTRNIL' => $this->input->post('nis'),
            'KDMKTRNIL' => $this->input->post('id_mapel'),
            'KLSTRNIL'  => $this->input->post('NMKLSTRJDK'),
            'UTSTRNIL'  => $this->input->post('nilai'),
            'USERUTSTRNIL'         => $this->session->userdata('idguru'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $data_update = array(
            'UTSTRNIL'  => $this->input->post('nilai'),
            'TGLUTSTRNIL'  => date('Y-m-d H:i:s'),
            'USERUTSTRNIL'  => $this->session->userdata('idguru'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $cek = $this->model_uts->view_where('trnilai',$data_id)->num_rows();
        if($cek > 0){
             $action = $this->model_uts->update($data_id,$data_update, 'trnilai');
        } else {
            $action = $this->model_uts->insert($data, 'trnilai');
        }
        echo json_encode($action);
    }

    public function index()
    {
        $session = $this->session->userdata('idguru');
        $nodapodik = $this->model_uts->views($session)->result_array();
        $mypelajaran = $this->model_uts->getmapel($session)->result_array();
        $data = array(
            'page_content'     => '../pageguru/uts/view',
            'ribbon'         => '<li class="active">Nilai Uts</li>',
            'page_name'     => 'Nilai Uts',
            'mypelajaran'     => $mypelajaran,
            'guru'  => $nodapodik
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_uts->view_where_v2('tbguru', $data)->result();
        echo json_encode($my_data);
    }

    public function tampil()
    {
        $my_data = $this->model_uts->view_guru('tbguru')->result_array();
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
        $action = $this->model_uts->update($data_id, $data, 'tbguru');
        echo json_encode($action);
    }

    public function search()
    {
        $mapel = $this->input->post('mapel');
        $result = $this->model_uts->getuts($mapel)->result();
        echo json_encode($result);
    }
}
