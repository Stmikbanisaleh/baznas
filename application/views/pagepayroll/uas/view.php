<div class="row">
    <div class="col-xs-6">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form" id="formSearch">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Dapodik </label>
                <div class="col-sm-9">
                    <?php if (!empty($guru[0]['GuruNoDapodik'])) { ?>
                        <input type="text" disabled id="kddapodik" value="<?php echo $guru[0]['GuruNoDapodik']; ?>" name="kddapodik" placeholder="kode Dapodik" class="form-control" />
                    <?php } else { ?>
                        <input type="text" disabled id="kddapodik" value="No Dapotik belum ada" name="kddapodik" placeholder="kode Dapodik" class="form-control" />
                    <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
                <div class="col-sm-9">
                    <input type="hidden" id="gurunama" value="<?php echo $guru[0]['GuruNama']; ?>" name="gurunama" />
                    <input type="text" disabled id="gurunama2" value="<?php echo $guru[0]['GuruNama']; ?>" name="gurunama2" placeholder="nama siswa" class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mata Pelajaran </label>
                <div class="col-sm-9">
                    <select class="form-control" name="mapel" id="mapel">
                        <option value="">-- Pilih Pelajaran --</option>
                        <?php foreach ($mypelajaran as $value) { ?>
                            <option value=<?= $value['id'] ?>><?= $value['ps'] . '-' . $value['nama'] . '[' . $value['kelas'] . '' . $value['RUANG'] . ']' . ' Jam Ke [' . $value['jam'] . ']' ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" id="btn_tampilkan" class="btn btn-xs btn-info pull-right">
                <i class="ace-icon fa fa-search bigger-120"></i>
                Tampilkan
            </button>
            <br>
            <br>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Form Nilai Uts
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Nama Kelas</th>
                <th>Jam</th>
                <th>Nama Siswa</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Action</th>
            </tr>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
        </thead>
        <?php
        if ($this->input->get('mapel')) {
            $mapel = $this->input->get('mapel');
            $data = $this->db->query("SELECT
        tbjadwal.hari,
        tbjadwal.NMKLSTRJDK,
        tbjadwal.JAM,
        mssiswa.NMSISWA,
        trnilai.UTSTRNIL,
        trnilai.UASTRNIL,
        tbjadwal.id,
        tbkrs.id_krs,
        mssiswa.NOINDUK,
        tbjadwal.id_mapel,
        (trnilai.ID)AS idnilai
        FROM
        tbjadwal
        INNER JOIN tbkrs ON tbjadwal.id = tbkrs.id_jadwal
        INNER JOIN mssiswa ON tbkrs.NIS = mssiswa.NOINDUK
        LEFT JOIN trnilai ON tbkrs.id_krs = trnilai.IDKRS
        WHERE
        tbjadwal.id = '" . $mapel . "'")->result_array(); ?>
            <tbody>
                <tr>
                    <?php
                    $no = 1;
                    foreach ($data as $value) { ?>
                        <td><?= $no; ?></td>
                        <td><?= $value['hari']; ?></td>
                        <td><?= $value['NMKLSTRJDK']; ?></td>
                        <td><?= $value['JAM']; ?></td>
                        <td><?= $value['NMSISWA']; ?></td>
                        <input name="id_krs" id="id_krs<?= $no ?>" type="hidden" value="<?= $value['id_krs'] ?>" />
                        <input name="NMKLSTRJDK" id="NMKLSTRJDK<?= $no ?>" type="hidden" value="<?= $value['NMKLSTRJDK'] ?>" />
                        <input name="nis" id="nis<?= $no ?>" type="hidden" value="<?= $value['NOINDUK'] ?>" />
                        <input name="id_mapel" id="id_mapel<?= $no ?>" type="hidden" value="<?= $value['id_mapel'] ?>" />
                        <input name="idjadwal" id="idjadwal<?= $no ?>" type="hidden" value="<?= $value['id'] ?>" />
                        <input name="idnilai<?= $no ?>" id="idnilai<?= $no ?>" type="hidden" value="<?= $value['idnilai'] ?>">
                        <td><input name="nilai<?= $no ?>" id="nilai<?= $no ?>" type="text" readonly value="<?= $value['UTSTRNIL'] ?>"></td>
                        <td><input name="nilaiuas<?= $no ?>" id="nilaiuas<?= $no ?>" maxlength="3" max="100" type="text" value="<?= $value['UASTRNIL'] ?>"></td>
                        <td style="text-align:center">
                            <button class="btn btn-xs btn-success" id="simpan<?= $no ?>" title="">
                                Simpan
                            </button>
                            <div id="pes<?= $no ?>">
                        </td>
                </tr>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#uts<?= $no ?>").keypress(function(event) {
                            if (event.keyCode == 13) {
                                var nilai = $("#nilai<?= $no ?>").val();
                                var nis = $("#nis<?= $no ?>").val();
                                var uas = $("#nilaiuas<?= $no ?>").val();
                                var idjadwal = $("#idjadwal<?= $no ?>").val();
                                var id_krs = $("#id_krs<?= $no ?>").val();
                                var NMKLSTRJDK = $("#NMKLSTRJDK<?= $no ?>").val();
                                var id_mapel = $("#id_mapel<?= $no ?>").val();
                                var idnilai = $("#idnilai<?= $no ?>").val();
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo site_url('modulguru/uas/simpannilai') ?>',
                                    data: "nilai=" + nilai + "&nis=" + nis + "&idjadwal=" + idjadwal + "&id_krs=" + id_krs + "&NMKLSTRJDK=" + NMKLSTRJDK + "&id_mapel=" + id_mapel + "&idnilai=" + idnilai + "&nilaiuas=" + uas,
                                    cache: false,
                                    success: function(data) {
                                        $("#pes<?= $no ?>").html("Tersimpan").show();
                                    }
                                });
                                //	return false;
                                $("#nilai<?= $no + 1 ?>").focus();
                            }
                        });
                        $("#simpan<?= $no ?>").click(function(event) {
                            var nilai = $("#nilai<?= $no ?>").val();
                            var nis = $("#nis<?= $no ?>").val();
                            var uas = $("#nilaiuas<?= $no ?>").val();
                            var idjadwal = $("#idjadwal<?= $no ?>").val();
                            var id_krs = $("#id_krs<?= $no ?>").val();
                            var NMKLSTRJDK = $("#NMKLSTRJDK<?= $no ?>").val();
                            var id_mapel = $("#id_mapel<?= $no ?>").val();
                            var idnilai = $("#idnilai<?= $no ?>").val();
                            $.ajax({
                                type: "POST",
                                url: '<?php echo site_url('modulguru/uas/simpannilai') ?>',
                                data: "nilai=" + nilai + "&nis=" + nis + "&idjadwal=" + idjadwal + "&id_krs=" + id_krs + "&NMKLSTRJDK=" + NMKLSTRJDK + "&id_mapel=" + id_mapel + "&idnilai=" + idnilai + "&nilaiuas=" + uas,
                                cache: false,
                                success: function(data) {
                                    $("#pes<?= $no ?>").html("Tersimpan").show();
                                }
                            });
                            //	return false;
                            $("#nilai<?= $no + 1 ?>").focus();
                        });
                    });
                </script>
            <?php $no++;
                    } ?>

            </tbody>
        <?php } ?>
    </table>
