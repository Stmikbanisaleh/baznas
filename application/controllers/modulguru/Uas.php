<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('guru/model_uas');
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
            'TGLUASTRNIL'  => date('Y-m-d H:i:s'),
            'IDJDK' => $this->input->post('idjadwal'),
            'NPMTRNIL' => $this->input->post('nis'),
            'KDMKTRNIL' => $this->input->post('id_mapel'),
            'KLSTRNIL'  => $this->input->post('NMKLSTRJDK'),
            'UASTRNIL'  => $this->input->post('nilaiuas'),
            'USERUASTRNIL'         => $this->session->userdata('idguru'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $data_update = array(
            'UASTRNIL'  => $this->input->post('nilaiuas'),
            'TGLUASTRNIL'  => date('Y-m-d H:i:s'),
            'USERUASTRNIL'  => $this->session->userdata('idguru'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $cek = $this->model_uas->view_where('trnilai',$data_id)->num_rows();
        if($cek > 0){
             $action = $this->model_uas->update($data_id,$data_update, 'trnilai');
        } else {
            $action = $this->model_uas->insert($data, 'trnilai');
        }
        echo json_encode($action);
    }

    public function index()
    {
        $session = $this->session->userdata('idguru');
        $nodapodik = $this->model_uas->views($session)->result_array();
        $mypelajaran = $this->model_uas->getmapel($session)->result_array();
        $data = array(
            'page_content'     => '../pageguru/uas/view',
            'ribbon'         => '<li class="active">Nilai UAS</li>',
            'page_name'     => 'Nilai UAS',
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
        $my_data = $this->model_uas->view_where_v2('tbguru', $data)->result();
        echo json_encode($my_data);
    }

    public function tampil()
    {
        $my_data = $this->model_uas->view_guru('tbguru')->result_array();
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
        $action = $this->model_uas->update($data_id, $data, 'tbguru');
        echo json_encode($action);
    }

    public function search()
	{
			$mapel = $this->input->post('mapel');
            $result = $this->model_uas->getuts($mapel)->result();
			echo json_encode($result);
	}
}
