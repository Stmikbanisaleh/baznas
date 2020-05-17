<?php
                if($my_sysconfig != null){
                    $nama_sekolah = $my_sysconfig->name_school;
                    $alamat = $my_sysconfig->address;
                    $telp = $my_sysconfig->no_telp;
                }else{
                    $nama_sekolah = '';
                    $alamat = '';
                    $telp = '';
                }
            ?>
<?php
		$query= $this->db->query("SELECT
									pembayaran_sekolah.Nopembayaran,
									pembayaran_sekolah.Noreg,
									t.Kodejnsbayar Kodejnsbayar,
									t.Nominal nominalbayar, 
									(SELECT z.Namacasis FROM calon_siswa z WHERE z.Noreg=pembayaran_sekolah.Noreg)AS Namacasis,
									DATE_FORMAT(pembayaran_sekolah.tglentri,'%d-%m-%Y')tglbayar,
									pembayaran_sekolah.useridd,
									pembayaran_sekolah.TotalBayar,
									(SELECT z.DESCRTBPS FROM tbps z WHERE z.KDTBPS=pembayaran_sekolah.kodesekolah)AS NamaSek,
									pembayaran_sekolah.TA
									FROM pembayaran_sekolah 
									JOIN detail_bayar_sekolah d ON d.Nopembayaran=pembayaran_sekolah.Nopembayaran
									JOIN tarif_berlaku t ON t.idtarif = d.idtarif
									WHERE Noreg='".$this->uri->segment('3')."' AND t.Kodejnsbayar = 'FRM'");

	$row = $query->row();
	if($row!=null){	  
		$v_NoPembayaranPSB = $row->Nopembayaran;  			  
		$v_Noreg = $row->Noreg;  			  
		$v_Namacasis = $row->Namacasis;  			  
		$v_tglbayar = $row->tglbayar;  			  
		$v_useridd = $row->useridd;  			  
		$v_TotalBayar = $row->TotalBayar;  			  
		$v_NamaSek = $row->NamaSek;  			  
		$v_nominalbayar = $row->nominalbayar;  			  
		$v_Kodejnsbayar = $row->Kodejnsbayar;
	}else{
		$v_NoPembayaranPSB = 0;  			  
		$v_Noreg = 0;  			  
		$v_Namacasis = '';  			  
		$v_tglbayar = '';  			  
		$v_useridd = '';  			  
		$v_TotalBayar = 0;  			  
		$v_NamaSek = '';  			  
		$v_nominalbayar = 0;  			  
		$v_Kodejnsbayar = '';
	}
function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}
 
 
function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}
function format_rupiah($angka){
 $rupiah=number_format($angka,0,',','.');
 return $rupiah;
}

?>
<table width="100%" cellpadding="0" cellspacing="0" >
  <tr>
    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 14px;"><?= $nama_sekolah; ?><br>
SMP  -  SMA  -  SMK  <?= $nama_sekolah;?></span></th>
    <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 20px;"><b>KWITANSI</b></th>
    <th width="30%"></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"><?= $alamat; ?></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Tanggal Bayar : <?php echo $v_tglbayar;?></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Telp. <?= $telp ?></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">No. Kwitansi : <?=$v_Kodejnsbayar.'-'.$v_NamaSek.'-'.$v_NoPembayaranPSB?></th>
  </tr>
  </table>  
<table width="100%" cellpadding="0" cellspacing="0"  rules="rows">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  </table>  
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;">No Registrasi : <?php echo $v_Noreg;?></th>
    <th width="50%" colspan='2' align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Sejumlah Uang</th>
  </tr>
  <tr align="left">
    <th scope="col"><span style="font-family:Rockwell;font-size: 12px;">Nama : <?php echo $v_Namacasis;?></th>
    <th width="50%" colspan='2' align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;"><?php $nilai = $v_TotalBayar;        
        echo terbilang($nilai, $style=1); echo '<br/>';?></th>
  </tr> 
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  </table>
  <table width="100%" rules="rows" cellpadding="6" cellspacing="2" border="0">
  <tr>
    <th width="5%" align="center" ><span style="font-family:Rockwell;font-size: 12px;">No.</th>
    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 12px;">Keterangan</th>
    <th width="10%" align="center"><span style="font-family:Rockwell;font-size: 12px;">Jumlah</th>
  </tr>
  <tr>
    <th align="center"><span style="font-family:Rockwell;font-size: 12px;">1</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Formulir Pendaftaran</th>
    <th><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo format_rupiah($v_TotalBayar);?></th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  </table>
  <table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="30%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 8px;"></th>
    <th  align="right" width="5%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">TOTAL :</th>
    <th width="10%"  scope="col"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo format_rupiah($v_TotalBayar);?></th>
  </tr>
</table>
<br><br>
  <table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%"  scope="col"></th>
    <th  align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th width="10%"  scope="col"><span style="font-family:Rockwell;font-size: 12px;">Bekasi, <?php $tgl=date('d/m/Y');
echo $tgl;?></th>
  </tr>
</table>
<br><br>
<br>
  <table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%"  scope="col"></th>
    <th  align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th width="10%"  scope="col"><span style="font-family:Rockwell;font-size: 12px;">Kasir</th>
  </tr>
</table>
