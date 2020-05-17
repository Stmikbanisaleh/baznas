<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surattagihan extends CI_Controller {

        function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_surattagihan');
        $this->load->library('mainfunction');
        $this->load->library('Configfunction');
        if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulkasir/dashboard/login');
        }
    }

	function render_view($data) {
        $this->template->load('templatekasir', $data); //Display Page
    }

	public function index() {
        $my_siswa = $this->model_surattagihan->view('mssiswa')->result_array();
        $my_kelas = $this->model_surattagihan->view('tbkelas')->result_array();
        $data = array(
        			'page_content' 	=> '../pagekasir/surattagihan/view',
        			'ribbon' 		=> '<li class="active">Surat Tagihan</li>',
					'page_name' 	=> 'Surat Tagihan',
                    'my_siswa'      => $my_siswa,
                    'my_kelas'     => $my_kelas
        		);
        $this->render_view($data); //Memanggil function render_view
    }

    public function laporan_pdf(){
        $tgl = $this->mainfunction->tgl_indo(date('Y-m-d'));
        $nis = $this->input->post('siswa');
        $kelas = $this->input->post('kelas');  
        $my_pembsiswa = $this->model_surattagihan->view_siswatg($nis, $kelas)->row();
        $thnakad = $this->configfunction->getthnakd();
        $this->load->library('pdf');

        $setting = $this->model_surattagihan->view('sys_config','id','asc')->row();
        if($my_pembsiswa!=null){
            $data = array(
                'mydata'      => $my_pembsiswa,
                'tgl'         => $tgl,
                'setting'     => $setting,
                'thnakad'     => $thnakad[0]['THNAKAD']

            );
            $this->pdf->setPaper('FOLIO', 'potrait');
            $this->pdf->filename = "Surat-Tagihan".$nis."-".date('Y-m-d').".pdf";
            $this->pdf->load_view('pagekasir/surattagihan/laporan', $data);
        }else{
            $this->session->set_flashdata('cat_success', 'Data Tidak Ditemukan!');
            header("Location: ".base_url()."modulkasir/surattagihan");
        }
    }
}