<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imp_kelas extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/imp_kelas/view',
        			'ribbon' 		=> '<li class="active">Import Penentuan Kelas</li><li>Sample</li>',
					'page_name' 	=> 'Import Penentuan Kelas',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}