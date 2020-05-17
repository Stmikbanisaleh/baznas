<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_ruangan');
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page

    }

    public function index()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data = array(
                'page_content'  => 'ruangan/view',
                'ribbon'        => '<li class="active">Ruangan</li>',
                'page_name'     => 'Ruangan'
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $my_data = $this->model_ruangan->viewOrdering('msruang', 'id', 'asc')->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil_byid()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data = array(
                'id'  => $this->input->post('id'),
            );
            $my_data = $this->model_ruangan->view_where('msruang', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data_id = array(
                'RUANG'  => $this->input->post('ruang'),
            );
            $count_id = $this->model_ruangan->view_count('msruang', $data_id);
            if ($count_id < 1) {
                $data = array(
                    'RUANG'  => $this->input->post('ruang'),
                    'GEDUNG'  => $this->input->post('gedung'),
                    'LANTAI'  => $this->input->post('lantai'),
                    'PROJECTOR'  => $this->input->post('projector'),
                    'LUAS'  => $this->input->post('luas'),
                    'FUNGSI'  => $this->input->post('fungsi'),
                    'JUMKURSI'  => $this->input->post('kursi'),
                    'KETERANGAN'  => $this->input->post('keterangan'),
                    'STATUS'  => $this->input->post('aktif'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->model_ruangan->insert($data, 'msruang');
                echo json_encode($action);
            } else {
                echo json_encode(401);
            }
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function update()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data_id = array(
                'ID'  => $this->input->post('e_id')
            );
            $data = array(
                'RUANG'  => $this->input->post('e_ruang'),
                'GEDUNG'  => $this->input->post('e_gedung'),
                'LANTAI'  => $this->input->post('e_lantai'),
                'PROJECTOR'  => $this->input->post('e_projector'),
                'LUAS'  => $this->input->post('e_luas'),
                'FUNGSI'  => $this->input->post('e_fungsi'),
                'JUMKURSI'  => $this->input->post('e_kursi'),
                'KETERANGAN'  => $this->input->post('e_keterangan'),
                'STATUS'  => $this->input->post('e_aktif'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_ruangan->update($data_id, $data, 'msruang');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function delete()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data_id = array(
                'ID'  => $this->input->post('id')
            );
            $data = array(
                'isdeleted'  => 1,
            );
            $action = $this->model_ruangan->update($data_id, $data, 'msruang');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
}
