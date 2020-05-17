<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_jadwal');
        if (
            empty($this->session->userdata('username'))
            && empty($this->session->userdata('nama'))
            && $this->session->userdata('level') != 'operator'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page

    }

    public function search()
    {
        $tahun = $this->input->post('tahun');
        $programsekolah = $this->input->post('programsekolah');
        $result = $this->model_jadwal->getjadwal($tahun, $programsekolah)->result();
        echo json_encode($result);
    }

    public function showguru()
    {
        $ps = $this->input->post('ps');
        $data = array('KDTBPS' => $ps);
        $sekolah = $this->model_jadwal->viewWhereOrdering('tbps', $data, 'id', 'asc')->result_array();
        $data = array('GuruBase' => $sekolah[0]['KDSK']);
        $my_data = $this->model_jadwal->viewWhereOrdering('tbguru', $data, 'id', 'asc')->result_array();
        echo "<option value='0'>--Pilih Guru --</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['IdGuru'] . "'>[" . $value['GuruNama'] . "] </option>";
        }
    }

    public function showmapel()
    {
        $ps = $this->input->post('ps');
        $data = array('PS' => $ps);
        $my_data = $this->model_jadwal->viewWhereOrdering('mspelajaran', $data, 'id_mapel', 'asc')->result_array();
        echo "<option value='0'>--Pilih Mapel --</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['id_mapel'] . "'>[" . $value['nama'] .'-'. $value['kode']."] </option>";
        }
    }

    public function index()
    {
        // $myguru = $this->model_jadwal->viewOrdering('tbguru', 'id', 'asc')->result_array();
        $myhari = $this->model_jadwal->viewOrdering('tbhari', 'id', 'asc')->result_array();
        $mytahun = $this->model_jadwal->gettahun()->result_array();
        $myps = $this->model_jadwal->getsekolah()->result_array();
        $myruang = $this->model_jadwal->viewOrdering('msruang', 'ID', 'asc')->result_array();
        $mykelas = $this->model_jadwal->viewOrdering('tbkelas', 'id_kelas', 'asc')->result_array();
        $mymapel = $this->model_jadwal->viewOrdering('mspelajaran', 'id_mapel', 'asc')->result_array();

        $data = array(
            'page_content'  => 'jadwal/view',
            'ribbon'        => '<li class="active">Master Jadwal</li>',
            'page_name'     => 'Master Jadwal',
            'mytahun'        => $mytahun,
            'myps'            => $myps,
            'myhari'        => $myhari,
            'myruang'        => $myruang,
            'mymapel'       => $mymapel,
            'mykelas'   => $mykelas
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = '';
        echo json_encode($my_data);
    }

    public function import()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $id = $this->input->post('e_id');
            $this->load->library('Configfunction');
            $tampil_thnakad = $this->configfunction->getthnakd();
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
                    $arrayCustomerQuote = array(
                        'id_jadwal' => $id,
                        'periode' => $tampil_thnakad[0]['THNAKAD'],
                        'NIS' => $value[0],
                        'createdAt'    => date('Y-m-d H:i:s')
                    );
                    $result = $this->model_jadwal->insert($arrayCustomerQuote, 'tbkrs');
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

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_jadwal->view_where('tbjadwal', $data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $this->load->library('Configfunction');
        $tampil_thnakad = $this->configfunction->getthnakd();
        if(empty($tampil_thnakad)){
            echo json_encode(400);
        } else {
            $data = array(
                'ps'  => $this->input->post('programsekolahs'),
                'id_mapel'  => $this->input->post('mataajar'),
                'id_ruang'  => $this->input->post('ruang'),
                'id_guru'  => $this->input->post('guru'),
                'hari'  => $this->input->post('hari'),
                'jam'  => $this->input->post('jam'),
                'nmklstrjdk'  => $this->input->post('kelas'),
                'periode'  => $tampil_thnakad[0]['THNAKAD'],
                'semester'  => $tampil_thnakad[0]['SEMESTER'],
                'createdAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_jadwal->insert($data, 'tbjadwal');
            echo json_encode($action);
        }

    }

    public function update()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'nama'  => $this->input->post('e_nama'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_jadwal->update($data_id, $data, 'tbjadwal');
        echo json_encode($action);
    }

    public function delete()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
       
        $action = $this->model_jadwal->delete($data_id, 'tbjadwal');
        echo json_encode($action);
    }
}
