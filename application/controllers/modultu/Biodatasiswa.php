<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodatasiswa extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/biodatasiswa/view',
        			'ribbon' 		=> '<li class="active">Biodata Siswa</li><li>Sample</li>',
					'page_name' 	=> 'Biodata Siswa',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}