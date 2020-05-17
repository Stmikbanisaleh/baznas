<?php
list($thn, $bln, $tgl) = explode('-', $this->input->post('periode_awal'));
$a1 = $thn . '-' . $bln . '-' . $tgl;
$b1 = $tgl . '-' . $bln . '-' . $thn;
list($thn1, $bln1, $tgl1) = explode('-', $this->input->post('periode_akhir'));
$a2 = $thn1 . '-' . $bln1 . '-' . $tgl1;
$b2 = $tgl1 . '-' . $bln1 . '-' . $thn1;
?>
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
      <th scope="col"></th>
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
      <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Tanggal : <?php echo $b1; ?> s/d <?php echo $b2; ?></th>
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
      <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">No Bukti</th>
      <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">No Rekening</th>
      <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Keterangan</th>
      <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Tanggal</th>
      <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Sekolah</th>
      <th width="10%" align="left"><span style="font-family:Rockwell;font-size: 10px;">Nominal</th>
    </tr>
    <?php
    $sql = "SELECT
pembayaran_sekolah.tglentri,
pembayaran_sekolah.TA,
detail_bayar_sekolah.nominalbayar,
jenispembayaran.namajenisbayar,
jurnal.kode_jurnal,
pembayaran_sekolah.Nopembayaran,
tbps.DESCRTBPS,
tbjs.DESCRTBJS
FROM
pembayaran_sekolah
INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
INNER JOIN jurnal ON jenispembayaran.no_jurnal = jurnal.no_jurnal
INNER JOIN tbps ON pembayaran_sekolah.kodesekolah = tbps.KDTBPS
INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS
WHERE tglentri between '$a1' AND '$a2'
ORDER BY tglentri
";
$myrekening = $this->model_laporan->view_byquery($sql)->result_array();
    $no = 1;
     $v_uang = 0;
    foreach ($myrekening as $r) {
      ?>
      <tr>
        <th align="center"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $no ?></th>
        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['Nopembayaran']; ?></th>
        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['kode_jurnal']; ?></th>
        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['namajenisbayar']; ?></th>
        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo date('d-m-Y', strtotime($r['tglentri'])); ?></th>
        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['DESCRTBPS']; ?>-<?php echo $r['DESCRTBJS']; ?></th>
        <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?php echo number_format($r['nominalbayar']); ?></th>
      </tr>
    <?php
      $no++;
      $v_uang = $v_uang + $r['nominalbayar'];
    }
    ?>
    <tr>
      <th scope="col"><span style="font-family:Rockwell;font-size: 10px;">Total</th>
      <th scope="col" colspan='5'>&nbsp;</th>
      <th align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($v_uang) ?></th>
    </tr>
  </table>
  <br><br>
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <th width="5%" scope="col"></th>
      <th align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 10px;"></th>
      <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Bekasi, <?php $tgl = date('d/m/Y');
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
<?php
die();
?>
  <script src="jquery-1.9.1.js"></script>
  <script>
    $(document).ready(function() {
      var ask = window.confirm("Download file pdf?");
      if (ask) {
        window.location.href = "LPP_dompdf.php";
      }
    });
  </script>