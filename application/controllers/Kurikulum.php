<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('model_kurikulum');

    }

	function render_view($data) {
        $this->template->load('template', $data); //Display Page
       
    }

	public function index() {
        $myps = $this->model_kurikulum->getsekolah()->result_array();
        $mykelas = $this->model_kurikulum->viewOrdering('tbkelas','id_kelas','asc')->result_array();
        $data = array(
                    'page_content'  => 'kurikulum/view',
                    'ribbon'        => '<li class="active">Master Kurikulum</li>',
                    'page_name'     => 'Master Kurikulum',
                    'myps'          => $myps,
                    'mykelas'       => $mykelas
                );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_kurikulum->viewtampil()->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id_mapel'  => $this->input->post('id'),
        );
        $my_data = $this->model_kurikulum->view_where('mspelajaran',$data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $data_id = array(
            'kode'  => $this->input->post('kodematajar')
        );
        $count_id = $this->model_kurikulum->view_count('mspelajaran', $data_id);
        if($count_id<1){
            $data = array(
                'kode'  => $this->input->post('kodematajar'),
                'nama'  => $this->input->post('namamataajar'),
                'semester'  => $this->input->post('semester'),
                'ps'  => $this->input->post('programsekolah'),
                'createdAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_kurikulum->insert($data,'mspelajaran');
            echo json_encode($action);
        }else{
            echo json_encode(401);
        }
        
    }

    public function update()
    {
        $data_id = array(
            'id_mapel'  => $this->input->post('e_id')
        );
        $data = array(
            'kode'  => $this->input->post('e_kodematajar'),
            'nama'  => $this->input->post('e_namamataajar'),
            'jam'  => $this->input->post('e_jam'),
            'semester'  => $this->input->post('e_semester'),
            'ps'  => $this->input->post('e_programsekolah'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_kurikulum->update($data_id,$data,'mspelajaran');
        echo json_encode($action);
        
    }

    public function delete()
    {
        $data_id = array(
            'id_mapel'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_kurikulum->update($data_id,$data,'mspelajaran');
        echo json_encode($action);
        
    }
}