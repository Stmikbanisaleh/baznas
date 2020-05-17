<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 10px;">
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
        echo "YAYASAN ".$nama_sekolah;
    ?>
    <br>
        SMP - SMA - SMK <?= $nama_sekolah;?></span></th>
    <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 16px;"><b>REKAP PEMBAYARAN SISWA</b></th>
    <th width="30%"></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?= $alamat; ?></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Telp. <?= $telp ?></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
  </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Tanggal : <?php echo $v_awal; ?> s/d <?php echo $v_akhir; ?></th>
  </tr>
  <tr>
    <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Pembayaran Siswa</th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" cellpadding="6" cellspacing="2" rules="rows">
  <tr>
    <th width="5%" align="center"><span style="font-family:Rockwell;font-size: 10px;">No.</th>
    <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">No. Bukti</th>
    <th width="20%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Sekolah</th>
    <th width="20%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Jenis Pembayaran</th>
    <th width="13%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Nominal</th>
    <th width="7%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Kelas</th>
    <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Tanggal</th>
    <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Tahun Pelajaran</th>
  </tr>
  <?php
  $v_uang = 0;
  $no = 1;
  // $v_uang = 0;
  // print_r(json_encode($mydata[0]['kodesekolah']));
  foreach ($mydata as $r) {
    ?>
    <tr>
      <th align="center"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $no ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['Nopembayaran']; ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['kodesekolah']; ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['namajenisbayar']; ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?php echo number_format($r['nominalbayar']); ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['Kelas']; ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['tglentri']; ?></th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['TA']; ?></th>
    </tr>
  <?php
  // if($no = 1){
  //     $v_uang = 0;
  //   }
    $no++;

    $v_uang = $v_uang + $r['nominalbayar'];
  }
  ?>
  <tr>
    <th scope="col"><span style="font-family:Rockwell;font-size: 10px;">Total</th>
    <th scope="col" colspan='5'>&nbsp;</th>
    <th scope="col" colspan="2"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($v_uang) ?></th>
  </tr>
</table>
<br><br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="30%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;"></th>
    <th align="right" width="5%" scope="col"><span style="font-family:Rockwell;font-size: 10px;"></th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 10px;"></th>
  </tr>
</table>
<br><br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col"></th>
    <th align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 10px;"></th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Bekasi, <?php
                                                                                            echo $tgl; ?></th>
  </tr>
</table>
<br><br>
<br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col"></th>
    <th align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Kasir</th>
  </tr>
</table>