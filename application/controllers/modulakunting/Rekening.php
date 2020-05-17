<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_rekening');
        if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
    }

	function render_view($data) {
        $this->template->load('templateakunting', $data); //Display Page
    }

	public function index() {
        $jurnal_jenisrek = array(
            'status'  => 7,
        );
        $jurnal_type = array(
            'status'  => 8,
        );
        $myjenisrek = $this->model_rekening->view_where('msrev', $jurnal_jenisrek)->result_array();
        $mytype = $this->model_rekening->view_where('msrev', $jurnal_type)->result_array();
        $data = array(
        			'page_content' 	=> '../pageakunting/rekening/view',
        			'ribbon' 		=> '<li class="active">Rekening</li>',
					'page_name' 	=> 'Rekening',
                    'myjenisrek'   => $myjenisrek,
                    'mytype'       => $mytype,
        		);
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_rekening->view_rekening()->result_array();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $data = array(
            'kode_jurnal'  => $this->input->post('kode_jurnal'),
            'nama_jurnal'  => $this->input->post('nama_jurnal'),
            'JR'  => $this->input->post('JR'),
            'type'  => $this->input->post('type'),
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $count_id = $this->model_rekening->view_count('jurnal','no_jurnal',  $data['kode_jurnal']);
        if ($count_id < 1) {
            $result = $this->model_rekening->insert($data, 'jurnal');
            if ($result) {
                echo $result;
            } else {
                echo 'insert gagal';
            }
        } else {
            echo json_encode(401);
        }
    }

    public function update()
    {
        $data_id = array(
            'no_jurnal'  => $this->input->post('e_no_jurnal')
        );
        $data = array(
            'kode_jurnal'  => $this->input->post('e_kode_jurnal'),
            'nama_jurnal'  => $this->input->post('e_nama_jurnal'),
            'JR'  => $this->input->post('e_JR'),
            'type'  => $this->input->post('e_type'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_rekening->update($data_id, $data, 'jurnal');
        echo json_encode($action);
    }

    public function tampil_byid()
    {
        $data = array(
            'no_jurnal'  => $this->input->post('id'),
        );
        $my_data = $this->model_rekening->view_where('jurnal', $data)->result();
        echo json_encode($my_data);
    }

    public function delete()
    {
        $data_id = array(
            'no_jurnal'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_rekening->update($data_id, $data, 'jurnal');
        echo json_encode($action);
    }
}