</div>
<script type="text/javascript">
    if ($("#formTambah").length > 0) {
        $("#formTambah").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                nama: {
                    required: true,
                },
                telepon: {
                    required: true,
                    digits: true,
                    maxlength: 14,
                    minlength: 10,
                },
                alamat: {
                    required: true,
                    minlength: 10,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                nama: {
                    required: "Nama Guru harus diisi!"
                },
                telepon: {
                    required: "Telepon harus diisi!"
                },
                alamat: {
                    required: "Harap Masukan alamat dengan benar!"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('guru/simpan') ?>",
                    dataType: "JSON",
                    data: $('#formTambah').serialize(),
                    success: function(data) {
                        $('#my-modal').modal('hide');
                        if (data == 1) {
                            document.getElementById("formTambah").reset();
                            swalInputSuccess();
                            show_data();
                        } else if (data == 401) {
                            document.getElementById("formTambah").reset();
                            swalIdDouble();
                        } else {
                            document.getElementById("formTambah").reset();
                            swalInputFailed();
                        }
                    }
                });
                return false;
            }
        });
    }

    if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                nama: {
                    required: true,
                },
                telepon: {
                    required: true,
                    digits: true,
                    maxlength: 14,
                    minlength: 10,
                },
                alamat: {
                    required: true,
                    minlength: 10,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                nama: {
                    required: "Nama Guru harus diisi!"
                },
                telepon: {
                    required: "Telepon harus diisi!"
                },
                alamat: {
                    required: "Harap Masukan alamat dengan benar!"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('guru/update') ?>",
                    dataType: "JSON",
                    data: $('#formEdit').serialize(),
                    success: function(data) {
                        $('#modalEdit').modal('hide');
                        if (data == 1) {
                            document.getElementById("formEdit").reset();
                            swalEditSuccess();
                            show_data();
                        } else if (data == 401) {
                            document.getElementById("formEdit").reset();
                            swalIdDouble();
                        } else {
                            document.getElementById("formEdit").reset();
                            swalEditFailed();
                        }
                    }
                });
                return false;
            }
        });
    }

    $(document).ready(function() {
        $('#datatable_tabletools').DataTable();
    });
</script>