<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tunggakan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('kasir/model_tunggakan');
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
				'page_content' 	=> '../pagekasir/tunggakan/view',
				'ribbon' 		=> '<li class="active">Tunggakan</li><li>Sample</li>',
				'page_name' 	=> 'Tunggakan',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
			$this->load->library('Configfunction');
			$IdTA = $this->configfunction->getidta();
			$IdTA = $IdTA[0]['ID'];
			$my_data = $this->db->query("SELECT
			saldopembayaran_sekolah.idsaldo,NIS,
			saldopembayaran_sekolah.Noreg,
			(SELECT z.NMSISWA FROM mssiswa z WHERE z.NOREG = saldopembayaran_sekolah.Noreg) AS Namacasis,
			saldopembayaran_sekolah.TotalTagihan,CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.TotalTagihan,2)) as totaltagihan2,
			saldopembayaran_sekolah.Bayar,CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.Bayar,2)) as bayar2,
			saldopembayaran_sekolah.Sisa,CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.Sisa,2)) as sisa2,
			(TA)as tas,
			(SELECT z.THNAKAD FROM tbakadmk z WHERE z.ID=saldopembayaran_sekolah.TA)AS TA
			FROM saldopembayaran_sekolah
			WHERE TA= " . $IdTA . "
			Order by Noreg desc")->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pagekasir/login'); //Memanggil function render_view
		}
	}

	public function generate()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
			$this->load->library('Configfunction');
			$IdTA = $this->configfunction->getidta();
			$idtea = $IdTA[0]['ID'];
			$thnakademik = $IdTA[0]['THNAKAD'];
			$thn = $IdTA[0]['TAHUN'];
			$this->db->query('delete from saldopembayaran_sekolah');
			$calonsiswa = $this->db->query("SELECT NOINDUK,PS, TAHUN, NOREG FROM mssiswa WHERE TAHUN = '$thn' AND NOT EXISTS (SELECT a.Noreg
											FROM saldopembayaran_sekolah a where
											a.Noreg = mssiswa.NOREG) AND PS IS NOT NULL AND TAHUN IS NOT NULL ORDER BY PS,NOREG")->result_array();
			if (count($calonsiswa) > 0) {
				foreach ($calonsiswa as $value) {
					$tarif = $this->db->query("SELECT
					SUM(tarif_berlaku.Nominal)AS total
					FROM tarif_berlaku
					WHERE kodesekolah='$value[PS]' AND `status`='T' AND ThnMasuk='$value[TAHUN]' AND Kodejnsbayar IN('SRG','SPP','KGT','GDG')");
					$n = $tarif->num_rows();
					if ($tarif) {
						$v = $tarif->result_array();
						$vtotal = $v[0]['total'];
						$naikkelas = $this->db->query("SELECT
						baginaikkelas.Kelas,
						baginaikkelas.NIS
						FROM baginaikkelas
						JOIN mssiswa ON baginaikkelas.NIS = mssiswa.NOINDUK
						WHERE baginaikkelas.TA='" . $thnakademik . "'  AND mssiswa.NOREG= $value[NOREG]");
						// print_r($this->db->last_query());exit;
						if (count($naikkelas->result_array()) > 0) {
							$kelas = $naikkelas->result_array();
							$vkelas = $kelas[0]['Kelas'];
							$vnis = $kelas[0]['NIS'];
							$kdsk = "select KDSK from tbps WHERE kdtbps = '".$value['PS']."'";
							$kdsk = $this->db->query($kdsk)->row();
							$bayar = "select sum(Totalbayar) as bayar from pembayaran_sekolah join detail_bayar_sekolah on pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran WHERE NIS = '".$value['NOINDUK']."' and TA= '$thnakademik' AND detail_bayar_sekolah.kodejnsbayar IN('SRG','SPP','KGT','GDG') ";
							$nominal = $this->db->query($bayar)->row();
							if($kdsk==NULL){
								$kdsk = '';
							}else{
								$kdsk = $kdsk->KDSK;
							}
							// print_r(json_encode($kdsk));exit;
							if ($vkelas == '') {
								if ($value['PS'] == '1') {
									$t_kelas = 1;
								}else if($kdsk = '2'){
									$t_kelas = 1;
								}else if($kdsk = '3'){
									$t_kelas = 7;
								}else if($kdsk = '2'){
									$t_kelas = 10;
								} else {
									$t_kelas = 0;
								}
							} else {
								$t_kelas = $vkelas;
							}
							$vsisa = $vtotal - $nominal->bayar;
							$data = array(
								'NIS' => $vnis,
								'Noreg' => $value['NOREG'],
								'TotalTagihan' => $vtotal,
								'TA' => $idtea,
								'Bayar' => $nominal->bayar,
								'Sisa' => $vsisa,
								'Kelas' => $t_kelas,
								'createdAt' => date('Y-m-d H:i:s')
							);

							// print_r($data);

							$insert = $this->model_tunggakan->insert($data, 'saldopembayaran_sekolah');	
							
						} 
					}
				}
				echo json_encode(true);	
			} else {
				echo json_encode(false);
			}
		} else {
			$this->load->view('pagekasir/login'); //Memanggil function render_view
		}
	}
}
