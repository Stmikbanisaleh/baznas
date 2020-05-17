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
                            <option value=<?= $value['id'] ?>><?= $value['ps'] . '-' . $value['nama'] . '[' . $value['kelas'] .''. $value['RUANG'].']' . ' Jam Ke [' . $value['jam'] . ']' ?></option>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
        <?php
        if ($this->input->get('mapel')) {
            $mapel = $this->input->get('mapel');
            $data = $this->db->query("SELECT
        tbjadwal.hari,
        tbjadwal.NMKLSTRJDK,
        tbjadwal.JAM,
        mssiswa.NMSISWA,
        trnilai.UTSTRNIL,
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
                        <td><input name="nilai<?= $no ?>" id="nilai<?= $no ?>" maxlength="3" max="100" type="text" value="<?= $value['UTSTRNIL'] ?>"></td>
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
                                var idjadwal = $("#idjadwal<?= $no ?>").val();
                                var id_krs = $("#id_krs<?= $no ?>").val();
                                var NMKLSTRJDK = $("#NMKLSTRJDK<?= $no ?>").val();
                                var id_mapel = $("#id_mapel<?= $no ?>").val();
                                var idnilai = $("#idnilai<?= $no ?>").val();
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo site_url('modulguru/uts/simpannilai') ?>',
                                    data: "nilai=" + nilai + "&nis=" + nis + "&idjadwal=" + idjadwal + "&id_krs=" + id_krs + "&NMKLSTRJDK=" + NMKLSTRJDK + "&id_mapel=" + id_mapel + "&idnilai=" + idnilai,
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
                            var idjadwal = $("#idjadwal<?= $no ?>").val();
                            var id_krs = $("#id_krs<?= $no ?>").val();
                            var NMKLSTRJDK = $("#NMKLSTRJDK<?= $no ?>").val();
                            var id_mapel = $("#id_mapel<?= $no ?>").val();
                            var idnilai = $("#idnilai<?= $no ?>").val();
                            $.ajax({
                                type: "POST",
                                url: '<?php echo site_url('modulguru/uts/simpannilai') ?>',
                                data: "nilai=" + nilai + "&nis=" + nis + "&idjadwal=" + idjadwal + "&id_krs=" + id_krs + "&NMKLSTRJDK=" + NMKLSTRJDK + "&id_mapel=" + id_mapel + "&idnilai=" + idnilai,
                                cache: false,
                                success: function(data) {
                                    $("#pes<?= $no ?>").html("Tersimpan").show();
                                    // $("#pesan<?= $no ?>").html(data);
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

    //Simpan guru

    $('#show_data').on('click', '.item_hapus', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('guru/delete') ?>",
                    async: true,
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        show_data();
                        swalDeleteSuccess();
                    }
                });
            }
        })
    })

    $('#show_data').on('click', '.item_edit', function() {
        var id = $(this).data('id');
        $('#modalEdit').modal('show');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('guru/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].id);
                $('#e_IdGuru').val(data[0].IdGuru);
                $('#e_GuruNoDapodik').val(data[0].GuruNoDapodik);
                $('#e_nama').val(data[0].GuruNama);
                $('#e_telepon').val(data[0].GuruTelp);
                $('#e_alamat').val(data[0].GuruAlamat);
                $('#e_program_sekolah').val(data[0].GuruBase);
                $('#e_jenis_kelamin').val(data[0].GuruJeniskelamin);
                $('#e_pendidikan_terakhir').val(data[0].GuruPendidikanAkhir);
                $('#e_agama').val(data[0].GuruAgama);
                $('#e_email').val(data[0].GuruEmail);
                $('#e_tgl_lahir').val(data[0].GuruTglLahir);
                $('#e_tempat_lahir').val(data[0].GuruTempatLahir);
                $('#e_status').val(data[0].GuruStatus);
            }
        });
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulguru/uts/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].DESCRTBPS + '</td>' +
                        '<td>' + data[i].IdGuru + '</td>' +
                        '<td>' + data[i].GuruNoDapodik + '</td>' +
                        '<td>' + data[i].GuruNama + '</td>' +
                        '<td>' + data[i].GuruTelp + '</td>' +
                        '<td>' + data[i].GuruAlamat + '</td>' +
                        '<td>' + data[i].GuruJeniskelamin + '</td>' +
                        '<td>' + data[i].NMMSPENDIDIKAN + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id + '">' +
                        '<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>';
                    no++;
                }
                $("#datatable_tabletools").dataTable().fnDestroy();
                var a = $('#show_data').html(html);
                //                    $('#mydata').dataTable();
                if (a) {
                    $('#datatable_tabletools').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false
                    });
                }
                /* END TABLETOOLS */
            }

        });
    }
</script>