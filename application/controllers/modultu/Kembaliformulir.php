<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kembaliformulir extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/kembaliformulir/view',
        			'ribbon' 		=> '<li class="active">Pengembalian Formulir</li><li>Sample</li>',
					'page_name' 	=> 'Pengembalian Formulir',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}