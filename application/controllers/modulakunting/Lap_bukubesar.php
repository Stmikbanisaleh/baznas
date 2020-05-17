<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_bukubesar extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_laporan');
        if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
    }

	function render_view($data) {
        $this->template->load('templateakunting', $data); //Display Page
    }

	public function index() {
        $myjurnal = $this->model_laporan->view('jurnal')->result_array();

        $data = array(
        			'page_content' 	=> '../pageakunting/lap_bukubesar/view',
        			'ribbon' 		=> '<li class="active">Laporan Buku Besar</li>',
					'page_name' 	=> 'Laporan Buku Besar',
                    'myjurnal'      => $myjurnal,
        		);
        $this->render_view($data); //Memanggil function render_view
    }

    public function laporan() {
        $this->load->library('Configfunction');
        $sysconfig = $this->configfunction->get_sysconfig();
        $blnawal = $this->format_bulan($this->input->post('blnawal'));
        $blnakhir = $this->format_bulan($this->input->post('blnakhir'));        
        $tahun = $this->input->post('tahun');

        $data_jurnal = $this->model_laporan->get_jurnalbycode($this->input->post('coa'))->result_array();
            $v_kode_jurnal = $data_jurnal['0']['kode_jurnal'];
            $v_nama_jurnal = $data_jurnal['0']['nama_jurnal'];

        $data_nsa = $this->model_laporan->get_saldoawalbukbes($this->input->post('tahun'). "-" . $this->input->post('blnawal') . "-01", $this->input->post('tahun'). "-" . $this->input->post('blnakhir') . "-01", $this->input->post('coa'))->result_array();
            $nml = $data_nsa[0]['nml']; //Nilai saldo awal
        $data = array(
            'v_awal'      => $blnawal,
            'v_akhir'     => $blnakhir,
            'tahun'       => $tahun,
            'v_kode_jurnal' => $v_kode_jurnal,
            'v_nama_jurnal' => $v_nama_jurnal,
            'v_nml' => $nml,
            'my_sysconfig' => $sysconfig,
        );
        $this->load->view('pageakunting/lap_bukubesar/laporan', $data);
    }

    function format_bulan($bulan){
        $v_awal = '';
        switch ($bulan) {
            case 1:
            $v_awal = "Januari";
            break;
            case 2:
            $v_awal = "Februari";
            break;
            case 3:
            $v_awal = "Maret";
            break;
            case 4:
            $v_awal = "April";
            break;
            case 5:
            $v_awal = "Mei";
            break;
            case 6:
            $v_awal = "Juni";
            break;
            case 7:
            $v_awal = "Juli";
            break;
            case 8:
            $v_awal = "Agustus";
            break;
            case 9:
            $v_awal = "September";
            break;
            case 10:
            $v_awal = "Oktober";
            break;
            case 11:
            $v_awal = "November";
            break;
            case 12:
            $v_awal = "Desember";
            break;
        }
        return $v_awal;
    }
}