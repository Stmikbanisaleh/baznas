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
                    <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 16px;"><b>REKAPITULASI BUKU BESAR</b></th>
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
                    <th width="50%" align="left" scope="col"><span style="font-family:Rockwell;font-size: 10px;">Untuk Bulan : <?php echo $bln_awal; ?> s/d <?php echo $bln_akhir; ?> <?php echo $tahun; ?></th>
                </tr>

                <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </table>
            <table width="100%" cellpadding="6" cellspacing="2" rules="rows">
                <tr>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                    <th colspan="2" align="center"><span style="font-family:Rockwell;font-size: 10px;">Saldo Awal</th>
                    <th colspan="2" align="center"><span style="font-family:Rockwell;font-size: 10px;">Mutasi</th>
                    <th colspan="2" align="center"><span style="font-family:Rockwell;font-size: 10px;">Rugi Laba</th>
                    <th colspan="2" align="center"><span style="font-family:Rockwell;font-size: 10px;">Neraca</th>
                </tr>
                <tr>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">No</th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Kode Rekening</th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;">Nama Rekening</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Debet</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Kredit</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Debet</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Kredit</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Debet</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Kredit</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Debet</th>
                    <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Kredit</th>
                </tr>
                <?php
                $no = 1;
                $v_uang = 0;
                $totsad = 0;
                $totsak = 0;
                $totmtd = 0;
                $totmtk = 0;
                $totrld = 0;
                $totrlk = 0;
                $totnrd = 0;
                $totnrk = 0;
                $vrld = 0;
                $vrlk = 0;
                $nrds = 0;
                $tode = 0;
                $tokre = 0;
                foreach ($myrekening as $r) {
                    $data_transbuk = $this->model_laporan->get_transbuk($r['id'])->result_array();
                    $v_dk = $data_transbuk[0]['DK'];
                    $v_nilai = $data_transbuk[0]['Nilai'];

                    if ($no == 1) {
                        $v_uang = $v_uang + $r['Nilai'] + $v_nml;
                    } else {
                        $v_uang = $v_uang + $r['Nilai'];
                    }
                    ?>
                    <!--Mendapatkan total Saldo awal debet-->
                    <?php
					if($r['JR']==1){
                        $qu = "SELECT sum(Nilai) as saldebet,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  ";
                        $sad = $this->model_laporan->view_byquery($qu)->row();
					}elseif($r['JR']==2){
                        $qu = "SELECT sum(Nilai) as saldebet,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  ";	
                        $sad = $this->model_laporan->view_byquery($qu)->row();
					}else{
						if($bln_awal==1){
                        $qu = "SELECT sum(Nilai-Nilai) as saldebet,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  ";
                        $sad = $this->model_laporan->view_byquery($qu)->row();				
						}else{
                        $qu = "SELECT sum(Nilai) as saldebet,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  ";
                        $sad = $this->model_laporan->view_byquery($qu)->row();
						}
					}
                        ?>

                    <!--Mendapatkan total Saldo awal kredit-->
                    <?php
						if($bln_awal==1){
                        $qu = "SELECT sum(Nilai-Nilai) as salkredit,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='K'  ";
                        $sak = $this->model_laporan->view_byquery($qu)->row();
						}else{
                        $qu = "SELECT sum(Nilai) as salkredit,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='K'  ";
                        $sak = $this->model_laporan->view_byquery($qu)->row();
						}

                        ?>

                    <!--Mendapatkan total Mutasi debet-->
                    <?php
                        $qu = "SELECT sum(Nilai) as mtdebet,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti >='" . $tahun . "-" . $bln_awal . "-01' AND Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  no_rek='".$r['no_rek']."' AND DK='D' ";
                        $mtd = $this->model_laporan->view_byquery($qu)->row();
                        ?>



                    <!--Mendapatkan total Mutasi kredit-->
                    <?php
                        $qu = "SELECT sum(Nilai) as mtkredit,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti >='" . $tahun . "-" . $bln_awal . "-01' AND Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  no_rek='".$r['no_rek']."' AND DK='K'  ";
                        $mtk = $this->model_laporan->view_byquery($qu)->row();
                        ?>

                    <!--Mendapatkan total Rugi Laba debet-->
                    <?php
					
					if($r['JR']==1){
                        $qu = "SELECT sum(Nilai) as saldebet,Tgl_bukti FROM transaksi_buk JOIN jurnal  ON jurnal.kode_jurnal = transaksi_buk.no_rek WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  AND jurnal.JR NOT IN(1) ";
                        $sads = $this->model_laporan->view_byquery($qu)->row();

					}elseif($r['JR']==2){
                        $qu = "SELECT sum(Nilai) as saldebet,Tgl_bukti FROM transaksi_buk JOIN jurnal  ON jurnal.kode_jurnal = transaksi_buk.no_rek WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  AND jurnal.JR NOT IN(1) ";	
                        $sads = $this->model_laporan->view_byquery($qu)->row();

					}else{
						if($bln_awal==1){
                        $qu = "SELECT sum(Nilai-Nilai) as saldebet,Tgl_bukti FROM transaksi_buk JOIN jurnal  ON jurnal.kode_jurnal = transaksi_buk.no_rek WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  AND jurnal.JR NOT IN(1) ";
                        $sads = $this->model_laporan->view_byquery($qu)->row();

						}else{
                        $qu = "SELECT sum(Nilai) as saldebet,Tgl_bukti FROM transaksi_buk JOIN jurnal  ON jurnal.kode_jurnal = transaksi_buk.no_rek WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='D'  AND jurnal.JR NOT IN(1) ";
                        $sads = $this->model_laporan->view_byquery($qu)->row();

						}
					}
					
                        $qu = "SELECT sum(Nilai) as mtdebet,Tgl_bukti FROM transaksi_buk JOIN jurnal  ON jurnal.kode_jurnal = transaksi_buk.no_rek WHERE Tgl_bukti >='" . $tahun . "-" . $bln_awal . "-01' AND Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  no_rek='".$r['no_rek']."' AND DK='D'  AND jurnal.JR NOT IN(1) ";
                        $mtds = $this->model_laporan->view_byquery($qu)->row();
                        ?>

                    <!--Mendapatkan total Rugi Laba kredit-->
                    <?php
					
					
						if($bln_awal==1){
                        $qu = "SELECT sum(Nilai-Nilai) as salkredit,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='K'  ";
                        $saks = $this->model_laporan->view_byquery($qu)->row();

						}else{
                        $qu = "SELECT sum(Nilai) as salkredit,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti <'" . $tahun . "-" . $bln_awal . "-01' AND  no_rek='".$r['no_rek']."' AND DK='K'  ";
                        $saks = $this->model_laporan->view_byquery($qu)->row();

						}
						
                        $qu = "SELECT sum(Nilai) as mtkredit,Tgl_bukti FROM transaksi_buk WHERE Tgl_bukti >='" . $tahun . "-" . $bln_awal . "-01' AND Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  no_rek='".$r['no_rek']."' AND DK='K'  ";
                        $mtks = $this->model_laporan->view_byquery($qu)->row();

                        ?>

                    <!--Mendapatkan total Neraca Debet-->
                    <?php
						if($bln_awal==1){
                        $qu = "SELECT sum(tb.Nilai-tb.Nilai) as nerdebet,tb.Tgl_bukti,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  tb.no_rek='".$r['no_rek']."' AND tb.DK='D' AND j.JR NOT IN(3,4)";
                        $nrd = $this->model_laporan->view_byquery($qu)->row();

						}else{
                        $qu = "SELECT sum(tb.Nilai) as nerdebet,tb.Tgl_bukti,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  tb.no_rek='".$r['no_rek']."' AND tb.DK='D' AND j.JR NOT IN(3,4)";
                        // $has = mysql_query($qu);
                        // $nrd = mysql_fetch_assoc($has);
                        $nrd = $this->model_laporan->view_byquery($qu)->row();

						}
						
                        ?>

                    <!--Mendapatkan total Neraca Kredit-->
                    <?php
						if($bln_awal==1){
                        $qu = "SELECT sum(tb.Nilai-tb.Nilai) as nerkredit,tb.Tgl_bukti,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  tb.no_rek='".$r['no_rek']."' AND tb.DK='K' AND j.JR NOT IN(3,4)";
                        $nrk = $this->model_laporan->view_byquery($qu)->row();

						}else{
                        $qu = "SELECT sum(tb.Nilai) as nerkredit,tb.Tgl_bukti,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  tb.no_rek='".$r['no_rek']."' AND tb.DK='K' AND j.JR NOT IN(3,4)";
                        $nrk = $this->model_laporan->view_byquery($qu)->row();

						}
						
						if($bln_awal==1){
                        $qu = "SELECT sum(tb.Nilai-tb.Nilai) as nerkredit,tb.Tgl_bukti,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  tb.no_rek='".$r['no_rek']."' AND tb.DK='K' AND j.JR NOT IN(1,3,4)";
                        $nrks = $this->model_laporan->view_byquery($qu)->row();

						}else{
                        $qu = "SELECT sum(tb.Nilai) as nerkredit,tb.Tgl_bukti,j.JR FROM transaksi_buk tb JOIN jurnal j ON j.kode_jurnal = tb.no_rek WHERE tb.Tgl_bukti <='" . $tahun . "-" . $bln_akhir . "-31' AND  tb.no_rek='".$r['no_rek']."' AND tb.DK='K' AND j.JR NOT IN(1,3,4)";
                        $nrks = $this->model_laporan->view_byquery($qu)->row();

						}
						// print_r($sad->saldebet);exit;
                        ?>

                    <tr>
                        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $no; ?></th>
                        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['no_rek']; ?></th>
                        <th align="left"><span style="font-family:Rockwell;font-size: 10px;"><?php echo $r['nama_jurnal']; ?></th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php if ($sad->saldebet) {
                                            echo number_format($sad->saldebet);
                                        } else {
                                            echo 0;
                                        } ?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php if ($sak->salkredit) {
                                            echo number_format($sak->salkredit);
                                        } else {
                                            echo 0;
                                        } ?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php if ($mtd->mtdebet) {
                                            echo number_format($mtd->mtdebet);
                                        } else {
                                            echo 0;
                                        } ?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php if ($mtk->mtkredit) {
                                            echo number_format($mtk->mtkredit);
                                        } else {
                                            echo 0;
                                        } ?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php 
						if($no==1){echo 0;}else{
						echo number_format($vrld=$sads->saldebet+$mtds->mtdebet);}
										?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php 
						if($no==1){echo 0;}else{
						echo number_format($vrlk=$saks->salkredit+$mtks->mtkredit);}
										?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php
                                            echo number_format($nrds=$nrd->nerdebet-$nrk->nerkredit);
                                         ?>
                        </th>
                        <th align="right"><span style="font-family:Rockwell;font-size: 10px;">
                                Rp. <?php if ($nrks->nerkredit) {
                                            echo number_format($nrks->nerkredit);
                                        } else {
                                            echo 0;
                                        } ?>
                        </th>
                    </tr>
                <?php
                    $no++;
          $totsad += $sad->saldebet;
          $totsak += $sak->salkredit;
          $totmtd += $mtd->mtdebet;
          $totmtk += $mtk->mtkredit;
          $totrld += $vrld;
          $totrlk += $vrlk;
          $totnrd += $nrds;
          $totnrk += $nrks->nerkredit;
		  
                    if ($r['DK'] == "D") {
                        $tode += $v_nilai;
                    } elseif ($r['DK'] == "K") {
                        $tokre += $v_nilai;
                    }
                }

                ?>
        <tr>
          <th colspan="3"><span style="font-family:Rockwell;font-size: 10px;">Total</th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totsad); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totsak); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totmtd); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totmtk); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totrld); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totrlk); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totnrd); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totnrk); ?></th>
        </tr>
        <tr>
          <th colspan="3"><span style="font-family:Rockwell;font-size: 10px;">Laba(Rugi)</th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format(abs($gdlb=$totrlk-$totrld)); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format(abs($gdnc=$totnrd-$totnrk)); ?></th>
        </tr>
        <tr>
          <th colspan="3"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;"></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format(abs($gdlb+$totrld)); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totrlk); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format($totnrd); ?></th>
          <th align="right"><span style="font-family:Rockwell;font-size: 10px;">Rp. <?= number_format(abs($gdnc+$totnrk)); ?></th>
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