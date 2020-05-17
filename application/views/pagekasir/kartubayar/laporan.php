<?php
// require("../config/config.default.php");
// $query = "SELECT
// jurnal.kode_jurnal,
// jurnal.nama_jurnal
// FROM
// parameter
// INNER JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal";
// $assistant = mysql_query($query);
// $num_assistant = mysql_num_rows($assistant);
// for ($i = 0; $i < $num_assistant; $i++) {
//     $row = mysql_fetch_object($assistant);
//     $v_kode_jurnal = $row->kode_jurnal;
//     $v_nama_jurnal = $row->nama_jurnal;
// }
// function kekata($x)
// {
//     $x = abs($x);
//     $angka = array(
//         "", "satu", "dua", "tiga", "empat", "lima",
//         "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
//     );
//     $temp = "";
//     if ($x < 12) {
//         $temp = " " . $angka[$x];
//     } else if ($x < 20) {
//         $temp = kekata($x - 10) . " belas";
//     } else if ($x < 100) {
//         $temp = kekata($x / 10) . " puluh" . kekata($x % 10);
//     } else if ($x < 200) {
//         $temp = " seratus" . kekata($x - 100);
//     } else if ($x < 1000) {
//         $temp = kekata($x / 100) . " ratus" . kekata($x % 100);
//     } else if ($x < 2000) {
//         $temp = " seribu" . kekata($x - 1000);
//     } else if ($x < 1000000) {
//         $temp = kekata($x / 1000) . " ribu" . kekata($x % 1000);
//     } else if ($x < 1000000000) {
//         $temp = kekata($x / 1000000) . " juta" . kekata($x % 1000000);
//     } else if ($x < 1000000000000) {
//         $temp = kekata($x / 1000000000) . " milyar" . kekata(fmod($x, 1000000000));
//     } else if ($x < 1000000000000000) {
//         $temp = kekata($x / 1000000000000) . " trilyun" . kekata(fmod($x, 1000000000000));
//     }
//     return $temp;
// }


