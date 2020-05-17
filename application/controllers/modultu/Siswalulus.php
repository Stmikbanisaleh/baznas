<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswalulus extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/siswalulus/view',
        			'ribbon' 		=> '<li class="active">Pernyataan Siswa Lulus</li><li>Sample</li>',
					'page_name' 	=> 'Pernyataan Siswa Lulus',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}