<div class="row">
    <form class="form-horizontal" role="form" id="formSearch">
        <div class="col-xs-3">
            <input type="number" maxlength="4" class="form-control" name="tahunmasuk" id="tahunmasuk" placeholder="Tahun Masuk (2020)"></textarea>
        </div>
        <div class="col-xs-3">
            <input type="number" class="form-control" name="kode" id="kode" placeholder="Kode Internal (1212121)"></textarea>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="jurusan" id="jurusan">
                <option>-- Pilih Jurusan --</option>
                <?php foreach ($myjurusan as $value) { ?>
                    <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBJS'] . ' - ' . $value['DESCRTBPS'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-xs-1">
            <button type="submit" id="btn_search" class="btn btn-sm btn-info pull-left">
                <a class="ace-icon fa fa-refresh bigger-120"></a>Proses
            </button>
        </div>
        <br>
        <br>
    </form>
</div>
<div id="modalTambah" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name; ?></h3>
            </div>
            <form class="form-horizontal" role="form" id="formTambah">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="programsekolahs" id="programsekolahs">
                                        <option value="0">Status</option>
                                        <?php foreach ($myps as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Guru </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="guru" id="guru">
                                        <option value="0">-- Status --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mata Ajar </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="mataajar" id="mataajar">
                                        <option value="0">-- Status --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hari </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="hari" id="hari">
                                        <option value="0">-- Status --</option>
                                        <?php foreach ($myhari as $value) { ?>
                                            <option value=<?= $value['nama'] ?>><?= $value['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ruang </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="ruang" id="ruang">
                                        <option value="0">-- Status --</option>
                                        <?php foreach ($myruang as $value) { ?>
                                            <option value=<?= $value['ID'] ?>><?= $value['RUANG'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jam </label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="jam" id="jam" placeholder="8.30"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Simpan
                    </button>
                    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Batal
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="modalEdit" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Form Import Jadwal <?= $page_name; ?></h3>
            </div>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" id="formEdit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Import Excel FIle </label>
                                <div class="col-sm-6">
                                    <input type="file" id="file" required name="file" class="form-control" />
                                    <input type="hidden" id="e_id" required name="e_id" class="form-control" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sample </label>
                                <div class="col-sm-9">
                                    <a href="<?php echo base_url() . 'assets/krs_siswa.xls'; ?>" for="form-field-1"> Download Sample Format </label></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Import
                    </button>
                    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Batal
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Semua Data <?= $page_name; ?>
        </div>
    </div>
</div>
<br>
<div class="table-responsive">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th>No Registrasi</th>
                <th>Nama</th>
                <th>Tanggal Bayar</th>
                <th>Total Bayar</th>
                <th>Sekolah</th>
                <th>Tahun Masuk</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script>
    if ($("#formTambah").length > 0) {
        $("#formTambah").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                nama: {
                    required: true
                },
                kelas: {
                    required: true
                },
                ruang: {
                    required: true
                },
                jam: {
                    required: true
                },
                hari: {
                    required: true
                },
                guru: {
                    required: true
                },
            },
            messages: {

                id: {
                    required: "Kode jabatan harus diisi!"
                },
                nama: {
                    required: "Nama jabatan harus diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('jadwal/simpan') ?>",
                    type: "POST",
                    data: $('#formTambah').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
                            'Simpan');
                        if (response == true) {
                            document.getElementById("formTambah").reset();
                            swalInputSuccess();
                            show_data();
                            $('#modalTambah').modal('hide');
                        } else if (response == 401) {
                            swalIdDouble('Nama Jabatan Sudah digunakan!');
                        } else {
                            swalInputFailed();
                        }
                    }
                });
            }
        })
    }


    if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                tahunmasuk: {
                    required: true
                },

                kode: {
                    required: true
                },
                jurusan: {
                    required: true
                },
            },
            messages: {
                required: {
                    tahunmasuk: "Tahun Wajib diisi"
                },

                required: {
                    kode: "Kode Wajib diisi"
                },
                required: {
                    jurusan: "Tahun Wajib diisi"
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Processing..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('pembuatannis/proses') ?>',
                    data: $('#formSearch').serialize(),
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $('#btn_search').html('<i class="ace-icon fa fa-refresh"></i>' +
                            'Proses');
                        if (data == 1 || data == true) {
                            document.getElementById("formSearch").reset();
                            swalGenerateSuccess();
                            show_data();
                        } else {
                            swalInputFailed();
                        }
                    }
                });

            }
        })
    }
    if ($("#formImport").length > 0) {
        $("#formImport").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('jadwal/import') ?>",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        console.log(data);
                        $('#my-modal2').modal('hide');
                        if (data == 1 || data == true) {
                            document.getElementById("formImport").reset();
                            swalInputSuccess();
                            show_data();
                        } else if (data == 401) {
                            document.getElementById("formImport").reset();
                            swalIdDouble();
                        } else {
                            document.getElementById("formImport").reset();
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
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('jadwal/import') ?>",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        console.log(data);
                        $('#modalEdit').modal('hide');
                        if (data == 1 || data == true) {
                            document.getElementById("formEdit").reset();
                            swalInputSuccess();
                            show_data();
                        } else if (data == 401) {
                            document.getElementById("formEdit").reset();
                            swalIdDouble();
                        } else {
                            document.getElementById("formEdit").reset();
                            swalInputFailed();
                        }
                    }
                });
                return false;
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        show_data();
        $('#table_id').DataTable();
        $("#programsekolahs").change(function() {
            var ps = $('#programsekolahs').val();
            $.ajax({
                type: "POST",
                url: "jadwal/showguru",
                data: {
                    ps: ps
                }
            }).done(function(data) {
                $("#guru").html(data);
            });
        });

        $("#programsekolahs").change(function() {
            var ps = $("#programsekolahs").val();
            $.ajax({
                type: "POST",
                url: "jadwal/showmapel",
                data: {
                    ps: ps
                }
            }).done(function(data) {
                $("#mataajar").html(data);
            });
        });

    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('pembuatannis/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].Noreg + '</td>' +
                        '<td>' + data[i].Namacasis + '</td>' +
                        '<td>' + data[i].tglbayar + '</td>' +
                        '<td>' + data[i].totalbayar2 + '</td>' +
                        '<td>' + data[i].DESCRTBPS +  '-' + data[i].DESCRTBJS + '</td>' +
                        '<td>' + data[i].thnmasuk + '</td>' +
                        '</tr>';
                    no++;
                }
                $("#table_id").dataTable().fnDestroy();
                var a = $('#show_data').html(html);
                //                    $('#mydata').dataTable();
                if (a) {
                    $('#table_id').dataTable({
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

    //show modal tambah
    $('#item-tambah').on('click', function() {
        $('#modalTambah').modal('show');
    });

    //get data for update record
    $('#show_data').on('click', '.item_edit', function() {
        document.getElementById("formEdit").reset();
        var id = $(this).data('id');
        $('#modalEdit').modal('show');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('jadwal/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                console.log(data);
                $('#e_id').val(data[0].id);
                $('#e_nama').val(data[0].NAMAJABATAN);
                $('#e_keterangan').val(data[0].KET);

            }
        });
    });

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
                    url: "<?php echo base_url('jabatan/delete') ?>",
                    async: true,
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        show_data();
                        Swal.fire(
                            'Terhapus!',
                            'Data sudah dihapus.',
                            'success'
                        )
                    }
                });
            }
        })
    })
</script>