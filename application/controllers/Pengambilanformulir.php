<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengambilanformulir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_pengambilanformulir');
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page
    }

    public function index()
    {
        $this->load->library('Configfunction');
        $tampil_thnakad = $this->configfunction->getthnakd();
        $mysekolah = $this->model_pengambilanformulir->getsekolah($tampil_thnakad[0]['THNAKAD'])->result_array();
        $my_thnakad3 = $this->model_pengambilanformulir->get_thnakad3()->result_array();
        $data = array(
            'page_content'     => 'pengambilanformulir/view',
            'ribbon'         => '<li class="active">Dashboard</li><li>Master Pengambilan Formulir</li>',
            'page_name'     => 'Master Pengambilan Formulir',
            'js'             => 'js_file',
            'mysekolah'     => $mysekolah,
            'my_thnakad3'   => $my_thnakad3,
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function simpan()
    {
        $tahun = date("Y");
        $idtarifq = $this->model_pengambilanformulir->getidtarif($this->input->post('sekolah'))->result_array();
        $data = array(
            'Noreg'  => $this->input->post('noreg'),
            'tglentri'  => date('Y-m-d H:i:s'),
            'useridd'  => $this->session->userdata('nip'),
            'TotalBayar'  => $this->input->post('nominal_v'),
            'kodesekolah'  => $this->input->post('sekolah'),
            'TA' => $this->input->post('tahunakademik'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $insert = $this->model_pengambilanformulir->insert($data, 'pembayaran_sekolah');
        $id_result = $this->db->insert_id();
        if ($insert) {
            $data_detail = array(
                'Nopembayaran' => $id_result,
                'kodejnsbayar' => 'FRM',
                'idtarif'      => $idtarifq[0]['idtarif'],
                'nominalbayar' => $this->input->post('nominal_v')
            );
            $insert_detail = $this->model_pengambilanformulir->insert($data_detail, 'detail_bayar_sekolah');
            if ($insert_detail) {
                $data_calon = array(
                    'Noreg' => $this->input->post('noreg'),
                    'Namacasis' => strtoupper($this->input->post('nama')),
                    'thnmasuk' => $tahun,
                    'kodesekolah'  => $this->input->post('sekolah'),
                    'tglentri' => date('Y-m-d H:i:s'),
                    'userentri' => $this->session->userdata('kodekaryawan')
                );
                $insertcalon = $this->model_pengambilanformulir->insert($data_calon, 'calon_siswa');
                echo json_encode($insertcalon);
            }
        }
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_pengambilanformulir->view_where('jenjang', $data)->result();
        echo json_encode($my_data);
    }

    public function tampil()
    {
        $this->load->library('Configfunction');
        $tampil_thnakad = $this->configfunction->getthnakd();
        $my_data = $this->model_pengambilanformulir->getdata($tampil_thnakad[0]['THNAKAD'])->result_array();
        echo json_encode($my_data);
    }

    public function update_jenjang()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'jenjang'  => $this->input->post('e_jenjang'),
        );
        $action = $this->model_pengambilanformulir->update($data_id, $data, 'jenjang');
        echo json_encode($action);
    }

    public function delete()
    {
        $data_id = array(
            'Noreg'  => $this->input->post('id')
        );
        $nopembayaran = $this->model_pengambilanformulir->getnopembayaran($data_id['Noreg'], 'pembayaran_sekolah')->result_array();
        if ($nopembayaran) {
            $deletedetail = $this->model_pengambilanformulir->deletedetail($nopembayaran[0]['Nopembayaran']);
            if ($deletedetail) {
                $deletpembayaran = $this->model_pengambilanformulir->deletepembayaransekolah($data_id['Noreg']);
                if ($deletpembayaran) {
                    $deletecalon = $this->model_pengambilanformulir->deletecalonsiswa($data_id['Noreg']);
                    echo json_encode($deletecalon);
                }
            }
        }
    }

    public function cetak()
    {
        $this->load->library('Configfunction');
        $sysconfig = $this->configfunction->get_sysconfig();
        $data = array(
            'my_sysconfig' => $sysconfig,
        );
        $this->load->view('page/pengambilanformulir/print', $data); //Memanggil function render_view
    }
}
