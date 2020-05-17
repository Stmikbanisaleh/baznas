<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trx_jurnal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_buk');
        $this->load->model('akunting/model_trx_jurnal');
        if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
    }

    function render_view($data)
    {
        $this->template->load('templateakunting', $data); //Display Page
    }

    public function index()
    {
        $mytahun = $this->model_buk->view_tahun()->result_array();
        $data = array(
            'page_content'     => '../pageakunting/trx_jurnal/view',
            'ribbon'         => '<li class="active">Transaksi Jurnal</li>',
            'page_name'     => 'Transaksi Jurnal',
            'mytahun'       => $mytahun,
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function show_nopem()
    {
        $tahun = $this->input->post('tahun');
        $my_data = $this->model_buk->view_nopembytahun($tahun)->result_array();
        echo "<option value='0'>--Pilih Program--</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['Nopembayaran'] . "'>[" . $value['Nopembayaran'] . "] - " . $value['tglentri'] . "</option>";
        }
    }

    public function tampil()
    {
        $nopembayaran = $this->input->post('nopembayaran');
        $my_data = $this->model_trx_jurnal->view_transaksi($nopembayaran)->result_array();
        echo json_encode($my_data);
    }

    public function getjurnal()
    {
        $jurnal = $this->db->query("SELECT
        jurnal.kode_jurnal,
        jurnal.nama_jurnal,
        parameter.no_parameter
        FROM
        parameter
        INNER JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal");
    }

    public function simpanjurnal()
    {
        $kdo = $this->input->post('kdo'); //Status TRX
        $kod = $this->input->post('kod'); // Kode Jurnal
        $nopem = $this->input->post('nopem'); // Nopembayaran
        if ($kdo == 1) {
            $data = $this->db->query("SELECT * FROM akuntansi WHERE bukti='$nopem'")->result();
            if (empty($data)) {
                $mydata = array(
                    'bukti' => $nopem,
                    'tgl'   => date('Y-m-d'),
                    'jurnal' => $this->input->post('kod'),
                    'tdebet' => $this->input->post('nilai'),
                    'tkredit'   => $this->input->post('nilai_2'),
                    'posting'   => 'T',
                    'userid'    => $this->session->userdata('nip'),
                    'tgl_input' => date('Y-m-d')
                );
                $insert = $this->model_trx_jurnal->insert($mydata, 'akuntansi');
                if ($insert) {
                    $datanya = $this->db->query("SELECT
                    jurnal.kode_jurnal,
                    jurnal.nama_jurnal,
                    (SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.JR AND z.`STATUS`=7) AS JR,
                    (SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.type AND z.`STATUS`=8) AS type,
                    jenispembayaran.Kodejnsbayar,
                    jenispembayaran.namajenisbayar,
                    detail_bayar_sekolah.nominalbayar,
                    pembayaran_sekolah.tglentri,
                    pembayaran_sekolah.NIS,
                    pembayaran_sekolah.Noreg,
                    tbps.DESCRTBPS,
                    tbps.KDTBPS,
                    tbjs.DESCRTBJS,
                    pembayaran_sekolah.Nopembayaran,
                    detail_bayar_sekolah.NodetailBayar,
                    mssiswa.NMSISWA
                    FROM
                    pembayaran_sekolah
                    INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
                    INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
                    INNER JOIN jurnal ON jenispembayaran.no_jurnal = jurnal.no_jurnal
                    INNER JOIN tbps ON pembayaran_sekolah.kodesekolah = tbps.KDTBPS
                    INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS
                    INNER JOIN mssiswa ON pembayaran_sekolah.Noreg = mssiswa.Noreg
                    WHERE pembayaran_sekolah.Nopembayaran='$nopem'
                    ORDER BY pembayaran_sekolah.Nopembayaran")->result_array();
                    if ($datanya) {
                        $datainsert2 = array(
                            'no_akuntansi' => $nopem,
                            'no' => $datanya[0]['NodetailBayar'],
                            'rek' => $datanya[0]['kode_jurnal'],
                            'urai' => $this->input->post('uraian_2'),
                            'dk'   => 'K',
                            'kurs' => 'ID',
                            'nilai' => $datanya[0]['nominalbayar'],
                            'tgl_input' => date('Y-m-d'),
                            'UserId' => $this->session->userdata('nip')
                        );
                        $insert = $this->model_trx_jurnal->insert($datainsert2,'detail_akuntansi');
                        if($insert){
                            $datainsert3 = array(
                                'no_akuntansi' => $nopem,
                                'no' => 0,
                                'rek' => $kod,
                                'urai' => $this->input->post('uraian'),
                                'dk'   => 'D',
                                'kurs' => 'ID',
                                'nilai' => $this->input->post('nilai'),
                                'tgl_input' => date('Y-m-d'),
                                'UserId' => $this->session->userdata('nip')
                            );
                             $insert = $this->model_trx_jurnal->insert($datainsert3,'detail_akuntansi');
                             echo $a="Data Berhasil di Simpan";
                        }
                    }
                }
            }
        } else {
            $sqlkonversi = $this->db->query("DELETE FROM detail_akuntansi WHERE no_akuntansi='$nopem'");
            $sqlkonversi2 = $this->db->query("DELETE FROM akuntansi WHERE bukti='$nopem'");
            echo $a = "Data Berhasil di Batalkan";
        }
    }

    public function proses()
    {
        $period_awal = $this->input->post('periode_awal');
        $period_akhir = $this->input->post('periode_akhir');
        // print_r($this->input->post());exit;

        $hasil_pembsek = $this->model_trx_jurnal->get_pembayaransekolah($period_awal, $period_akhir)->result_array();
        $kd_jurnal = $this->model_trx_jurnal->get_kode_jurnal();
        if(count($hasil_pembsek) > 0){
            foreach($hasil_pembsek AS $row){
                //Insert into akuntansi
                $mydata = array(
                    'bukti' => $row['Nopembayaran'],
                    'tgl'   => $row['tglentri'],
                    'jurnal' => $kd_jurnal,
                    'tdebet' => $row['TotalBayar'],
                    'tkredit'   => $row['TotalBayar'],
                    'posting'   => 'T',
                    'userid'    => $this->session->userdata('nip'),
                    'tgl_input' => $row['tglentri']
                );
                $insert = $this->model_trx_jurnal->insert($mydata, 'akuntansi');
                if ($insert) {
                    $datanya = $this->db->query("SELECT
                    detail_bayar_sekolah.NodetailBayar,
                    jurnal.kode_jurnal,
                    pembayaran_sekolah.tglentri,
                    detail_bayar_sekolah.nominalbayar
                    FROM
                    pembayaran_sekolah
                    INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
                    INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
                    INNER JOIN jurnal ON jenispembayaran.no_jurnal = jurnal.no_jurnal
                    INNER JOIN tbps ON pembayaran_sekolah.kodesekolah = tbps.KDTBPS
                    INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS
                    INNER JOIN mssiswa ON pembayaran_sekolah.Noreg = mssiswa.Noreg
                    WHERE pembayaran_sekolah.Nopembayaran='".$row['Nopembayaran']."'
                    ORDER BY pembayaran_sekolah.Nopembayaran")->result_array();
                    if ($datanya) {
                        $datainsert2 = array(
                            'no_akuntansi' => $row['Nopembayaran'],
                            'no' => $datanya[0]['NodetailBayar'],
                            'rek' => $datanya[0]['kode_jurnal'],
                            'urai' => date('YmdHis'),
                            'dk'   => 'K',
                            'kurs' => 'ID',
                            'nilai' => $datanya[0]['nominalbayar'],
                            'tgl_input' => $datanya[0]['tglentri'],
                            'UserId' => $this->session->userdata('nip')
                        );
                        $insert = $this->model_trx_jurnal->insert($datainsert2,'detail_akuntansi');
                        if($insert){
                            $datainsert3 = array(
                                'no_akuntansi' => $row['Nopembayaran'],
                                'no' => $datanya[0]['NodetailBayar'],
                                'rek' => $kd_jurnal,
                                'urai' => date('YmdHis'),
                                'dk'   => 'D',
                                'kurs' => 'ID',
                                'nilai' => $datanya[0]['nominalbayar'],
                                'tgl_input' => $datanya[0]['tglentri'],
                                'UserId' => $this->session->userdata('nip')
                            );
                            $insert = $this->model_trx_jurnal->insert($datainsert3,'detail_akuntansi');
                        }
                    }
                }
            }
            echo json_encode($insert);
        }else{
            echo json_encode(401); //Tidak ada data yang di proses
        }
    }
}
