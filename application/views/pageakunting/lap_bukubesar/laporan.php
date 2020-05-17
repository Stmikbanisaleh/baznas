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
            ?><br>
          SMP - SMA - SMK <?= $nama_sekolah;?></span></th>
          <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 16px;">
            <b>BUKU BESAR</b>
          </th>
          <th width="30%">

          </th>
        </tr>
        <tr>
          <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?= $alamat; ?>
          </th>
          <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
          </th>
        </tr>
        <tr>
          <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
            Telp. <?= $telp ?>
          </th>
          <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
          </th>
        </tr>
      </table>
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <th scope="col">&nbsp;
          </th>
          <th scope="col">&nbsp;
          </th>
          <th scope="col">&nbsp;
          </th>
        </tr>
        <tr>
          <th scope="col">&nbsp;
          </th>
          <th scope="col">&nbsp;
          </th>
          <th scope="col">&nbsp;
          </th>
        </tr>
      </table>
      <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Untuk Bulan : <?php echo $v_awal; ?> s/d <?php echo $v_akhir; ?> <?php echo $tahun; ?>
        </th>
      </tr>
      <tr>
        <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Kode Rekening : <?php echo $v_kode_jurnal; ?>-<?php echo $v_nama_jurnal; ?>
      </th>
    </tr>
    <tr>
      <th scope="col">&nbsp;
      </th>
      <th scope="col">&nbsp;
      </th>
      <th scope="col">&nbsp;
      </th>
    </tr>
  </table>
  <table width="100%" cellpadding="6" cellspacing="2" rules="rows">
    <tr>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Tgl
      </th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Nomor Bukti
      </th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Uraian
      </th>
      <th align="center"><span style="font-family:Rockwell;font-size: 10px;">Nilai
      </th>
      <th align="center"><span style="font-family:Rockwell;font-size: 10px;">Debet
      </th>
      <th align="center"><span style="font-family:Rockwell;font-size: 10px;">Kredit
      </th>
      <th align="center"><span style="font-family:Rockwell;font-size: 10px;">Saldo
      </th>
    </tr>
    <tr>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
      </th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
      </th>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Saldo Awal
      </th>
      <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. 0
      </th>
      <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. 0
      </th>
      <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. 0
      </th>
      <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($v_nml) ?>
    </th>
  </tr>
  <?php

  $mynilatransbuk = $this->model_laporan->view_nilatransbukbes($this->input->post('tahun'). "-" . $this->input->post('blnawal') . "-01", $this->input->post('tahun'). "-" . $this->input->post('blnakhir') . "-01", $this->input->post('coa'))->result_array();
  // print_r($this->db->last_query());exit;
  $no = 1;
  $totnilai = 0;
  $totkredit = 0;
  $totdebet = 0;
  $v_uang = 0;
  foreach ($mynilatransbuk as $r) {
    $data_transbuk = $this->model_laporan->get_transbuk($r['id'])->result_array();
    $v_dk = $data_transbuk[0]['DK'];
    $v_nilai = $data_transbuk[0]['Nilai'];

    if($r['DK']=='D'){
      if ($no == 1) {
        $v_uang = $v_uang + $r['Nilai'] + $v_nml;
      } else {
        $v_uang = $v_uang + $r['Nilai'];
      }
    }else{
      $v_uang = $v_uang + $r['Nilai'];	
    }
    ?>
    <tr>
      <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['tgl1']; ?>
    </th>
    <th align="left">
      <span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['No_bukti']; ?>
    </th>
    <th align="left">
      <span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['Ket']; ?></th>
        <th align="right">
          <span style="font-family:Rockwell;font-size: 10px;">Rp. <?php echo number_format($r['Nilai']); ?>
        </th>
        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?php if ($r['DK'] == "D") {
         $vmn=$v_nilai;
         $totdebet +=$vmn;
         echo number_format($v_nilai);
       } else {
        echo 0;
      }; ?></th>
      <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?php if ($r['DK'] == "K") {
       $vmn=$v_nilai;
       $totkredit +=$vmn;
       echo number_format($v_nilai);
     } else {
      echo 0;
    }; ?></th>
    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?php echo number_format($v_uang); ?></th>
    </tr>
    <?php
    $no++;
    $totnilai += $r['Nilai'];
  }
  ?>
  <tr>
    <th colspan="3"><span style="font-family:Rockwell;font-size: 10px;">Total
    </th>
    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totnilai); ?>
  </th>
  <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totdebet); ?>
</th>
<th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totkredit); ?>
</th>
<th align="right"><span style="font-family:Rockwell;font-size: 10px;">
</th>
</tr>
</table>

<br><br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col"></th>
    <th align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 10px;">
    </th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Bekasi, <?php $tgl = date('d/m/Y');
    echo $tgl; ?></th>
  </tr>
</table>
<br><br>
<br>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th width="5%" scope="col">

    </th>
    <th align="right" width="30%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">
    </th>
    <th width="10%" scope="col"><span style="font-family:Rockwell;font-size: 12px;">Kasir
    </th>
  </tr>
</table>