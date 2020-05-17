<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_menu');
        $this->load->model('model_pengguna');

    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page

    }

    public function index()
    {
        $mypengguna = $this->model_pengguna->view('mspengguna')->result_array();
        $data = array(
            'page_content'  => 'menu/view',
            'ribbon'        => '<li class="active">Menu</li>',
            'page_name'     => 'Menu',
            'mypengguna'    => $mypengguna

        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_menu->viewOrdering('sys_menu', 'id', 'asc')->result();
        echo json_encode($my_data);
    }

    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_menu->view_where('sys_menu', $data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $data_id = array(
            'NAMA'  => $this->input->post('nama'),
        );
        $count_id = $this->model_menu->view_count('sys_menu', $data_id);
        if ($count_id < 1) {
            $data = array(
                'NAMA'  => $this->input->post('nama'),
                'URUT'  => $this->input->post('urut'),
                'BLOKIR'  => $this->input->post('status'),
                'PENGGUNA'  => $this->input->post('pengguna'),
                'ALAMAT'  => $this->input->post('link'),
                'JENIS'  => $this->input->post('jenis'),
                'createdAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_menu->insert($data, 'sys_menu');
            echo json_encode($action);
        } else {
            echo json_encode(401);
        }
    }

    public function update()
    {
        $data_id = array(
            'ID'  => $this->input->post('e_id')
        );
        $data = array(
            'NAMA'  => $this->input->post('e_nama'),
            'URUT'  => $this->input->post('e_urut'),
            'BLOKIR'  => $this->input->post('e_status'),
            'PENGGUNA'  => $this->input->post('e_pengguna'),
            'ALAMAT'  => $this->input->post('e_link'),
            'JENIS'  => $this->input->post('e_jenis'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_menu->update($data_id, $data, 'sys_menu');
        echo json_encode($action);
    }

    public function delete()
    {
        $data_id = array(
            'ID'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_menu->update($data_id, $data, 'sys_menu');
        echo json_encode($action);
    }
}
