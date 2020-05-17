<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihanpembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/model_tagihan');
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
            'page_content'  => '../pagekasir/tagihanpembayaransiswa/view',
            'ribbon'        => '<li class="active">Tagihan Pembayaran Siswa</li>',
            'page_name'     => 'Tagihan Pembayaran Siswa',
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function search()
    {
        $nis = $this->input->post('nis');
        $result = $this->model_tagihan->getnis($nis)->result();
        echo json_encode($result);
    }

    public function import()
    {
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
                    'NOINDUK' => $value[0],
                    'NOREG' => $value[1],
                    'NMSISWA' => $value[2],
                    'TPLHR' => $value[3],
                    'TGLHR' => $value[4],
                    'JK' => $value[5],
                    'AGAMA' => $value[6],
                    'TAHUN' => $value[7],
                    'PS' => $value[8],
                    'KDWARGA' => $value[9],
                    'EMAIL' => $value[10],
                    'TELP' => $value[11],
                    'createdAt'    => date('Y-m-d H:i:s')
                );
                $result = $this->model_siswa->insert($arrayCustomerQuote, 'mssiswa');
            }
        }
        if ($result) {
            $result = 1;
        }

        echo json_encode($result);
    }

    public function tampil()
    {

        $my_data = $this->model_siswa->view('mssiswa', 'id', 'asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {

        $data = array(
            'ID'  => $this->input->post('id'),
        );
        $my_data = $this->model_siswa->view_where('mssiswa', $data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {

        $data_id = array(
            'NOINDUK'  => $this->input->post('no_induk'),
        );
        $count_id = $this->model_siswa->view_count('mssiswa', $data_id);
        if ($count_id < 1) {
            $data = array(
                'NOINDUK'  => $this->input->post('no_induk'),
                'NOREG'  => $this->input->post('noreg'),
                'TGLREG'  => $this->input->post('tglreg'),
                'NMSISWA'  => $this->input->post('nmsiswa'),
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
            $action = $this->model_siswa->insert($data, 'mssiswa');
            echo json_encode($action);
        } else {
            echo json_encode(401);
        }
    }

    public function update()
    {

        $data_id = array(
            'ID'  => $this->input->post('e_id')
        );
        $data = array(
            'NOINDUK'  => $this->input->post('e_no_induk'),
            'NOREG'  => $this->input->post('e_noreg'),
            'TGLREG'  => $this->input->post('e_tglreg'),
            'NMSISWA'  => $this->input->post('e_nmsiswa'),
            'TPLHR'  => $this->input->post('e_tplhr'),
            'TGLHR'  => $this->input->post('e_tglhr'),
            'JK'  => $this->input->post('e_jk'),
            'AGAMA'  => $this->input->post('e_agama'),
            'TAHUN'  => $this->input->post('e_tahun'),
            'PS'  => $this->input->post('e_programsekolah'),
            'KDWARGA'  => $this->input->post('e_kdwarga'),
            'EMAIL'  => $this->input->post('e_email'),
            'TELP'  => $this->input->post('e_telp'),
            'IDUSER'  => $this->session->userdata('nip'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_siswa->update($data_id, $data, 'mssiswa');
        echo json_encode($action);
    }

    public function delete()
    {

        $data_id = array(
            'ID'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_siswa->update($data_id, $data, 'mssiswa');
        echo json_encode($action);
    }
}
