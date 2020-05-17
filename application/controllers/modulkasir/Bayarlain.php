<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayarlain extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('kasir/model_bayar');
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
		$this->load->library("Configfunction");
		$mysiswa = $this->model_bayar->view('mssiswa')->result_array();
		$ta = $this->configfunction->getthnakd();
        $data = array(
        			'page_content' 	=> '../pagekasir/bayarlain/view',
        			'ribbon' 		=> '<li class="active">Pembayaran Lain-Lain</li>',
					'page_name' 	=> 'Pembayaran Lain-Lain',
					'mysiswa'		=> $mysiswa,
					'ta'			=> $ta[0]['THNAKAD'],
        		);
        $this->render_view($data); //Memanggil function render_view
	}
	
	public function search()
    {
		$noreg = $this->input->post('nik');
		$result = $this->model_bayar->getsiswa1($noreg)->result();
        echo json_encode($result);
	}

	public function showsiswa()
    {
		$this->load->library("Configfunction");
		$noreg = $this->input->post('nik');
		$ta = $this->configfunction->getthnakd();
		$getssiswa = $this->model_bayar->getsiswa($noreg)->result_array();
		$siswa = $getssiswa;
		$siswa = $siswa[0]['PS'];
		$result = $this->model_bayar->getsiswa2($ta[0]['THNAKAD'],$siswa)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
        foreach ($result as $value) {
            echo "<option value='" . $value['Kodejnsbayar'] . "'>[".$value['sekolah']."] - [".$value['ThnMasuk']."]  - [".$value['namajenisbayar']."] - [".$value['Nominal2']."] </option>";
        }
	}

	public function showsiswa2()
    {
		
		$noreg = $this->input->post('nik');
		$result = $this->model_bayar->getsiswa($noreg)->result_array();
		if(count($result) > 0){
			echo json_encode($result[0]['NMSISWA']);
		}
	}

	public function simpan()
    {
		$nis= $this->input->post('nik2');
		$ket= $this->input->post('ket');
		$ThnAkademik = $this->input->post('thnakad');
		$getkelas = $this->db->query("SELECT*,
		(SELECT z.Kelas FROM baginaikkelas z WHERE z.NIS = mssiswa.NOINDUK ORDER BY Kelas DESC LIMIT 1)AS Kelas2
		FROM mssiswa WHERE NOINDUK='$nis' OR Noreg='$nis'")->result_array();
		$kdsekolah = $getkelas[0]['PS'];
        $data = array(
            'NIS'  => $nis,
            'Noreg'  => $getkelas[0]['NOREG'],
            'Kelas'  => $getkelas[0]['Kelas2'],
            'tglentri'  => date('Y-m-d'),
            'useridd'  => $this->session->userdata('kodekaryawan'),
            'TotalBayar'  => $this->input->post('nominal_v'),
            'kodesekolah'  => $getkelas[0]['PS'],
            'TA'  => $this->input->post('thnakad'),
            'createdAt' => date('Y-m-d H:i:s'),
		);
		$action = $this->model_bayar->insert($data, 'pembayaran_sekolah');
		$id = $this->db->insert_id();
		if($action){
			$gettarif = $this->db->query("SELECT * FROM tarif_berlaku WHERE `status`='T' AND Kodejnsbayar='$ket'
			 AND kodesekolah='$kdsekolah' AND TA='$ThnAkademik'")->result_array();
			$data2 = array(
				'Nopembayaran' => $id,
				'kodejnsbayar' => $this->input->post('ket'),
				'idtarif'	=>	$gettarif[0]['idtarif'],
				'nominalbayar' => $this->input->post('nominal_v')
			);
			$action = $this->model_bayar->insert($data2, 'detail_bayar_sekolah');
		}
        echo json_encode($action);
	}
	
	public function cetak(){
        $this->load->library('pdf');
        $tampil_thnakad = $this->configfunction->getthnakd();
        $thnakad = $tampil_thnakad[0]['THNAKAD'];
        $data = array(
            'ThnAkademik'         => $thnakad,
		);

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Rekap-Pembayaran.pdf";
        $this->pdf->load_view('pagekasir/bayarlain/laporan', $data);
    }


}