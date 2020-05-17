<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayarsiswa extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_surattagihan');
        $this->load->model('kasir/model_bayarsiswa');
        $this->load->library('mainfunction');
        $this->load->library('Configfunction');
        if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulkasir/dashboard/login');
        }
    }

    function render_view($data) {
        $this->template->load('templatekasir', $data); //Display Page
    }

    public function index() {
        $my_siswa = $this->model_surattagihan->view('mssiswa')->result_array();
        $my_kelas = $this->model_surattagihan->view('tbkelas')->result_array();
        $data = array(
         'page_content' 	=> '../pagekasir/bayarsiswa/view',
         'ribbon' 		=> '<li class="active">Pembayaran Siswa</li>',
         'page_name' 	=> 'Pembayaran Siswa',
         'my_siswa'      => $my_siswa,
         'my_kelas'     => $my_kelas
     );
        $this->render_view($data); //Memanggil function render_view
    }

    public function view_tagihan()
    {
        $tampil_thnakad = $this->configfunction->getthnakd();
        $thnakad = $tampil_thnakad[0]['THNAKAD'];
        $siswa = $this->input->post('siswa');
        $kelas = $this->input->post('kelas');
        $result = $this->model_bayarsiswa->view_tagihan($siswa, $kelas, $thnakad)->result();
        if(count($result) > 0){
            echo json_encode($result);
        } else {
            echo json_encode(0);
        }
    }

    public function search()
    {
        $siswa = $this->input->post('siswa');
        $kelas = $this->input->post('kelas');
        $result = $this->model_bayarsiswa->pembsis_detail($siswa, $kelas)->result();
        echo json_encode($result);
    }

    public function search_pemb_sekolah()
    {
        $siswa = $this->input->post('siswa');
        $kelas = $this->input->post('kelas');
        $result = $this->model_bayarsiswa->pemb_sekolah($siswa, $kelas)->result();
        echo json_encode($result);
    }

    public function search_pemb_sekolah_q2()
    {
        $siswa = $this->input->post('siswa');
        $kelas = $this->input->post('kelas');
        $result = $this->model_bayarsiswa->pemb_sekolah_q2($siswa, $kelas)->result();
        echo json_encode($result);
    }

    public function print2(){
        $this->load->library('pdf');
        $tampil_thnakad = $this->configfunction->getthnakd();
        $thnakad = $tampil_thnakad[0]['THNAKAD'];
        $data = array(
            'ThnAkademik'         => $thnakad,
        );


        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Rekap-Pembayaran.pdf";
        $this->pdf->load_view('pagekasir/bayarsiswa/laporan', $data);
    }

    public function insert(){
            $tampil_thnakad = $this->configfunction->getthnakdkeuangan();
            $thnakad = $tampil_thnakad[0]['THNAKAD'];

            $tot = $this->input->post('spp') + $this->input->post('gedung') + $this->input->post('seragam') + $this->input->post('kegiatan');
            // print_r(json_encode($tot));exit;
            $ss = $this->input->post('sisa')-$tot;
            // print_r(json_encode($this->input->post('sisa')));exit;
            $nis = $this->input->post('NIS');
            $kelas = $this->input->post('Kelas');
            $data = array(
                'NIS'           => $this->input->post('NIS'),
                'Noreg'         => $this->input->post('Noreg'),
                'Kelas'         => $this->input->post('Kelas'),
                'tglentri'      => date('Y-m-d H:i:s'),
                'useridd'       => $this->session->userdata('kodekaryawan'),
                'TotalBayar'    => $tot,
                'kodesekolah'   => $this->input->post('kodesekolah'),
                'TA'            => $thnakad,
            );
            $action = $this->db->insert('pembayaran_sekolah',$data);
            $id = $this->db->insert_id();
            if($this->input->post('spp') > 0 ){
                $ins1 = array(
                    'Nopembayaran'           => $id,
                    'kodejnsbayar'         => 'SPP',
                    'idtarif'      => $this->input->post('idtarif_spp'),
                    'nominalbayar'       => $this->input->post('spp'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->db->insert('detail_bayar_sekolah',$ins1);
            }


            if($this->input->post('gedung') > 0){
                $ins2 = array(
                    'Nopembayaran'           => $id,
                    'kodejnsbayar'         => 'GDG',
                    'idtarif'      => $this->input->post('idtarif_gdg'),
                    'nominalbayar'       => $this->input->post('gedung'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->db->insert('detail_bayar_sekolah',$ins2);
            }

            if($this->input->post('seragam') > 0){
                $ins3 = array(
                    'Nopembayaran'           => $id,
                    'kodejnsbayar'         => 'SRG',
                    'idtarif'      => $this->input->post('idtarif_srg'),
                    'nominalbayar'       => $this->input->post('seragam'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->db->insert('detail_bayar_sekolah',$ins3);
            }

            if($this->input->post('kegiatan') > 0){
                $ins4 = array(
                    'Nopembayaran'           => $id,
                    'kodejnsbayar'         => 'KGT',
                    'idtarif'      => $this->input->post('idtarif_kgt'),
                    'nominalbayar'       => $this->input->post('kegiatan'),
                );
                $action = $this->db->insert('detail_bayar_sekolah',$ins4);
            }

            $query = "SELECT*FROM saldopembayaran_sekolah WHERE NIS=".$this->input->post('NIS')."  AND Kelas=".$this->input->post('Kelas');
            $q2 = $this->db->query($query)->row();
            $v_TotalTagihan = $q2->TotalTagihan;

            $query = "SELECT SUM(SPP)AS SPP,SUM(GDG)AS GDG,SUM(SRG)AS SRG,SUM(KGT)AS KGT FROM(
                    SELECT
                    (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='SPP')AS SPP,
                    (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='GDG')AS GDG,
                    (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='SRG')AS SRG,
                    (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='KGT')AS KGT
                    FROM
                    pembayaran_sekolah
                    WHERE NIS='".$nis."' AND Kelas='".$kelas."' AND TA='".$thnakad."')AS kl";
            $q3 = $this->db->query($query)->row();
            // print_r(json_encode($q3));exit;

            $t_SPP = $q3->SPP;
            $t_GDG = $q3->GDG;
            $t_SRG = $q3->SRG;
            $t_KGT = $q3->KGT;

            $f_tot = ($t_SPP + $t_GDG + $t_SRG + $t_KGT);
            $v_Sisa = ($v_TotalTagihan) - ($t_SPP + $t_GDG + $t_SRG + $t_KGT);
            $sql = "UPDATE saldopembayaran_sekolah SET
            saldopembayaran_sekolah.Bayar='$f_tot',
            saldopembayaran_sekolah.Sisa='$v_Sisa'
            WHERE 
            saldopembayaran_sekolah.NIS = ".$nis."
            AND saldopembayaran_sekolah.Kelas = ".$kelas;
            $action = $this->db->query($sql);

            if($action){
                $this->session->set_flashdata('cat_success', 'Data Berhasil Disimpan!');
            }else{
                $this->session->set_flashdata('cat_error', 'EROR!!!');
            }

            header("Location: ".base_url()."modulkasir/bayarsiswa");            
            // echo json_encode(true);    
    }

    public function delete()
    {
        $data_id = array(
            'Nopembayaran'  => $this->input->post('id')
        );
        $action = $this->model_bayarsiswa->delete($data_id, 'detail_bayar_sekolah');
        if($action){
            $hasil = $this->model_bayarsiswa->delete($data_id, 'pembayaran_sekolah');
            echo json_encode($hasil);
        }else{
            echo json_encode($action);
        }
    }
}