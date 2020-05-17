<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buatnis extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/buatnis/view',
        			'ribbon' 		=> '<li class="active">Pembuatan NIS</li><li>Sample</li>',
					'page_name' 	=> 'Pembuatan NIS',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}