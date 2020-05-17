<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/tagihan/view',
        			'ribbon' 		=> '<li class="active">Tagihan</li><li>Sample</li>',
					'page_name' 	=> 'Tagihan',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}