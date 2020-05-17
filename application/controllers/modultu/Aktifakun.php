<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifakun extends CI_Controller {

	function render_view($data) {
        $this->template->load('templatetu', $data); //Display Page
    }

	public function index() {
        $data = array(
        			'page_content' 	=> '../pagetu/aktifakun/view',
        			'ribbon' 		=> '<li class="active">Aktivasi Akun</li>',
					'page_name' 	=> 'Aktivasi Akun',
        		);
        $this->render_view($data); //Memanggil function render_view
    }
}