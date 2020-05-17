<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends CI_Controller
{
	function render_view($data)
	{
		$this->template->load('error404', $data); //Display Page

	}
	public function index()
	{
		$data = array(
			'page_content'     => 'error404/view',
			'ribbon'         => '<li class="active">Error 404</li>',
			'page_name'     => 'Error 404',
		);
		$this->render_view($data); //Memanggil function render_view
	}
}
