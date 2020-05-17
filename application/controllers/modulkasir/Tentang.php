<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatekasir', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagekasir/tentang/view',
        			'ribbon' 		=> '<li class="active">Tentang Aplikasi</li>',
					'page_name' 	=> 'Tentang Aplikasi',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}