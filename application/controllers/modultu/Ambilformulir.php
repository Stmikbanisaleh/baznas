<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambilformulir extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/ambilformulir/view',
        			'ribbon' 		=> '<li class="active">Pengambilan Formulir</li><li>Sample</li>',
					'page_name' 	=> 'Pengambilan formulir',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}