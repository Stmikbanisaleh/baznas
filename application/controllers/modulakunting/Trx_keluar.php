<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trx_keluar extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_trx_keluar');
        if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
    }

    function render_view($data) {
        $this->template->load('templateakunting', $data); //Display Page
    }

    public function index() {
        $mytrx = $this->model_trx_keluar->view_jenis_trx()->result_array();
        $dk = $this->model_trx_keluar->view_dk(9)->result_array();

        $data = array(
         'page_content' 	=> '../pageakunting/trx_keluar/view',
         'ribbon' 		=> '<li class="active">Transaksi Pengeluaran</li>',
         'page_name' 	=> 'Transaksi Pengeluaran',
         'mytrx'         => $mytrx,
         'dk'            => $dk,
                    // 'mytransaksi'   => $mytransaksi,
     );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_trx_keluar->view_transaksi()->result();
        echo json_encode($my_data);
    }

    public function simpan(){
        $query="SELECT
        jurnal.kode_jurnal
        FROM
        parameter
        INNER JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal";  
        $cari1 = $this->db->query($query)->row();

            $v_kode_jurnal= $cari1->kode_jurnal;

        if(!empty($this->input->post('jenis'))){

            $date=date_create($this->input->post('tgl'));
            $v_date=date_format($date,"Y-m-d");
            $v_d=date_format($date,"Y");
            $v_bln=date_format($date,"m");
            $s_bln = ltrim($v_bln, '0');

            if($this->input->post('dk')=="K"){
                $dk = 'D';
            }else{
                $dk = 'K';
            }

            $data = array(
                    'no_rek'    => $v_kode_jurnal,
                    'Tgl_bukti' => $v_date,
                    'No_bukti'  => $this->input->post('no_bukti'),
                    'Ket'       => $this->input->post('ket'),
                    'Nilai'     => $this->input->post('nominal_v'),
                    'DK'        => $dk,
                );
            $action = $this->model_trx_keluar->insert($data, 'transaksi_buk');
            $data = array(
                    'no_rek'    => $this->input->post('jenis'),
                    'Tgl_bukti' => $v_date,
                    'No_bukti'  => $this->input->post('no_bukti'),
                    'Ket'       => $this->input->post('ket'),
                    'Nilai'     => $this->input->post('nominal_v'),
                    'DK'        => $this->input->post('dk'),
                );

            $action = $this->model_trx_keluar->insert($data, 'transaksi_buk');

            $query="SELECT * FROM transaksi_buk WHERE No_bukti='".$this->input->post('no_bukti')."'";
            $hasil = $this->db->query($query)->result_array();
            
            foreach ($hasil as $r){
                $query="SELECT COUNT(*)as jmlh,
                Debet01,
                Debet02,
                Debet03,
                Debet04,
                Debet05,
                Debet06,
                Debet07,
                Debet08,
                Debet09,
                Debet10,
                Debet11,
                Debet12,
                Kredit01,
                Kredit02,
                Kredit03,
                Kredit04,
                Kredit05,
                Kredit06,
                Kredit07,
                Kredit08,
                Kredit09,
                Kredit10,
                Kredit11,
                Kredit12 FROM posting WHERE THN= ".$v_d." AND no_jurnal='".$r['no_rek']."'"; 
                $row = $this->db->query($query)->row();

                    $v_jmlh = $row->jmlh;     
                    $v_Debet[1] = $row->Debet01;  
                    $v_Debet[2] = $row->Debet02;  
                    $v_Debet[3] = $row->Debet03;  
                    $v_Debet[4] = $row->Debet04;  
                    $v_Debet[5] = $row->Debet05;  
                    $v_Debet[6] = $row->Debet06;  
                    $v_Debet[7] = $row->Debet07;  
                    $v_Debet[8] = $row->Debet08;  
                    $v_Debet[9] = $row->Debet09;  
                    $v_Debet[10] = $row->Debet10;  
                    $v_Debet[11] = $row->Debet11;  
                    $v_Debet[12] = $row->Debet12; 
                    $v_Kredit[1] = $row->Kredit01;      
                    $v_Kredit[2] = $row->Kredit02;      
                    $v_Kredit[3] = $row->Kredit03;      
                    $v_Kredit[4] = $row->Kredit04;      
                    $v_Kredit[5] = $row->Kredit05;      
                    $v_Kredit[6] = $row->Kredit06;      
                    $v_Kredit[7] = $row->Kredit07;      
                    $v_Kredit[8] = $row->Kredit08;      
                    $v_Kredit[9] = $row->Kredit09;      
                    $v_Kredit[10] = $row->Kredit10;     
                    $v_Kredit[11] = $row->Kredit11;     
                    $v_Kredit[12] = $row->Kredit12;             
                // }
                if($v_jmlh==0){

                    if($r['DK']=="K"){
                        $sql1="INSERT INTO posting(
                        THN,
                        no_jurnal,
                        Kredit".$v_bln.") 
                        VALUES('".$v_d."','".$r['no_rek']."','".$r['Nilai']."')";                   
                    }else{
                        $sql1="INSERT INTO posting(
                        THN,
                        no_jurnal,
                        Debet".$v_bln.") 
                        VALUES('".$v_d."','".$r['no_rek']."','".$r['Nilai']."')";   
                    } 

                    $this->db->query($sql1);

                }elseif($v_jmlh==1){

                    if($r['DK']=="K"){
                        $f_kredit=$v_Kredit[$s_bln];
                        $s_kredit=$f_kredit+$r['Nilai'];
                        $sql3="update posting set
                        Kredit".$v_bln."='".$s_kredit."'
                        WHERE THN=$v_d AND no_jurnal=".$r['no_rek'];

                        $this->db->query($sql3);
                    }else{
                        $f_Debet=$v_Debet[$s_bln];
                        $s_Debet=$f_Debet+$r['Nilai'];
                        $sql3="update posting set
                        Debet".$v_bln."='$s_Debet'
                        WHERE THN=".$v_d." AND no_jurnal=".$r['no_rek'];
                        $action = $this->db->query($sql3);
                    }
                }
            }
        }
        echo json_encode($action);
        
    }

    public function delete()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        
        $action = $this->model_trx_keluar->delete($data_id, 'transaksi_buk');
        echo json_encode($action);
    }
}