<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }

        $this->load->model('akunting/model_dashboard');
    }

    function render_view($data)
    {
        $this->template->load('templateakunting', $data); //Display Page
    }

    public function index()
    {
        $data = array(
            'page_content' 	=> 'dashboard',
            'ribbon' 		=> '<li class="active">Dashboard</li>',
            'page_name' 	=> 'Dashboard',
        );
        $this->render_view($data); //Memanggil function render_view
    }
}
