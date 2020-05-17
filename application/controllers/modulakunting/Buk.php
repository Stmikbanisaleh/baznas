<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('akunting/model_buk');
        if (
            empty($this->session->userdata('username_akunting'))
            && empty($this->session->userdata('nip'))
            && $this->session->userdata('level') != 'akunting'
        ) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('modulakunting/login');
        }
    }

    function render_view($data)
    {
        $this->template->load('templateakunting', $data); //Display Page
    }

    public function index()
    {
        $mytahun = $this->model_buk->view_tahun()->result_array();
        $data = array(
            'page_content'     => '../pageakunting/buk/view',
            'ribbon'         => '<li class="active">BUK</li>',
            'page_name'     => 'BUK',
            'mytahun'       => $mytahun,
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $nopembayaran = $this->input->post('nopembayaran');
        if ($nopembayaran == '0') {
            $cp = "WHERE posting='T'";
        } else {
            $cp = "WHERE bukti = '" . $nopembayaran."'";
        }

        $my_data = $this->model_buk->view_buk($cp)->result_array();
        echo json_encode($my_data);
    }

    public function show_nopem()
    {
        $tahun = $this->input->post('tahun');
        $my_data = $this->model_buk->view_nopembytahun($tahun)->result_array();
        echo "<option value='0'>--Pilih Program--</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['Nopembayaran'] . "'>[" . $value['Nopembayaran'] . "] - " . $value['tglentri'] . "</option>";
        }
    }

    public function proses(){
        $a = 0;
        $datee = $this->input->post('p_awal');
        $datee2 = $this->input->post('p_akhir');
        $kdo = 1;
        $date=date_create($datee);
        $v_thn=date_format($date,"Y");
        $date=date_create($datee); 
        // $bukti = $bkt;
        $v_bln=date_format($date,"m");
        $f_bln = $v_bln;
        $s_bln = ltrim($f_bln, '0');

        $query="SELECT a.*,b.tgl FROM detail_akuntansi a join akuntansi b on a.no_akuntansi = b.bukti  WHERE  b.posting = 'T' and a.tgl_input between '$datee' and '$datee2'  ";   
            $hasil = $this->model_buk->dyn_query($query)->result_array();
            // print_r($hasil);exit;
            $no=1;
            foreach ($hasil as $r) {
                $sql="INSERT INTO transaksi_buk(
                transaksi_buk.no_rek,
                transaksi_buk.Tgl_bukti,
                transaksi_buk.No_bukti,
                transaksi_buk.Ket,
                transaksi_buk.Nilai,
                transaksi_buk.DK) 
                VALUES('".$r['rek']."','".$r['tgl']."','".$r['no_akuntansi']."','".$r['urai']."','".$r['nilai']."','".$r['dk']."')";
                $this->model_buk->dyn_query($sql);
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
                Kredit12 FROM posting WHERE THN=$v_thn AND no_jurnal=".$r['rek'];  
                
                    $row = $this->model_buk->dyn_query($query)->row();
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

                if($v_jmlh==0){

                    if($r['dk']=="K"){
                        $sql1="INSERT INTO posting(
                        THN,
                        no_jurnal,
                        Kredit".$v_bln.") 
                        VALUES('".$v_thn."','".$r['rek']."','".$r['nilai']."')";                    
                    }else{
                        $sql1="INSERT INTO posting(
                        THN,
                        no_jurnal,
                        Debet".$v_bln.") 
                        VALUES('".$v_thn."','".$r['rek']."','".$r['nilai']."')";    
                    }

                    $this->model_buk->dyn_query($sql1);

                }elseif($v_jmlh==1){

                    if($r['dk']=="K"){
                        $f_kredit=$v_Kredit[$s_bln];
                        $s_kredit=$f_kredit+$r['nilai'];
                        $sql3="update posting set
                        Kredit".$v_bln."='".$s_kredit."'
                        WHERE THN=".$v_thn." AND no_jurnal='".$r['rek']."'";

                        $this->model_buk->dyn_query($sql3);
                    }else{
                        $f_Debet=$v_Debet[$s_bln];
                        $s_Debet=$f_Debet+$r['nilai'];
                        $sql3="update posting set
                        Debet".$v_bln."='".$s_Debet."'
                        WHERE THN=".$v_thn." AND no_jurnal='".$r['rek']."'";

                        $this->model_buk->dyn_query($sql3);
                    }
                }
                $sql3="update akuntansi set
                posting='Y'
                WHERE bukti='".$r['no_akuntansi']."'";
    
                $this->model_buk->dyn_query($sql3); 
                $a=1;
            }
            echo json_encode($a);
    }

    public function posting(){
        $datee = $this->input->post('tgl');
        $bkt = $this->input->post('bukti');
        $kdo = 1;
        $date=date_create($datee);
        $v_thn=date_format($date,"Y");
        $date=date_create($datee); 
        $bukti = $bkt;
        $v_bln=date_format($date,"m");
        $f_bln = $v_bln;
        $s_bln = ltrim($f_bln, '0');

        $query="SELECT*FROM detail_akuntansi WHERE no_akuntansi='$bukti'";   
            $hasil = $this->model_buk->dyn_query($query)->result_array();
            $no=1;
            foreach ($hasil as $r) {
                $sql="INSERT INTO transaksi_buk(
                transaksi_buk.no_rek,
                transaksi_buk.Tgl_bukti,
                transaksi_buk.No_bukti,
                transaksi_buk.Ket,
                transaksi_buk.Nilai,
                transaksi_buk.DK) 
                VALUES('".$r['rek']."','".$datee."','".$bukti."','".$r['urai']."','".$r['nilai']."','".$r['dk']."')";
                $this->model_buk->dyn_query($sql);
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
                Kredit12 FROM posting WHERE THN=$v_thn AND no_jurnal=".$r['rek'];  
                
                    $row = $this->model_buk->dyn_query($query)->row();
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

                if($v_jmlh==0){

                    if($r['dk']=="K"){
                        $sql1="INSERT INTO posting(
                        THN,
                        no_jurnal,
                        Kredit".$v_bln.") 
                        VALUES('".$v_thn."','".$r['rek']."','".$r['nilai']."')";                    
                    }else{
                        $sql1="INSERT INTO posting(
                        THN,
                        no_jurnal,
                        Debet".$v_bln.") 
                        VALUES('".$v_thn."','".$r['rek']."','".$r['nilai']."')";    
                    }

                    $this->model_buk->dyn_query($sql1);

                }elseif($v_jmlh==1){

                    if($r['dk']=="K"){
                        $f_kredit=$v_Kredit[$s_bln];
                        $s_kredit=$f_kredit+$r['nilai'];
                        $sql3="update posting set
                        Kredit".$v_bln."='".$s_kredit."'
                        WHERE THN=".$v_thn." AND no_jurnal='".$r['rek']."'";

                        $this->model_buk->dyn_query($sql3);
                    }else{
                        $f_Debet=$v_Debet[$s_bln];
                        $s_Debet=$f_Debet+$r['nilai'];
                        $sql3="update posting set
                        Debet".$v_bln."='".$s_Debet."'
                        WHERE THN=".$v_thn." AND no_jurnal='".$r['rek']."'";

                        $this->model_buk->dyn_query($sql3);
                    }
                }
            }
            $sql3="update akuntansi set
            posting='Y'
            WHERE bukti='".$bukti."'";

            $this->model_buk->dyn_query($sql3); 
            $a="Berhasil posting";
            echo json_encode($a);
    }

    public function batal_posting(){
        // $datee = '2020-08-13 00:00:00';
        // $bkt = '10817';
        $datee = $this->input->post('tanggal');
        $bkt = $this->input->post('bukti');
        $kdo = 1;

        $date=date_create($datee);
        $v_thn=date_format($date,"Y");
        $date=date_create($datee);
        $bukti = $bkt;
        $v_bln=date_format($date,"m");
        $f_bln = $v_bln;
        $s_bln = ltrim($f_bln, '0');
        $query="SELECT*FROM detail_akuntansi WHERE no_akuntansi='".$bukti."'";
            $hasil = $this->model_buk->dyn_query($query)->result_array();
            // $hasil = mysql_query($query);
            $no=1;
            // while($r=mysql_fetch_array($hasil)){
            foreach ($hasil as $r) {

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
                Kredit12 FROM posting WHERE THN=$v_thn AND no_jurnal= '".$r['rek']."'";

                $row = $this->model_buk->dyn_query($query)->row();    
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

                if($r['dk']=="K"){
                    $f_kredit=$v_Kredit[$s_bln];
                    $s_kredit=$f_kredit-$r['nilai'];
                    $sql3="update posting set
                    Kredit".$v_bln."='".$s_kredit."'
                    WHERE THN=".$v_thn." AND no_jurnal='".$r['rek']."'";

                    $this->model_buk->dyn_query($sql3);
                }else{
                    $f_Debet=$v_Debet[$s_bln];
                    $s_Debet=$f_Debet-$r['nilai'];
                    $sql3="update posting set
                    Debet".$v_bln."='".$s_Debet."'
                    WHERE THN=".$v_thn." AND no_jurnal='".$r['rek']."'";

                    $this->model_buk->dyn_query($sql3);
                }                   
                $sqlkonversi="DELETE FROM transaksi_buk WHERE No_bukti='".$bukti."'";

                $this->model_buk->dyn_query($sqlkonversi);

            }
            $sql3="update akuntansi set
            posting='T'
            WHERE bukti='".$bukti."'";

            $this->model_buk->dyn_query($sql3);
            $a="Dibatalkan";
            echo json_encode($a);
    }
}
