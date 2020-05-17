<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/tentang/view',
        			'ribbon' 		=> '<li class="active">Tentang Aplikasi</li><li>Sample</li>',
					'page_name' 	=> 'Tentang Aplikasi',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}