// function terbilang($x, $style = 4)
// {
//     if ($x < 0) {
//         $hasil = "minus " . trim(kekata($x));
//     } else {
//         $hasil = trim(kekata($x));
//     }
//     switch ($style) {
//         case 1:
//             $hasil = strtoupper($hasil);
//             break;
//         case 2:
//             $hasil = strtolower($hasil);
//             break;
//         case 3:
//             $hasil = ucwords($hasil);
//             break;
//         default:
//             $hasil = ucfirst($hasil);
//             break;
//     }
//     return $hasil;
// }
// function format_rupiah($angka)
// {
//     $rupiah = number_format($angka, 0, ',', '.');
//     return $rupiah;
// }
// $awal = $_POST[awal];
// switch ($awal) {
//     case 1:
//         $v_awal = "Januari";
//         break;
//     case 2:
//         $v_awal = "Februari";
//         break;
//     case 3:
//         $v_awal = "Maret";
//         break;
//     case 4:
//         $v_awal = "April";
//         break;
//     case 5:
//         $v_awal = "Mei";
//         break;
//     case 6:
//         $v_awal = "Juni";
//         break;
//     case 7:
//         $v_awal = "Juli";
//         break;
//     case 8:
//         $v_awal = "Agustus";
//         break;
//     case 9:
//         $v_awal = "September";
//         break;
//     case 10:
//         $v_awal = "Oktober";
//         break;
//     case 11:
//         $v_awal = "November";
//         break;
//     case 12:
//         $v_awal = "Desember";
//         break;
// }
// $akhir = $_POST[akhir];
// switch ($akhir) {
//     case 1:
//         $v_akhir = "Januari";
//         break;
//     case 2:
//         $v_akhir = "Februari";
//         break;
//     case 3:
//         $v_akhir = "Maret";
//         break;
//     case 4:
//         $v_akhir = "April";
//         break;
//     case 5:
//         $v_akhir = "Mei";
//         break;
//     case 6:
//         $v_akhir = "Juni";
//         break;
//     case 7:
//         $v_akhir = "Juli";
//         break;
//     case 8:
//         $v_akhir = "Agustus";
//         break;
//     case 9:
//         $v_akhir = "September";
//         break;
//     case 10:
//         $v_akhir = "Oktober";
//         break;
//     case 11:
//         $v_akhir = "November";
//         break;
//     case 12:
//         $v_akhir = "Desember";
//         break;
// }
// $query = "SELECT
// SUM(Nilai)AS nml
// FROM
// transaksi_buk
// INNER JOIN jurnal ON transaksi_buk.no_rek = jurnal.kode_jurnal
// WHERE Tgl_bukti <'" . $_POST[tahun] . "-" . $_POST[awal] . "-01'";
// $assistant = mysql_query($query);
// $num_assistant = mysql_num_rows($assistant);
// for ($i = 0; $i < $num_assistant; $i++) {
//     $row = mysql_fetch_object($assistant);
//     $v_nml = $row->nml;
// }
?>
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="30%" align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                    <th width="40%" rowspan="3"><span style="font-family:Rockwell;font-size: 16px;"><b>KARTU PEMBAYARAN</b><br>
                            <b>SMP MUTIARA INSAN NUSANTARA</b>
                    </th>
                    <th width="30%"></th>
                </tr>
                <tr>
                    <th align="left"></th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                </tr>
                <tr>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                    <th align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                </tr>
            </table>
            <table width="100%" cellpadding="5" cellspacing="2">
                <tr>
                    <th width="20%" align="left"><span style="font-family:Rockwell;font-size: 10px;"></th>
                    <th width="60%" rowspan="3">
                        <table width="90%">
                            <tr>
                                <th align="center"><span style="font-family:Rockwell;font-size: 12px;">TANGGAL</th>
                                <th align="center"><span style="font-family:Rockwell;font-size: 12px;">PEMBAYARAN</th>
                                <th align="center"><span style="font-family:Rockwell;font-size: 12px;">KETERANGAN</th>
                            </tr>
                            <?php
                            $data = $this->db->query("SELECT * from pembayaran_sekolah  WHERE NIS ='" . $siswa . "' AND Nopembayaran BETWEEN '".$dari."' AND '".$sampai."'
                                ORDER BY DATE_FORMAT(tglentri,'%Y%m%d')")->result_array();
                            $no = 1;
                            foreach ($data as $r) {

                                ?>
                                <?php

                                    ?>
                                <?php if ($this->input->post('nopembayaran') != '') { ?>
                                    <?php if ($r['Nopembayaran'] == $this->input->post('nopembayaran')) { ?>
                                        <tr>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= date('d-m-Y', strtotime($r['tglentri'])); ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= $r['TotalBayar']; ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;">
                                                     <?php
                                                                $qu = $this->db->query("SELECT kodejnsbayar 
                                                                FROM detail_bayar_sekolah 
                                                                WHERE Nopembayaran = '" . $r['Nopembayaran'] . "'")->result_array();
                                                                if (!empty($qu)){
                                                                   echo $qu[0]['kodejnsbayar'];
                                                                } else {
                                                                    echo "";
                                                                }
                                                                
                                                    ?>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= date('d-m-Y', strtotime($r['tglentri'])); ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= $r['TotalBayar']; ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;">
                                                  <?php
                                                                $qu = $this->db->query("SELECT kodejnsbayar 
                                                                FROM detail_bayar_sekolah 
                                                                WHERE Nopembayaran = '" . $r['Nopembayaran'] . "'")->result_array();
                                                                if (!empty($qu)){
                                                                   echo $qu[0]['kodejnsbayar'];
                                                                } else {
                                                                    echo "";
                                                                }
                                                                
                                                    ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($this->input->post('nopembayaran') == '') { ?>
                                    <?php if ($r['Nopembayaran'] >= $this->input->post('nopembayarandari') and $r['Nopembayaran'] <= $this->input->post('nopembayaransampai')) { ?>
                                        <tr>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= date('d-m-Y', strtotime($r['tglentri'])); ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= $r['TotalBayar']; ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;">
                                                    <?php
                                                                $qu = $this->db->query("SELECT kodejnsbayar 
                                                                FROM detail_bayar_sekolah 
                                                                WHERE Nopembayaran = '" . $r['Nopembayaran'] . "'")->result_array();
                                                                if (!empty($qu)){
                                                                   echo $qu[0]['kodejnsbayar'];
                                                                } else {
                                                                    echo "";
                                                                }
                                                                
                                                    ?>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= date('d-m-Y', strtotime($r['tglentri'])); ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;"><?= $r['TotalBayar']; ?></td>
                                            <td align="center"><span style="font-family:Rockwell;font-size: 12px;">
                                                    <?php
                                                                $qu = $this->db->query("SELECT kodejnsbayar 
                                                                FROM detail_bayar_sekolah 
                                                                WHERE Nopembayaran = '" . $r['Nopembayaran'] . "'")->result_array();
                                                                if (!empty($qu)){
                                                                   echo $qu[0]['kodejnsbayar'];
                                                                } else {
                                                                    echo "";
                                                                }
                                                                
                                                    ?>
                                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                    </th>
                </tr>
            <?php } ?>
            </table>
            </th>
            <th width="20%"></th>
            </tr>

            </table>