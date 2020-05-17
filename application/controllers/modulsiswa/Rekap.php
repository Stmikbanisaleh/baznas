<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('modulsiswa/model_rekap');
        $this->load->library('Configfunction');
    }

	function render_view($data) {
        $this->template->load('templatesiswa', $data); //Display Page
       
    }
    public function search()
    {
        $siswa = $this->session->userdata('nis');
        $result = $this->model_rekap->pembsis_detail($siswa)->result();
        echo json_encode($result);
    }

    public function print2(){
        $this->load->library('pdf');
        $tampil_thnakad = $this->configfunction->getthnakd();
        $thnakad = $tampil_thnakad[0]['THNAKAD'];
        $data = array(
            'ThnAkademik'         => $thnakad,
        );


        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Rekap-Pembayaran.pdf";
        $this->pdf->load_view('pagekasir/bayarsiswa/laporan', $data);
    }

    public function search_pemb_sekolah()
    {
        $siswa = $this->session->userdata('nis');
        $result = $this->model_rekap->pemb_sekolah($siswa)->result();
        echo json_encode($result);
    }

    public function search_pemb_sekolah_q2()
    {
        $siswa = $this->session->userdata('nis');
        $result = $this->model_rekap->pemb_sekolah_q2($siswa)->result();
        echo json_encode($result);
    }

	public function index() {
        $data = array(
            'page_content' 	=> '../pagesiswa/rekap/view',
            'ribbon' 		=> '<li class="active">Rekap Pembayaran</li><li>Sample</li>',
            'page_name' 	=> 'Rekap Pembayaran',
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $nip = $this->session->userdata('nis');
        $my_data = $this->model_rekap->view($nip)->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_biodata->view_where('sys_config',$data)->result();
        echo json_encode($my_data);
    }

    public function update()
    {
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
        $action = $this->model_biodata->update($data_id,$data,'sys_config');
        echo json_encode($action);
        
    }

}