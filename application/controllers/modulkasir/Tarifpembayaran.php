<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarifpembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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

    public function index()
    {
        $sekolah = $this->model_tarif->getsekolah()->result_array();
        $jenisbayar = $this->model_tarif->viewOrdering('jenispembayaran','Kodejnsbayar','asc')->result_array();
        $data = array(
            'page_content'  => '../pagekasir/tarifpembayaran/view',
            'ribbon'        => '<li class="active">Tarif Pembayaran</li>',
            'page_name'     => 'Master Tarif Pembayaran',
            'sekolah'       => $sekolah,
            'jenisbayar'    => $jenisbayar
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_tarif->getdata()->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'idtarif'  => $this->input->post('id'),
        );
        $my_data = $this->model_tarif->view_where('tarif_berlaku', $data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $data = array(
            'kodesekolah'  => $this->input->post('sekolah'),
            'Kodejnsbayar'  => $this->input->post('kodejenis'),
            'ThnMasuk'  => $this->input->post('tahun'),
            'Nominal'  => $this->input->post('nominal_v'),
            'TA'  => $this->input->post('tahunakad'),
            'tglentri'  => date('Y-m-d H:i:s'),
            'status'  => 'T',
            'userridd'  => $this->session->userdata('kodekaryawan'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tarif->insert($data, 'tarif_berlaku');
        echo json_encode($action);
    }

    public function update()
    {
        $data_id = array(
            'idtarif'  => $this->input->post('e_id')
        );
        $data = array(
            'kodesekolah'  => $this->input->post('e_sekolah'),
            'Kodejnsbayar'  => $this->input->post('e_kodejenis'),
            'ThnMasuk'  => $this->input->post('e_tahun'),
            'Nominal'  => $this->input->post('e_nominal_v'),
            'TA'  => $this->input->post('e_tahunakad'),
            'status'  => $this->input->post('e_status'),
            'userridd'  =>  $this->session->userdata('kodekaryawan'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tarif->update($data_id, $data, 'tarif_berlaku');
        echo json_encode($action);
    }

    public function delete()
    {
        $data_id = array(
            'idtarif'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_tarif->update($data_id, $data, 'tarif_berlaku');
        echo json_encode($action);
    }
}
