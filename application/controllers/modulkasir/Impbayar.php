<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Impbayar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('kasir/model_imppembayaran');
		$this->load->model('kasir/model_tarif');
		if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('nama'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('modulkasir/dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('templatekasir', $data); //Display Page
	}

	public function downloadsample()
	{
		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$idtarif = $this->model_imppembayaran->getidtarif()->result_array();
		$data = $idtarif;
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'NIS');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'NOREG');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'NAMA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'KELAS');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'TANGGAL TERIMA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'KODE SEKOLAH');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'TAHUN PENDIDIKAN');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'KODE PEMBAYARAN');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'ID TARIF');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'NOMINAL');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '2019011012');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', '2019011012');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', 'IMAM SATRIANTA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', '5');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', '2019-1-20 (YYYY-MM-DD)');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', '18');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', '2019/2020');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', 'SPP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', '32');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2', '735000');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '2019011013');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', '2019011013');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', 'KRESNO');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', '5');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', '2019-1-20 (YYYY-MM-DD)');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', '18');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3', '2019/2020');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3', 'SPP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3', '32');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J3', '735000');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', '2019011014');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', '2019011014');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C4', 'GUGI');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D4', '5');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E4', '2019-1-20 (YYYY-MM-DD)');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F4', '18');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G4', '2019/2020');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H4', 'SPP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I4', '32');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J4', '735000');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'ID TARIF');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'KODE PEMBAYARAN');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'NAMA JENIS BAYAR');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'SEKOLAH');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'JURUSAN');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', 'TAHUN MASUK');
				foreach ($data as $dataExcel) {
					$idtarif = $dataExcel['idtarif'];
					$ThnMasuk = $dataExcel['ThnMasuk'];
					$kodejnsbayar = $dataExcel['kodejnsbayar'];
					$DESCRTBPS = $dataExcel['DESCRTBPS'];
					$DESCRTBJS = $dataExcel['DESCRTBJS'];
					$namajenisbayar = $dataExcel['namajenisbayar'];


			

					$objPHPExcel->getActiveSheet(0)->getStyle('O' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('O' . $row, $idtarif, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('O')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('P' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('P' . $row, $kodejnsbayar, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('P')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('Q' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Q' . $row, $namajenisbayar, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('Q')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('R' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('R' . $row, $DESCRTBPS, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('R')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('S' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('S' . $row, $DESCRTBJS, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('S')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('T' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('T' . $row, $ThnMasuk, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('T')->setAutoSize(true);
					$row++;
					$no++;
				}
				header('Content-Type: application/vnd.ms-excel; charset=utf-8');
				header('Content-Disposition: attachment; filename=report.xls');
				header('Cache-Control: max-age=0');
				ob_end_clean();
				ob_start();
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$filename = 'Sample'.'csv';
				$objWriter->save('php://output');
			}
		}
	}

	public function index()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
			$sekolah = $this->model_tarif->getsekolah()->result_array();
			$data = array(
				'page_content' 	=> '../pagekasir/impbayar/view',
				'ribbon' 		=> '<li class="active">Import Pembayaran</li>',
				'page_name' 	=> 'Import Pembayaran',
				'sekolah'		=> $sekolah
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pagekasir/login'); //Memanggil function render_view
		}
	}

	public function import()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('nama') != null) {
			$files = $_FILES;
			$file = $files['file'];
			$fname = $file['tmp_name'];
			$file = $_FILES['file']['name'];
			$fname = $_FILES['file']['tmp_name'];
			$ext = explode('.', $file);
			/** Include path **/
			set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
			/** PHPExcel_IOFactory */
			include 'PHPExcel/IOFactory.php';
			$objPHPExcel = PHPExcel_IOFactory::load($fname);
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, false, true);
			$data_exist = [];

			foreach ($allDataInSheet as $ads) {
				if (array_filter($ads)) {
					array_push($data_exist, $ads);
				}
			}
			foreach ($data_exist as $key => $value) {
				if ($key == '0') {
					continue;
				} else {
					if ($value[0] == '') {
					} else {
						$arrayCustomerQuote = array(
							'NIS' => $value[0],
							'Noreg' => $value[1],
							'Kelas' => $value[3],
							'tglentri' => date("Y-m-d", strtotime($value[4])),
							'useridd' => $this->session->userdata('kodekaryawan'),
							'TotalBayar' => $value[9],
							'kodesekolah' => $value[5],
							'TA' => $value[6],
							'createdAt'	=> date('Y-m-d H:i:s')
						);
						$result = $this->model_imppembayaran->insert($arrayCustomerQuote, 'pembayaran_sekolah');
						$id = $this->db->insert_id();
						if ($id) {
							$arrayCustomerQuotedetail = array(
								'Nopembayaran' => $id,
								'kodejnsbayar' => $value[7],
								'idtarif' => $value[8],
								'nominalbayar' => $value[9],
								'createdAt'	=> date('Y-m-d H:i:s')
							);
							$result = $this->model_imppembayaran->insert($arrayCustomerQuotedetail, 'detail_bayar_sekolah');
						}
					}
				}
			}
			if ($result) {
				$result = 1;
			}
			echo json_encode($result);
		} else {
			$result = 0;
			echo json_encode($result);
		}
	}
}
