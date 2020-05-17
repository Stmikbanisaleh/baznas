<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_pengeluaran');
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
        $myjurnal = $this->model_pengeluaran->view('jurnal')->result_array();
        $data = array(
        			'page_content' 	=> '../pageakunting/pengeluaran/view',
        			'ribbon' 		=> '<li class="active">Jenis Pengeluaran</li>',
					'page_name' 	=> 'Jenis Pengeluaran',
                    'myjurnal'  => $myjurnal
        		);
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_pengeluaran->view_pengeluaran()->result_array();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $data = array(
            'JnsTransaksi'  => $this->input->post('JnsTransaksi'),
            'no_jurnal'  => $this->input->post('no_jurnal'),
            'NamaTransaksi'  => $this->input->post('NamaTransaksi'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $count_id = $this->model_pengeluaran->view_count('jnstransaksi','JnsTransaksi',  $data['JnsTransaksi']);
        if ($count_id < 1) {
            $result = $this->model_pengeluaran->insert($data, 'jnstransaksi');
            if ($result) {
                echo $result;
            } else {
                echo 'insert gagal';
            }
        } else {
            echo json_encode(401);
        }
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_pengeluaran->view_where('jnstransaksi', $data)->result();
        echo json_encode($my_data);
    }

    public function update()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'JnsTransaksi'  => $this->input->post('e_JnsTransaksi'),
            'no_jurnal'  => $this->input->post('e_no_jurnal'),
            'NamaTransaksi'  => $this->input->post('e_NamaTransaksi'),
            'updatedAt' => date('Y-m-d H:i:s')
        );
        $action = $this->model_pengeluaran->update($data_id, $data, 'jnstransaksi');
        echo json_encode($action);
    }

    public function delete()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_pengeluaran->update($data_id, $data, 'jnstransaksi');
        echo json_encode($action);
    }
}