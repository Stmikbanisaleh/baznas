<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_bayarsiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_laporan');
        $this->load->library('mainfunction');
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
        $data = array(
            'page_content'     => '../pagekasir/lap_bayarsiswa/view',
            'ribbon'         => '<li class="active">Laporan Pembayaran Siswa</li>',
            'page_name'     => 'Laporan Pembayaran Siswa',
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function laporan_pdf()
    {
        set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
        include 'PHPExcel/IOFactory.php';
        $objPHPExcel = new PHPExcel();
        $this->load->library('Configfunction');
        $sysconfig = $this->configfunction->get_sysconfig();
        $tgl = $this->mainfunction->tgl_indo(date('Y-m-d'));
        $periode_awal = $this->input->post('periode_awal');
        $periode_akhir = $this->input->post('periode_akhir');
        $my_pembsiswa = $this->model_laporan->get_pemb_siswa($periode_awal, $periode_akhir)->result_array();
        $data = $my_pembsiswa;
        $no = 1;
        $row = 3;
        if (count($my_pembsiswa) > 0) {
            if (count($data)) {
                $key = array_keys($data[0]);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'No');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', 'Nomor Bukti');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', 'Sekolah');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', 'Jenis Pembayaran');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', 'Nominal');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', 'Kelas');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', 'Tanggal');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', 'Tahun Pelajaran');

                foreach ($data as $dataExcel) {
                    $total +=  $dataExcel['nominalbayar'];
                    $nobukti = $dataExcel['Nopembayaran'];
                    $sekolah = $dataExcel['kodesekolah'];
                    $jenisbayar = $dataExcel['namajenisbayar'];
                    $nominalbayar = $dataExcel['nominalbayar'];
                    $kelas = $dataExcel['Kelas'];
                    $tanggal = $dataExcel['tglentri'];
                    $ta = $dataExcel['TA'];
                    // Set to the excel
                    $objPHPExcel->getActiveSheet(0)->getStyle('B' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B' . $row, $no, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('C' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C' . $row, $nobukti, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('D' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D' . $row, $sekolah, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('E' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('E' . $row, $jenisbayar, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('F' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('F' . $row, $nominalbayar, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('G' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('G' . $row, $kelas, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('H' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('H' . $row, $tanggal, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setAutoSize(true);

                    $objPHPExcel->getActiveSheet(0)->getStyle('I' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('I' . $row, $ta, PHPExcel_Cell_DataType::TYPE_STRING);
                    $objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setAutoSize(true);
                    $row++;
                    $no++;
                }
                $rows = $row + 2;

                $objPHPExcel->getActiveSheet(0)->getStyle('E'.$rows)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('E'.$rows, 'Total', PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setAutoSize(true);

                $objPHPExcel->getActiveSheet(0)->getStyle('F'.$row + 1)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('F'.$rows, number_format($total, 2), PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setAutoSize(true);

                header('Content-Type: application/vnd.ms-excel; charset=utf-8');
                header('Content-Disposition: attachment; filename=report.xls');
                header('Cache-Control: max-age=0');
                ob_end_clean();
                ob_start();
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $filename = 'Report' . $periode_awal . $periode_akhir . 'csv';
                $objWriter->save('php://output');
            }
        }
    }

    function format_bulan($bulan)
    {
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
