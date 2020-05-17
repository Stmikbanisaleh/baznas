<div class="row">
    <div class="col-xs-1">
        <button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
            <a class="ace-icon fa fa-plus bigger-120"></a> Tambah Data
        </button>
    </div>
    <br>
    <br>
</div>
<div id="my-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form" id="formTambah">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Awal Pengumuman </label>
                                <div class="col-sm-6">
                                    <input type="date" id="awal" required name="awal" placeholder="" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Akhir Pengumuman </label>
                                <div class="col-sm-9">
                                    <input type="date" id="akhir" required name="akhir" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Waktu </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="waktu" id="waktu">
                                        <option value="P">Pagi</option>
                                        <option value="M">Malam</option>
                                        <option value="L">Pagi Malam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option value="" selected="selected">--Pilih Jenis Pengumuman--</option>
                                        <option value="J">Tulisan Berjalan</option>
                                        <option value="G">Gambar</option>
                                        <option value="W">Word</option>
                                        <option value="V">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Isi </label>
                                <div class="col-sm-9">
                                    <textarea id="isi" required name="isi" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File </label>
                                <div class="col-sm-9">
                                    <input type="file" id="file" name="file" placeholder="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                <div class="col-sm-9">
                                    <input type="text" id="keterangan" required name="keterangan" placeholder="keterangan" class="form-control" />
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
                <h3 class="smaller lighter blue no-margin">Form Edit Data <?= $page_name ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form" id="formEdit">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Awal Pengumuman </label>
                                <div class="col-sm-6">
                                    <input type="hidden" id="e_id" required name="e_id" placeholder="" class="form-control" />
                                    <input type="date" id="e_awal" required name="e_awal" placeholder="" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Akhir Pengumuman </label>
                                <div class="col-sm-9">
                                    <input type="date" id="e_akhir" required name="e_akhir" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Waktu </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_waktu" id="e_waktu">
                                        <option value="P">Pagi</option>
                                        <option value="M">Malam</option>
                                        <option value="L">Pagi Malam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_jenis" id="e_jenis">
                                        <option value="" selected="selected">--Pilih Jenis Pengumuman--</option>
                                        <option value="J">Tulisan Berjalan</option>
                                        <option value="G">Gambar</option>
                                        <option value="W">Word</option>
                                        <option value="V">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Isi </label>
                                <div class="col-sm-9">
                                    <textarea id="e_isi" required name="e_isi" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File </label>
                                <div class="col-sm-9">
                                    <input type="file" id="e_file" name="e_file" placeholder="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                <div class="col-sm-9">
                                    <input type="text" id="e_keterangan" required name="e_keterangan" placeholder="keterangan" class="form-control" />
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn_update" class="btn btn-sm btn-success pull-left">
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
            Semua Data Pengumuman
        </div>
    </div>
</div>
<table id="datatable_tabletools" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Awal Pengumuman</th>
            <th>Awal Pengumuman</th>
            <th>Waktu</th>
            <th>Jenis</th>
            <th>Isi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="show_data">
    </tbody>
</table>
<script type="text/javascript">
    if ($("#formImport").length > 0) {
        $("#formImport").validate({
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
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('guru/import') ?>",
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
                var formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('modulkasir/pengumuman/simpan') ?>",
                    dataType: "JSON",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
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
                    url: "<?php echo base_url('modulkasir/pengumuman/update') ?>",
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
        show_data();
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
                    url: "<?php echo base_url('modulkasir/pengumuman/delete') ?>",
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
            url: "<?php echo base_url('modulkasir/pengumuman/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].NoPengum);
                $('#e_awal').val(data[0].AwalTglPengum);
                $('#e_akhir').val(data[0].AkhirTGlPengum);
                $('#e_waktu').val(data[0].WaktuPengum);
                $('#e_jenis').val(data[0].JenisPengum);
                $('#e_isi').val(data[0].IsiPengum);
                $('#e_keterangan').val(data[0].keterangan);
            }
        });
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulkasir/pengumuman/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].AwalTglPengum + '</td>' +
                        '<td>' + data[i].AkhirTGlPengum + '</td>' +
                        '<td>' + data[i].WaktuPengum + '</td>' +
                        '<td>' + data[i].JenisPengum + '</td>' +
                        '<td>' + data[i].IsiPengum + '</td>' +
                        '<td >' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].NoPengum + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].NoPengum + '">' +
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