<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/kelas/view',
        			'ribbon' 		=> '<li class="active">Penentuan Kelas</li><li>Sample</li>',
					'page_name' 	=> 'Penentuan Kelas',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}