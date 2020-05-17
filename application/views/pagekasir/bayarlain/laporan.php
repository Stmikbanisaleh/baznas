<?php
$id = $this->input->get('noreg');
$nopem = $this->input->get('no');
$kelas = $this->input->get('kls');
$row = $this->db->query("SELECT
mssiswa.NOINDUK,
mssiswa.NOREG,
mssiswa.NMSISWA,
tbps.DESCRTBPS,
mssiswa.TAHUN,
mssiswa.PS,
tbjs.DESCRTBJS
FROM
mssiswa
INNER JOIN tbps ON mssiswa.PS = tbps.KDTBPS
INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS
                          WHERE mssiswa.NOREG='$id' OR  mssiswa.NOINDUK='$id'")->row();

$v_NIS = $row->NOINDUK;
$v_NamaSek = $row->DESCRTBPS;
$v_Noreg = $row->NOREG;
$v_Namacasis = $row->NMSISWA;
$v_thnmasuk = $row->TAHUN;
$v_kodesekolah = $row->PS;
$v_NamaJurusan = $row->DESCRTBJS;

$row = $this->db->query("SELECT * FROM pembayaran_sekolah WHERE NIS='$id' OR Noreg='$id' AND Nopembayaran='$nopem'")->row();

$Nopembayaran = $row->Nopembayaran;
$tglentri = $row->tglentri;
$Kelas = $row->Kelas;

?>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 14px;">YAYASAN GEMA NURANI<br>
        SD- SMP - SMA - GEMA NURANI </span></th>
    <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 20px;"><b>BUKTI PEMBAYARAN SISWA</b></th>
    <th width="30%"></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Jl. Rajawali Pulo No. 2, Kampung Nagreg, RT.04/02, Desa Rajeg Mulya
        Kecamatan Rajeg, Kabupaten Tangerang 15540</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Telp. (021) 59391134</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"></th>
  </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" rules="rows">
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
    <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;">No. Transaksi : <?= $Nopembayaran ?></th>
    <th width="50%" colspan='2' align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;">NIS/No Registrasi : <?php echo $v_NIS; ?>/<?php echo $v_NIS; ?></th>
  </tr>
  <tr align="left">
    <th scope="col"><span style="font-family:Rockwell;font-size: 12px;">Tanggal : <?= $tglentri ?></th>
    <th width="50%" colspan='2' align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Nama Siswa : <?php echo $v_Namacasis; ?></th>
  </tr>
  <tr align="left">
    <th scope="col"><span style="font-family:Rockwell;font-size: 12px;">Kelas : <?php echo $Kelas; ?>-<?= $v_NamaJurusan ?></th>
    <th width="50%" colspan='2' align="left" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Tahun Pelajaran : <?php echo $ThnAkademik; ?></th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" cellpadding="6" cellspacing="2" border="0">
  <?php
  $cari1 = $this->db->query("SELECT*FROM saldopembayaran_sekolah
  INNER JOIN pembayaran_sekolah ON saldopembayaran_sekolah.Noreg = pembayaran_sekolah.Noreg
  WHERE pembayaran_sekolah.Noreg='$id' OR pembayaran_sekolah.NIS='$id' AND pembayaran_sekolah.Nopembayaran='$nopem'")->row();
// // print_r(json_encode($cari1));exit;
  // $v_TotalTagihan = $cari1->TotalTagihan;
  // $v_Sisa = $cari1->Sisa;
  // $v_TA = $cari1->TA;
  if($cari1 == null){
    $v_TA = '';
  }else{
    $v_TA = $cari1->TA;
  }

  $cari1 = $this->db->query("SELECT*FROM tarif_berlaku WHERE ThnMasuk='$v_thnmasuk' AND kodesekolah='$v_kodesekolah' AND Kodejnsbayar='SPP'")->row();

  if($cari1 == null){
    $v_Nominal_SPP = 0;
    $v_idtarif_SPP = '';
  }else{
    $v_Nominal_SPP = $cari1->Nominal;
    $v_idtarif_SPP = $cari1->idtarif;
  }

  // $cari1 = $this->db->query("SELECT*FROM tarif_berlaku WHERE ThnMasuk='$v_thnmasuk' AND kodesekolah='$v_kodesekolah' AND Kodejnsbayar='GDG'")->row();

  // if($cari1 == null){
  //   $v_Nominal_GDG = 0;
  //   $v_idtarif_GDG = '';
  // }else{
  //   $v_Nominal_GDG = $cari1->Nominal;
  //   $v_idtarif_GDG = $cari1->idtarif;
  // }

  // $cari1 = $this->db->query("SELECT*FROM tarif_berlaku WHERE ThnMasuk='$v_thnmasuk' AND kodesekolah='$v_kodesekolah' AND Kodejnsbayar='SRG'")->row();
  // if($cari1 == null){
  //   $v_Nominal_SRG = 0;
  //   $v_idtarif_SRG = '';
  // }else{
  //   $v_Nominal_SRG = $cari1->Nominal;
  //   $v_idtarif_SRG = $cari1->idtarif;
  // }

  // $cari1 = $this->db->query("SELECT*FROM tarif_berlaku WHERE ThnMasuk='$v_thnmasuk' AND kodesekolah='$v_kodesekolah' AND Kodejnsbayar='KGT'")->row();

  // if($cari1 == null){
  //   $v_Nominal_KGT = 0;
  //   $v_idtarif_KGT = '';
  // }else{
  //   $v_Nominal_KGT = $cari1->Nominal;
  //   $v_idtarif_KGT = $cari1->idtarif;
  // }

  // $cari1 = $this->db->query("SELECT SUM(Nominal) Nominal FROM tarif_berlaku WHERE ThnMasuk='$v_thnmasuk' AND kodesekolah='$v_kodesekolah' AND Kodejnsbayar NOT IN ('SPP', 'GDG', 'SRG', 'KGT')")->row();

  // if($cari1 == null){
  //   $v_Nominal_lain = 0;
  //   // $v_idtarif_lain = '';
  // }else{
  //   $v_Nominal_lain = $cari1->Nominal;
  //   // $v_idtarif_KGT = $cari1->idtarif;
  // }

  // $row = $this->db->query("SELECT detail_bayar_sekolah.nominalbayar FROM detail_bayar_sekolah WHERE Nopembayaran='$nopem' AND kodejnsbayar='SPP'")->row();

  // if (isset($row)) {
  //   $SPP_nominalbayar = $row->nominalbayar;
  // } else {
  //   $SPP_nominalbayar = 0;
  // }

  // $row = $this->db->query("SELECT detail_bayar_sekolah.nominalbayar FROM detail_bayar_sekolah WHERE Nopembayaran='$nopem' AND kodejnsbayar='GDG'")->row();

  // if (isset($row)) {
  //   $GDG_nominalbayar = $row->nominalbayar;
  // } else {
  //   $GDG_nominalbayar = 0;
  // }

  // $row = $this->db->query("SELECT detail_bayar_sekolah.nominalbayar FROM detail_bayar_sekolah WHERE Nopembayaran='$nopem' AND kodejnsbayar='SRG'")->row();

  // if (isset($row)) {
  //   $SRG_nominalbayar = $row->nominalbayar;
  // } else {
  //   $SRG_nominalbayar = 0;
  // }

  // $row = $this->db->query("SELECT detail_bayar_sekolah.nominalbayar FROM detail_bayar_sekolah WHERE Nopembayaran='$nopem' AND kodejnsbayar='KGT'")->row();

  // if (isset($row)) {
  //   $KGT_nominalbayar = $row->nominalbayar;
  // } else {
  //   $KGT_nominalbayar = 0;
  // }

  // $row = $this->db->query("SELECT SUM(detail_bayar_sekolah.nominalbayar) lain_lain FROM detail_bayar_sekolah WHERE Nopembayaran='$nopem' AND kodejnsbayar NOT IN ('SPP', 'GDG', 'SRG', 'KGT')")->row();

  // if (isset($row)) {
  //   $lain_nominalbayar = $row->lain_lain;
  // } else {
  //   $lain_nominalbayar = 0;
  // }

//   $cari1 = $this->db->query("SELECT SUM(SPP)AS SPP,SUM(GDG)AS GDG,SUM(SRG)AS SRG,SUM(KGT)AS KGT FROM(
// SELECT
// (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='SPP' AND  Nopembayaran <$Nopembayaran)AS SPP,
// (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='GDG' AND  Nopembayaran <$Nopembayaran)AS GDG,
// (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='SRG' AND  Nopembayaran <$Nopembayaran)AS SRG,
// (SELECT SUM(z.nominalbayar) FROM detail_bayar_sekolah z WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran AND z.kodejnsbayar='KGT' AND  Nopembayaran <$Nopembayaran)AS KGT
// FROM
// pembayaran_sekolah
// WHERE NIS='$id' OR Noreg='" . $id . "' AND Kelas='$Kelas' AND TA='$v_TA')AS kl")->row();

//   if($cari1 == null){
//     $t_SPP = 0;
//     $t_GDG = 0;
//     $t_SRG = 0;
//     $t_KGT = 0;
//   }else{
//     $t_SPP = number_format($cari1->SPP);
//     $t_GDG = number_format($cari1->GDG);
//     $t_SRG = number_format($cari1->SRG);
//     $t_KGT = number_format($cari1->KGT);
//   }
  

  // $cari1 = $this->db->query("SELECT pot_spp, pot_gdg, pot_modul, pot_kgt
  //                     FROM
  //                     saldopembayaran_sekolah
  //                     WHERE NIS='$id' AND Kelas='$Kelas'")->row();

  // $totbayar = $this->db->query("SELECT sum(Totalbayar) as total
  // FROM
  // pembayaran_sekolah
  // WHERE NIS='$id'")->row();

  // if (isset($cari)) {
  //   if($cari1 == null){
  //     $pot_spp = 0;
  //     $pot_gdg = 0;
  //     $pot_modul = 0;
  //     $pot_kgt = 0;
  //   }else{
  //     $pot_spp = $cari1->pot_spp;
  //     $pot_gdg = $cari1->pot_gdg;
  //     $pot_modul = $cari1->pot_modul;
  //     $pot_kgt = $cari1->pot_kgt;
  //   }
    
  // } else {
  //   $pot_spp = 0;
  //   $pot_gdg = 0;
  //   $pot_modul = 0;
  //   $pot_kgt = 0;
  // }

  // $vap_Nominal_SPP = $v_Nominal_SPP - ($v_Nominal_SPP * $pot_spp / 100);
  // $vap_Nominal_GDG = $v_Nominal_GDG - ($v_Nominal_GDG * $pot_gdg / 100);
  // $vap_Nominal_SRG = $v_Nominal_SRG - ($v_Nominal_SRG * $pot_modul / 100);
  // $vap_Nominal_KGT = $v_Nominal_KGT - ($v_Nominal_KGT * $pot_kgt / 100);

  // $s_SPP = $vap_Nominal_SPP - $t_SPP;
  // $s_GDG = $vap_Nominal_GDG - $t_GDG;
  // $s_SRG = $vap_Nominal_SRG - $t_SRG;
  // $s_KGT = $vap_Nominal_KGT - $t_KGT;
  // $f_tot = ($s_KGT + $s_SRG + $s_GDG + $s_SPP);
  // $tot_byr = $SPP_nominalbayar + $GDG_nominalbayar + $SRG_nominalbayar + $KGT_nominalbayar;
  // $tot_dbyr = $t_SPP + $t_GDG + $t_SRG + $t_KGT + $tot_byr;

  // $tot_tag = $vap_Nominal_SPP + $vap_Nominal_GDG + $vap_Nominal_SRG + $vap_Nominal_KGT;
  // $sisa_tag = $tot_tag - $tot_dbyr;
  ?>
  <tr>
    <th colspan=2 width="20%" align="left"><span style="font-family:Rockwell;font-size: 12px;">Telah Dibayarkan :</th>
    <th colspan=2 width="20%" align="left"><span style="font-family:Rockwell;font-size: 12px;">Tarif :</th>
  </tr>
  <tr>
    <th width="20%" align="left"><span style="font-family:Rockwell;font-size: 12px;"><?= $_GET['desc_jenis_bayar'] ?></th>
    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo number_format($_GET['total_bayar'], 0, ',', '.'); ?></th>
    <th width="20%" align="left"><span style="font-family:Rockwell;font-size: 12px;"><?= $_GET['desc_jenis_bayar'] ?></th>
    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo number_format($_GET['tarif'], 0, ',', '.'); ?></th>
  </tr>
  <tr>
    <td colspan=6><u>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Jumlah Bayar</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo number_format($_GET['total_bayar'], 0, ',', '.'); ?></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Total Tagihan</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo number_format($_GET['tarif'], 0, ',', '.'); ?></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Total Dibayar</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo number_format($_GET['total_bayar'], 0, ',', '.'); ?></th>
  </tr>
  <tr>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Sisa Tagihan</th>
    <th align="left"><span style="font-family:Rockwell;font-size: 12px;">Rp. <?php echo number_format($_GET['tarif']-$_GET['total_bayar'], 0, ',', '.'); ?></th>
  </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="30%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 8px;"></th>
    <th align="right" width="5%" scope="col"><span style="font-family:Rockwell;font-size: 12px;"></th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 12px;"></th>
  </tr>
</table>
<br><br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col"></th>
    <th align="center" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Telah dikoreksi oleh :</th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Bekasi, <?php $tgl = date('d/m/Y');
                                                                                            echo $tgl; ?></th>
  </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col"></th>
    <th align="center" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Ka. Biro Keuangan</th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Yang Mengajukan</th>
  </tr>
</table>
<br><br>
<br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col"></th>
    <th align="center" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">............................</th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 12px;"><?php echo $v_Namacasis; ?></th>
  </tr>
</table>