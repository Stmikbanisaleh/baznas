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
        <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 16px;"><b>LAPORAN LABA RUGI</b></th>
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
                        <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Untuk Bulan : <?php echo $v_awal; ?> s/d <?php echo $v_akhir; ?> <?php echo $tahun; ?>
                    </th>
                </tr>

                <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </table>
            <table width="100%" cellpadding="6" cellspacing="2" rules="rows">
                <tr>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                    </th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                    </th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                    </th>
                    <th colspan="2" align="center"><span style="font-family:Rockwell;font-size: 10px;">
                    </th>
                </tr>
                <tr>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                        No
                    </th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                        Kode Rekening
                    </th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                        Nama Rekening
                    </th>
                    <th align="right">
                        <span style="font-family:Rockwell;font-size: 10px;">
                            Daftar Pendapatan
                        </th>
                    </tr>
                    <?php
                    $no = 1;
                    $totsad = 0;
                    $v_uang = 0;
                    foreach ($myrekening as $r) {
                        $mytransaksibuk = $this->model_laporan->view_transaksibuk($r['id'])->result_array();
                        $mynilatransbuk = $this->model_laporan->view_nilatransbuk($this->input->post('tahun'). "-" . $this->input->post('blnawal') . "-01", $this->input->post('tahun'). "-" . $this->input->post('blnakhir') . "-01", $r['no_rek'])->result_array();
                        $rld = $mynilatransbuk;
                        ?>
                        <tr>
                            <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                                <?php echo $no; ?>
                            </th>
                            <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                                <?php echo $r['no_rek']; ?>
                            </th>
                            <th align="left">
                                <span style="font-family:Rockwell;font-size: 10px;">
                                    <?php echo $r['nama_jurnal']; ?>
                                </span>
                            </th>
                            <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php if ($rld[0]['ruladebet']) {
                                 echo number_format($rld[0]['ruladebet']);
                             } else {
                              echo 0;
                          } 
                          ?>
                      </th>
                  </tr>
                  <?php
                  $no++;
                  $totsad += $rld[0]['ruladebet'];
              }
              ?>
              <tr>
                  <th colspan="3"><span style="font-family:Rockwell;font-size: 10px;">
                      Total
                  </th>
                  <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                    Rp. <?= number_format($totsad); ?>
                </th>
            </tr>
        </table>
        <table width="100%" cellpadding="6" cellspacing="2" rules="rows">
            <tr>
                <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                </th>
                <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                </th>
                <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                </th>
                <th colspan="2" align="center"><span style="font-family:Rockwell;font-size: 10px;">
                </th>
            </tr>
            <tr>
                <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                    No
                </th>
                <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                    Kode Rekening
                </th>
                <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                    Nama Rekening
                </th>
                <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                    Daftar Biaya
                </th>
            </tr>
            <?php
            $no = 1;
            $totbiaya = 0;
            foreach ($myrekening4 as $r) {
                $mytransaksibuk = $this->model_laporan->view_transaksibuk($r['id'])->result_array();
                $mynilatransbuk = $this->model_laporan->view_nilatransbuk($this->input->post('tahun'). "-" . $this->input->post('blnawal') . "-31", $this->input->post('tahun'). "-" . $this->input->post('blnakhir') . "-31", $r['no_rek'])->result_array();
                $rld = $mynilatransbuk;
                ?>
                <tr>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                        <?php echo $no; ?>
                    </th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                        <?php echo $r['no_rek']; ?>
                    </th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">
                        <?php echo $r['nama_jurnal']; ?>
                    </th>
                    <th align="right">
                        <span style="font-family:Rockwell;font-size: 10px;">
                            Rp. <?php if ($rld[0]['ruladebet']) {
                                 echo number_format($rld[0]['ruladebet']);
                             } else {
                              echo 0;
                          } 
                          ?>
                  </span>
              </th>
          </tr>
          <?php
          $no++;
          $totbiaya += $rld[0]['ruladebet'];
      }
      ?>
      <tr>
          <th colspan="3"><span style="font-family:Rockwell;font-size: 10px;">
              Total
          </th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
            Rp. <?= number_format($totbiaya); ?>
        </th>
    </tr>
    <tr>
