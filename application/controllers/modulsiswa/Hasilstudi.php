<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasilstudi extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('modulsiswa/model_hasil');
    }

	function render_view($data) {
        $this->template->load('templatesiswa', $data); //Display Page
       
    }

	public function index() {
        $data = array(
            'page_content' 	=> '../pagesiswa/hasilstudi/view',
            'ribbon' 		=> '<li class="active">Hasil Studi</li>',
            'page_name' 	=> 'Hasil Studi',
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $nip = $this->session->userdata('nis');
        $my_data = $this->model_hasil->view($nip)->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_biodata->view_where('sys_config',$data)->result();
        echo json_encode($my_data);
    }

    public function update()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'apps_name'  => $this->input->post('e_appsname'),
            'address'  => $this->input->post('e_alamat'),
            'email'  => $this->input->post('e_email'),
            'name_school'  => $this->input->post('e_sekolah'),
            'url'  => $this->input->post('e_url'),
            'satker'  => $this->input->post('e_satker'),
            'facebook'  => $this->input->post('e_facebook'),
            'google'  => $this->input->post('e_google'),
            'tweeter'  => $this->input->post('e_tweeter'),
            'no_telp'  => $this->input->post('e_telp'),
            'meta_deskripsi'  => $this->input->post('e_deskripsi'),
            'meta_keyword'  => $this->input->post('e_keyword'),
            'favicon'  => $this->input->post('e_favicon'),
            'directory'  => $this->input->post('e_folder'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_biodata->update($data_id,$data,'sys_config');
        echo json_encode($action);
        
    }

}