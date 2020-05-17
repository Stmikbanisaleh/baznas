<div class="row">
    <form class="form-horizontal" role="form" id="formSearch">
        <div class="col-xs-3">
            <input type="text" required class="form-control" name="noreg" id="noreg" placeholder="No Registrasi"></textarea>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="sekolah" id="sekolah">
                <?php foreach ($mysekolah as $value) { ?>
                    <option value=<?= $value['kodesekolah'] ?>> <?= $value['sekolah'] . "-" . $value['NamaJurusan']; ?></option>
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

<div id="modalEdit" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Form <?= $page_name; ?></h3>
            </div>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" id="formEdit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Registrasi </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_noreg" required name="e_noreg" readonly class="form-control" />
                                    <input type="hidden" id="e_id" required name="e_id" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sekolah </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_sekolah" id="e_sekolah">
                                        <?php foreach ($mysekolah as $value) { ?>
                                            <option value=<?= $value['kodesekolah'] ?>> <?= $value['sekolah'] . "-" . $value['NamaJurusan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_jk" id="e_jk">
                                        <?php foreach ($myrev as $value) { ?>
                                            <option value=<?= $value['KETERANGAN'] ?>> <?= $value['NAMA_REV'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>
                                <div class="col-sm-6">
                                    <input type="date" id="e_tglhr" name="e_tglhr" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_nama" readonly name="e_nama" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_agama" id="e_agama">
                                        <?php foreach ($myagama as $value) { ?>
                                            <option value=<?= $value['KETERANGAN'] ?>> <?= $value['NAMA_REV'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat lahir </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_tmplhr" name="e_tmplhr" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Rumah </label>
                                <div class="col-sm-6">
                                    <textarea id="e_alamat" required placeholder="Masukan Alamat" name="e_alamat" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Update
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
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Action</th>
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
                programsekolah: {
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
                tahun: {
                    required: "tahun harus diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('pengembalianformulir/search') ?>',
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
                                '<td>' + data[i].Noreg + '</td>' +
                                '<td>' + data[i].Namacasis + '</td>' +
                                '<td>' + data[i].Jk + '</td>' +
                                '<td>' + data[i].agama + '</td>' +
                                '<td>' + data[i].kodesekolah + '-' + data[i].NamaJurusan + '</td>' +
                                '<td>' + data[i].tgllhr + '</td>' +
                                '<td>' + data[i].tptlhr + '</td>' +
                                '<td class="text-center">' +
                                '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].Noreg + '">' +
                                '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
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

    if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('pengembalianformulir/update') ?>",
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
                        } else if (data == 401) {
                            document.getElementById("formEdit").reset();
                            swalIdDouble();
                        } else {
                            document.getElementById("formEdit").reset();
                            swalInputSuccess();

                        }
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('pengembalianformulir/search') ?>',
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
                                '<td>' + data[i].Noreg + '</td>' +
                                '<td>' + data[i].Namacasis + '</td>' +
                                '<td>' + data[i].Jk + '</td>' +
                                '<td>' + data[i].agama + '</td>' +
                                '<td>' + data[i].kodesekolah + '-' + data[i].NamaJurusan + '</td>' +
                                '<td>' + data[i].tgllhr + '</td>' +
                                '<td>' + data[i].tptlhr + '</td>' +
                                '<td class="text-center">' +
                                '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].Noreg + '">' +
                                '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
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
                return false;
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('jadwal/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].NAMAJABATAN + '</td>' +
                        '<td>' + data[i].KET + '</td>' +
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
            url: "<?php echo base_url('pengembalianformulir/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].Noreg);
                $('#e_sekolah').val(data[0].kodesekolah);
                $('#e_nama').val(data[0].Namacasis);
                $('#e_noreg').val(data[0].Noreg);
                $('#e_agama').val(data[0].agama);
                $('#e_tglhr').val(data[0].tgllhr);
                $('#e_tmplhr').val(data[0].tptlhr);
                $('#e_nmbapak').val(data[0].NmBapak);
                $('#e_nmibu').val(data[0].NmIbu);
                $('#e_alamat').val(data[0].AlamatRumah);
                $('#e_jk').val(data[0].Jk);
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