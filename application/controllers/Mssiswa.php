<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mssiswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_mssiswa');
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page
    }

    public function search()
    {
        $noreg = $this->input->post('s_noreg');
        $ta = $this->input->post('ta');
        $sekolah = $this->input->post('sekolah');
        $result = $this->model_mssiswa->getsiswa($noreg, $sekolah)->result();
        // print_r($result);exit;
        echo json_encode($result);
    }

    public function showta()
    {
        $ps = $this->input->post('ps');
        $my_data = $this->model_mssiswa->getta($ps)->result_array();
        echo "<option value='0'>--Pilih Tahun --</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['thn'] . "'>[" . $value['ThnAkademik'] . "] </option>";
        }
    }

    public function index()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $this->load->library('Configfunction');
            $tampil_thnakad = $this->configfunction->getthnakd();
            $mysekolah = $this->model_mssiswa->getsekolah()->result_array();
            $myagama = $this->model_mssiswa->viewOrdering('tbagama', 'KDTBAGAMA', 'desc')->result_array();
            $data = array(
                'page_content'  => 'mssiswa/view',
                'ribbon'        => '<li class="active">Master Siswa</li>',
                'page_name'     => 'Master Siswa',
                'myagama'       => $myagama,
                'mysekolah'     => $mysekolah,
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
    public function export()
    {
        set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
        include 'PHPExcel/IOFactory.php';
        $objPHPExcel = new PHPExcel();
        $ps = $this->input->post('ps');
        $my_pembsiswa = $this->model_mssiswa->exportsiswa($ps)->result_array();
        $data = $my_pembsiswa;
        $no = 1;
        $row = 3;
        if (count($my_pembsiswa) > 0) {
            if (count($data)) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'No');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', 'No Reg');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', 'Tanggal Daftar ');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', 'Jam Daftar');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', 'NIS');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', 'NISN');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', 'Nama Siswa');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', 'Tempat Lahir');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2', 'Tanggal Lahir');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2', 'Jenis Kelamin');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2', 'Agama');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2', 'Anak Ke');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N2', 'Jumlah Saudara');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', 'Status Anak');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', 'Tinggi Badan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q2', 'Berat Badan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('R2', 'Alamat Domisili');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('S2', 'Kota / Kab');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('T2', 'Kode POS');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('U2', 'NO HP');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('V2', 'NIK');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('W2', 'Kendaraan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X2', 'Jarak');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y2', 'Waktu');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z2', 'Asal Sekolah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA2', 'Alamat Sekolah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB2', 'Nama Ayah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC2', 'NIK');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD2', 'Tanggal Lahir Ayah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE2', 'Pendidikan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AF2', 'Penghasilan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AG2', 'Nama Ibu');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AH2', 'NIK');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AI2', 'Tanggal Lahir Ibu');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ2', 'Pendidikan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AK2', 'Penghasilan');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AL2', 'No HP Ayah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AM2', 'Email Ayah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AN2', 'No HP Ibu');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('AO2', 'Email Ibu');
                foreach ($data as $dataExcel) {
                    // print_r($dataExcel['NOINDUK']);exit;
                            // Set to the excel
                    $objPHPExcel->getActiveSheet(0)->getStyle('B' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B' . $row, $no, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('C' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C' . $row, $dataExcel['NOINDUK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('D' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D' . $row, $dataExcel['createdAt'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('E' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('E' . $row, $dataExcel['createdAt'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('F' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('F' . $row, $dataExcel['NOINDUK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('G' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('G' . $row, $dataExcel['NISN'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('H' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('H' . $row, $dataExcel['NMSISWA'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('I' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('I' . $row, $dataExcel['TPLHR'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('J' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('J' . $row, $dataExcel['TGLHR'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('K' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('K' . $row, $dataExcel['JK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('K')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('L' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('L' . $row, $dataExcel['AGAMA'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('L')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('M' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('M' . $row, $dataExcel['ANAKKE'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('M')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('N' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('N' . $row, $dataExcel['JMLSAUDARA'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('N')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('O' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('O' . $row, $dataExcel['STATUSANAK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('O')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('P' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('P' . $row, $dataExcel['TINGGIBADAN'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('P')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('Q' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Q' . $row, $dataExcel['BERATBADAN'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('Q')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('R' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('R' . $row, $dataExcel['ALAMATRUMAH'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('R')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('S' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('S' . $row, $dataExcel['KABUPATEN'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('S')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('T' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('T' . $row, $dataExcel['KDPOS'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('T')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('U' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('U' . $row, $dataExcel['NOHP'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('U')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('V' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('V' . $row, $dataExcel['NIK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('V')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('W' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('W' . $row, $dataExcel['KENDARAAN'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('W')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('X' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('X' . $row, $dataExcel['JARAK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('X')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('Y' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Y' . $row, $dataExcel['WAKTU'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('Y')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('Z' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Z' . $row, $dataExcel['NMASLSKL'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('Z')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AA' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AA' . $row, $dataExcel['ALMASLSKL'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AA')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AB' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AB' . $row, $dataExcel['NMBAPAK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AB')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AC' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AC' . $row, $dataExcel['NIKBAPAK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AC')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AD' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AD' . $row, $dataExcel['TGLLHRBAPAK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AD')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AE' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AE' . $row, $dataExcel['PENDIDIKANBAPAK'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AE')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AF' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AF' . $row, $dataExcel['GAJIORTU'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AF')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AG' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AG' . $row, $dataExcel['NMIBU'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AG')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AH' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AH' . $row, $dataExcel['NIKIBU'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AH')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AJ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AJ' . $row, $dataExcel['PENDIDIKANIBU'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AJ')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AK' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AK' . $row, $dataExcel['GAJIORTU2'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AK')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AL' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AL' . $row, $dataExcel['HPAYAH'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AL')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AM' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AM' . $row, $dataExcel['EMAIL'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AM')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AN' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AN' . $row, $dataExcel['HPIBU'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AN')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('AO' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AO' . $row, $dataExcel['EMAIL'], PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('AO')->setAutoSize(true);

                    $row++;
                    $no++;
                }

                header('Content-Type: application/vnd.ms-excel; charset=utf-8');
                header('Content-Disposition: attachment; filename=report.xls');
                header('Cache-Control: max-age=0');
                ob_end_clean();
                ob_start();
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                // $filename = 'Report' . $periode_awal . $periode_akhir . 'csv';
                $objWriter->save('php://output');
            }
        }
    }

    public function import()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
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
                    $arrayCustomerQuote2 = array(
                        'Noreg' => $value[0],
                        // 'PASSWORD' => hash('sha512',md5($value[0])),
                        'Namacasis' => $value[2],
                        'tptlhr' => $value[3],
                        'tgllhr' => $value[4],
                        'agama' => $value[6],
                        'thnmasuk' => $value[7],
                        'kodesekolah' => $value[8],
                        'TelpHp' => $value[11],
                        'createdAt'    => date('Y-m-d H:i:s')
                    );
                    $result = $this->model_mssiswa->insert($arrayCustomerQuote2, 'calon_siswa');
                }
            }
            if ($result) {
                $result = 1;
            }

            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $my_data = $this->model_mssiswa->viewOrdering('mssiswa', 'id', 'asc')->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil_byid()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $noreg = array(
                'Noreg' => $this->input->get('id')
            );
            $jk = array(
                'status' => 1
            );
            $this->load->library('Configfunction');
            $tampil_thnakad = $this->configfunction->getthnakd();
            $mysekolah = $this->model_mssiswa->getsekolah($tampil_thnakad[0]['THNAKAD'])->result_array();
            $mysiswa = $this->model_mssiswa->view_where('mssiswa', $noreg)->row();
            $myjeniskelamin = $this->model_mssiswa->view_where('msrev', $jk)->result_array();
            $myagama = $this->model_mssiswa->viewOrdering('tbagama', 'KDTBAGAMA', 'desc')->result_array();
            $mytbpk = $this->model_mssiswa->viewOrdering('mspenghasilan', 'IDMSPENGHASILAN', 'desc')->result_array();
            $myjob = $this->model_mssiswa->viewOrdering('mspekerjaan', 'IDMSPEKERJAAN', 'desc')->result_array();
            $mytbkec = $this->model_mssiswa->viewOrdering('tbkec', 'IDKEC', 'desc')->result_array();
            $mytbpro = $this->model_mssiswa->viewOrdering('tbpro', 'KDTBPRO', 'desc')->result_array();
            $mypro = $this->model_mssiswa->getpro()->result_array();
            $data = array(
                'page_content'  => 'mssiswa/edit',
                'ribbon'        => '<li class="active">Biodata Siswa</li>',
                'page_name'     => 'Biodata Siswa',
                'mysiswa'       => $mysiswa,
                'myjeniskelamin' => $myjeniskelamin,
                'myagama'       => $myagama,
                'mysekolah'     => $mysekolah,
                'mytbpk'        => $mytbpk,
                'mytbkec'        => $mytbkec,
                'mytbpro'       => $mytbpro,
                'mypro'         => $mypro,
                'myjob'         => $myjob
            );

            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

            $data_id = array(
                'NOINDUK'  => $this->input->post('no_induk'),
            );
            $count_id = $this->model_mssiswa->view_count('mssiswa', $data_id);
            if ($count_id < 1) {
                $data = array(
                    'NOINDUK'  => $this->input->post('no_induk'),
                    'NOREG'  => $this->input->post('noreg'),
                    'TGLREG'  => $this->input->post('tglreg'),
                    'NMSISWA'  => strtoupper($this->input->post('nmsiswa')),
                    'TPLHR'  => $this->input->post('tplhr'),
                    'TGLHR'  => $this->input->post('tglhr'),
                    'JK'  => $this->input->post('jk'),
                    'AGAMA'  => $this->input->post('agama'),
                    'TAHUN'  => $this->input->post('tahun'),
                    'PS'  => $this->input->post('programsekolah'),
                    'KDWARGA'  => $this->input->post('kdwarga'),
                    'EMAIL'  => $this->input->post('email'),
                    'TELP'  => $this->input->post('telp'),
                    'IDUSER'  => $this->session->userdata('nip'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->model_mssiswa->insert($data, 'mssiswa');
                echo json_encode($action);
            } else {
                echo json_encode(401);
            }
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function update()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

            $data_id = array(
                'NOREG'  => $this->input->post('noreg')
            );
            $noreg = $this->input->post('noreg');
            //file1 photo siswa
            //photoijazah
            //photonem
            $data = array(
                'NOREG'  => $this->input->post('noreg'),
                'NMSISWA'  => $this->input->post('nama'),
                'AGAMA'  => $this->input->post('agama'),
                'JK'  => $this->input->post('jk'),
                'TGLHR'  => $this->input->post('tglhr'),
                'PS'  => $this->input->post('sekolah'),
                'TPLHR'  => $this->input->post('tempat'),
                'NMBAPAK' => $this->input->post('ayah'),
                'GAJIORTU'  => $this->input->post('penghasilan'),
                'NMIBU' => $this->input->post('ibu'),
                'KELURAHAN' => $this->input->post('kelurahan'),
                'KECAMATAN' => $this->input->post('kecamatan'),
                'KABUPATEN' => $this->input->post('kabupaten'),
                'PROVINSI' => $this->input->post('provinsi'),
                'KDPOS'  => $this->input->post('kdpos'),
                'NOHP'  => $this->input->post('nohp'),
                'NMWALI'  => $this->input->post('wali'),
                'NISN'  => $this->input->post('nisn'),
                'PEKERJAANORTU'  => $this->input->post('pekerjaan'),
                'PEKERJAANORTU2'  => $this->input->post('pekerjaan2'),
                'PEKERJAANWALI'  => $this->input->post('pekerjaan3'),
                'ALAMATRUMAH'  => $this->input->post('alamat2'),
                'TLPRUMAH'  => $this->input->post('telprmh'),
                'TLPWALI'  => $this->input->post('telpwali'),
                'NMASLSKL'  => $this->input->post('aslsekolah'),
                'PROVINSISEKOLAHASAL'  => $this->input->post('provinsi2'),
                'KABUPATENSEKOLAHASAL' => $this->input->post('kabupaten2'),
                'KELURAHANSEKOLAHASAL' => $this->input->post('kelurahan2'),
                'KECAMATANSEKOLAHASAL' => $this->input->post('kecamatan2'),
                'ALMASLSKL' => $this->input->post('alamat3'),
                'NOIJAZAH' => $this->input->post('noijazah'),
                'THNMASUKSEKOLAHASAL' => $this->input->post('thnmassuk'),
                'NILNEMASLSKL' => $this->input->post('nem'),
                'ANAKKE' => $this->input->post('anakke'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action2 = $this->model_mssiswa->update($data_id, $data, 'mssiswa');
            $ceksiswa = $this->db->query("select NOREG from mssiswa where NOREG = '$noreg'");
            echo json_encode(1);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function delete()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

            $data_id = array(
                'ID'  => $this->input->post('id')
            );
            $data = array(
                'isdeleted'  => 1,
            );
            $action = $this->model_mssiswa->update($data_id, $data, 'mssiswa');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
}
