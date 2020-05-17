<div class="row">
    <div class="col-xs-1">
        <button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-info">
            <a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
        </button>
    </div>
    <br>
    <br>
    <form class="form-horizontal" role="form" id="formSearch">
        <div class="col-xs-3">
            <select class="form-control" name="tahun" id="tahun">
                <option value=>--Pilih Tahun--</option>
                <?php foreach ($mythnakad as $value) { ?>
                    <option value=<?= $value['THNAKAD'] ?>><?= $value['THNAKAD'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="semester" id="semester">
                <option value=>--Pilih Semester--</option>
                <?php foreach ($mysemester as $value) { ?>
                    <option value=<?= $value['SEMESTER'] ?>><?= $value['SEMESTER'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="programsekolah" id="programsekolah">
                <option value=>--Pilih Program --</option>
                <?php foreach ($myps as $value) { ?>
                    <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] . '-' . $value['SINGKTBPS'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-1">
            <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
                <a class="ace-icon fa fa-search bigger-120"></a>Periksa
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
                                <div class="col-sm-6">
                                    <select class="form-control" name="programsekolahs" id="programsekolahs">
                                        <option value=>--Pilih Program --</option>
                                        <?php foreach ($myps as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] . '-' . $value['DESCRTBJS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Mata ajar </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="kodemataajar" id="kodemataajar">
                                        <option value="0">-- Pilih Mata Ajar --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="semester" id="semester">
                                        <option value=>--Pilih Kelas --</option>
                                        <?php foreach ($mykelas as $value) { ?>
                                            <option value=<?= $value['id_kelas'] ?>><?= $value['nama'] ?></option>
                                        <?php } ?>
                                    </select>
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
                <h3 class="smaller lighter blue no-margin">Form Edit Data <?= $page_name; ?></h3>
            </div>
            <form class="form-horizontal" role="form" id="formEdit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah </label>
                                <div class="col-sm-6">
                                    <input type="hidden" id="e_id" name="e_id" />
                                    <select class="form-control" name="e_programsekolah" id="e_programsekolah">
                                        <option value=>--Pilih Program --</option>
                                        <?php foreach ($myps as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Mata ajar </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_kodemataajar" id="e_kodemataajar">
                                        <option value=>--Pilih Mata Ajar --</option>
                                        <?php foreach ($mypelajaran as $value) { ?>
                                            <option value=<?= $value['id_mapel'] ?>><?= $value['kode'] ?> - <?= $value['nama'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_semester" id="esemester">
                                        <option value=>--Pilih Kelas --</option>
                                        <?php foreach ($mykelas as $value) { ?>
                                            <option value=<?= $value['id_kelas'] ?>><?= $value['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Ubah
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
                <th>Kode Mata ajar</th>
                <th>Nama Mata ajar</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Program Sekolah</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script>
    if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                programsekolah: {
                    required: true
                },
                semester: {
                    required: true
                },
                tahun: {
                    required: true
                },
            },
            messages: {

                programsekolah: {
                    required: "Program sekolah harus diisi!"
                },
                semester: {
                    required: "Semester sekolah harus diisi!"
                },
                tahun: {
                    required: "tahun harus diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('mataajaraktif/search') ?>',
                    data: $('#formSearch').serialize(),
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
                            'Periksa');
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].kode + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].THNAKDTRMKA + '</td>' +
                                '<td>' + data[i].GANGENTRMKA + '</td>' +
                                '<td>' + data[i].DESCRTBPS + '</td>' +
                                '<td class="text-center">' + data[i].SMTTRMKA + '</td>' +
                                '<td class="text-center">' +
                                '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
                                '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                                '</button> &nbsp' +
                                '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].ID + '">' +
                                '<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
                                '</button>' +
                                '</td>' +
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
        })
    }

    if ($("#formTambah").length > 0) {
        $("#formTambah").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                id: {
                    required: true
                },
                jam: {
                    required: true
                },
                ps: {
                    required: true
                },
                namamataajar: {
                    required: true
                },
                semester: {
                    required: true,
                }
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('mataajaraktif/simpan') ?>",
                    type: "POST",
                    data: $('#formTambah').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
                            'Simpan');
                        if (response == true) {
                            document.getElementById("formTambah").reset();
                            swalInputSuccess();
                            $('#modalTambah').modal('hide');
                        } else if (response == 401) {
                            swalIdDouble('Kode Mata ajar Sudah digunakan!');
                        } else {
                            swalInputFailed();
                        }
                    }
                });
            }
        })
    }

    if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                e_id: {
                    required: true
                },
                e_jam: {
                    required: true
                },
                e_ps: {
                    required: true
                },
                e_namamataajar: {
                    required: true
                },
                e_semester: {
                    required: true,
                }
            },
            messages: {

                e_id: {
                    required: "Kode jabatan harus diisi!"
                },
                e_nama: {
                    required: "Nama jabatan harus diisi!"
                },

            },
            submitHandler: function(form) {
                $('#btn_edit').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('mataajaraktif/update') ?>",
                    type: "POST",
                    data: $('#formEdit').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
                            'Ubah');
                        if (response == true) {
                            document.getElementById("formEdit").reset();
                            swalEditSuccess();
                            $('#modalEdit').modal('hide');
                        } else if (response == 401) {
                            swalIdDouble('Kode Jabatan Sudah digunakan!');
                        } else {
                            swalEditFailed();
                        }
                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
        $("#programsekolahs").change(function() {
            var ps = $('#programsekolahs').val();
            $.ajax({
                type: "POST",
                url: "jadwal/showmapel",
                data: {
                    ps: ps
                }
            }).done(function(data) {
                $("#kodemataajar").html(data);
            });
        });
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('mataajaraktif/search') ?>',
            data: $('#formSearch').serialize(),
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
                    'Periksa');
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].KDMKTRMKA + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + data[i].THNAKDTRMKA + '</td>' +
                        '<td>' + data[i].GANGENTRMKA + '</td>' +
                        '<td>' + data[i].DESCRTBPS + '</td>' +
                        '<td class="text-right">' + data[i].SMTTRMKA + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].ID + '">' +
                        '<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
                        '</button>' +
                        '</td>' +
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
            url: "<?php echo base_url('mataajaraktif/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].ID);
                $('#e_programsekolah').val(data[0].PSTRMKA);
                $('#e_kodemataajar').val(data[0].KDMKTRMKA);
                $('#e_semester').val(data[0].SMTTRMKA);
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
                    url: "<?php echo base_url('mataajaraktif/delete') ?>",
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