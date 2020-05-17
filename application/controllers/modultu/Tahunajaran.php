<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunajaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('tu/model_tahunajaran');
    }
    function render_view($data)
    {
        $this->template->load('templatetu', $data); //Display Page
    }

    public function index()
    {
        $data = array(
            'page_content'     => '../pagetu/tahunajaran/view',
            'ribbon'         => '<li class="active">Tahun Ajaran</li><li>Sample</li>',
            'page_name'     => 'Tahun Ajaran',
        );
        $this->render_view($data); //Memanggil function render_view
    }
    public function tampil()
    {
        $my_data = $this->model_tahunajaran->viewOrdering('tbakadmk', 'id', 'asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_tahunajaran->view_where('tbakadmk', $data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $data = array(
            'SEMESTER'  => $this->input->post('semester'),
            'TAHUN'  => $this->input->post('tahun'),
            'THNAKAD'  => $this->input->post('tahun_akad'),
            'UTSUAS'  => $this->input->post('uts_uas'),
            'INDEK'  => $this->input->post('indek'),
            'THNDAPODIK'  => $this->input->post('thndapodik'),
            'KDSEKOLAH'  => $this->input->post('kdsekolah'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tahun_akademik->insert($data, 'tbakadmk');
        echo json_encode($action);
    }

    public function update()
    {
        $data_id = array(
            'ID'  => $this->input->post('e_id')
        );
        $data = array(
            'SEMESTER'  => $this->input->post('e_semester'),
            'TAHUN'  => $this->input->post('e_tahun'),
            'THNAKAD'  => $this->input->post('e_tahun_akad'),
            'UTSUAS'  => $this->input->post('e_uts_uas'),
            'INDEK'  => $this->input->post('e_indek'),
            'THNDAPODIK'  => $this->input->post('e_thndapodik'),
            'KDSEKOLAH'  => $this->input->post('e_kdsekolah'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tahun_akademik->update($data_id, $data, 'tbakadmk');
        echo json_encode($action);
    }
}
