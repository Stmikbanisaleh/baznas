<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartubayar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/model_kartubayar');
        $this->load->library('mainfunction');
        if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulkasir/dashboard/login');
        }
    }

	function render_view($data) {
        $this->template->load('templatekasir', $data); //Display Page
    }

	public function index() {
        $my_siswa = $this->model_kartubayar->view('mssiswa')->result_array();
        $data = array(
        			'page_content' 	=> '../pagekasir/kartubayar/view',
        			'ribbon' 		=> '<li class="active">Kartu Pembayaran</li><li>Sample</li>',
					'page_name' 	=> 'Kartu Pembayaran',
                    'my_siswa'      => $my_siswa,
        		);
        $this->render_view($data); //Memanggil function render_view
    }

    public function show_nopem()
    {
        $siswa = $this->input->post('siswa');
        $my_data = $this->model_kartubayar->view_nopem($siswa)->result_array();
        echo "<option value='0'>--Pilih No Pembayaran--</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['Nopembayaran'] . "'>[" . $value['Nopembayaran'] . "] - " . $value['tglentri'] . "</option>";
        }
    }

    public function laporan_pdf(){
        $this->load->library('pdf');
        $tgl = $this->mainfunction->tgl_indo(date('Y-m-d'));
        $nis = $this->input->post('siswa');
        $pilihan_pertama = $this->input->post('pilihan_pertama');  
        $dari = $this->input->post('dari'); 
        $sampai = $this->input->post('sampai');
        $data = array(
            'tgl'         => $tgl,
            'siswa'         => $nis,
            'dari'        => $dari,
            'sampai'      => $sampai

        );
        $this->pdf->setPaper('FOLIO', 'potrait');
        $this->pdf->filename = "laporan-Kartu-Bayar".date('Y-m-d').".pdf";
        $this->pdf->load_view('pagekasir/kartubayar/laporan', $data);
    }
}