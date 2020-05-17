<div class="row">
    <div class="col-xs-1">
        <button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-info">
            <a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
        </button>
    </div>
    <br>
    <br>
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester </label>
                                <div class="col-sm-6">
                                    <input type="text" id="semester" name="semester" placeholder="GANJIL/GENAP" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun </label>
                                <div class="col-sm-6">
                                    <input type="number" id="tahun" name="tahun" placeholder="2020" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                                <div class="col-sm-6">
                                    <input type="text" id="tahun_akad" name="tahun_akad" placeholder="2020/2021" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> UTS / UAS </label>
                                <div class="col-sm-6">
                                    <input type="text" id="uts_uas" name="uts_uas" placeholder="UTS / UAS" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Indek </label>
                                <div class="col-sm-6">
                                    <input type="text" id="indek" name="indek" placeholder="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Dapodik </label>
                                <div class="col-sm-6">
                                    <input type="text" id="thndapodik" name="thndapodik" placeholder="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Sekolah </label>
                                <div class="col-sm-6">
                                    <input type="text" id="kdsekolah" name="kdsekolah" placeholder="" class="form-control" />
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester </label>
                                <div class="col-sm-6">
                                    <input type="hidden" id="e_id" name="e_id"/>
                                    <input type="text" id="e_semester" name="e_semester" placeholder="GANJIL/GENAP" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun </label>
                                <div class="col-sm-6">
                                    <input type="number" id="e_tahun" name="e_tahun" placeholder="2020" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_tahun_akad" name="e_tahun_akad" placeholder="2020/2021" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> UTS / UAS </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_uts_uas" name="e_uts_uas" placeholder="UTS / UAS" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Indek </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_indek" name="e_indek" placeholder="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Dapodik </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_thndapodik" name="e_thndapodik" placeholder="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Sekolah </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_kdsekolah" name="e_kdsekolah" placeholder="" class="form-control" />
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
<table id="table_id" class="display">
    <thead>
        <tr>
            <th class="col-md-1">No</th>
            <th>Semester</th>
            <th>Tahun</th>
            <th>Tahun Akademik</th>
            <th>UTS / UAS</th>
            <th>Tahun Dapodik</th>
            <th>Indek</th>
            <th>Kode Sekolah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="show_data">
    </tbody>
</table>
<script>
    if ($("#formTambah").length > 0) {
        $("#formTambah").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                id: {
                    required: true
                    // ,maxlength: 50
                },

                nama: {
                    required: true
                    // , digits:true,
                    // minlength: 10,
                    // maxlength:12,
                },
                // email: {
                //         required: true,
                //         maxlength: 50,
                //         email: true,
                //     },    
            },
            messages: {

                id: {
                    required: "Kode jabatan harus diisi!"
                    // ,maxlength: "Your last name maxlength should be 50 characters long."
                },
                nama: {
                    required: "Nama jabatan harus diisi!"
                    // ,minlength: "The contact number should be 10 digits",
                    // digits: "Please enter only numbers",
                    // maxlength: "The contact number should be 12 digits",
                },
                // email: {
                //     required: "Please enter valid email",
                //     email: "Please enter valid email",
                //     maxlength: "The email name should less than or equal to 50 characters",
                //   },

            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modultu/tahunajaran/simpan') ?>",
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
                            swalIdDouble('Tahun Akademik Sudah digunakan!');
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
                e_nama: {
                    required: true
                },
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
                    url: "<?php echo base_url('modultu/tahunajaran/update') ?>",
                    type: "POST",
                    data: $('#formEdit').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
                            'Ubah');
                        if (response == true) {
                            document.getElementById("formEdit").reset();
                            swalEditSuccess();
                            show_data();
                            $('#modalEdit').modal('hide');
                        } else if (response == 401) {
                            swalIdDouble('Nama Ruangan Sudah digunakan!');
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
        show_data();
        $('#table_id').DataTable();
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modultu/tahunajaran/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-right">' + no + '</td>' +
                        '<td class="text-left">' + data[i].SEMESTER + '</td>' +
                        '<td>' + data[i].TAHUN + '</td>' +
                        '<td class="text-right">' + data[i].THNAKAD + '</td>' +
                        '<td>' + data[i].UTSUAS + '</td>' +
                        '<td class="text-right">' + data[i].INDEK + '</td>' +
                        '<td>' + data[i].THNDAPODIK + '</td>' +
                        '<td class="text-right">' + data[i].KDSEKOLAH + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
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
            url: "<?php echo base_url('modultu/tahunajaran/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].ID);
                $('#e_semester').val(data[0].SEMESTER);
                $('#e_tahun').val(data[0].TAHUN);
                $('#e_tahun_akad').val(data[0].THNAKAD);
                $('#e_uts_uas').val(data[0].UTSUAS);
                $('#e_indek').val(data[0].INDEK);
                $('#e_thndapodik').val(data[0].THNDAPODIK);
                $('#e_kdsekolah').val(data[0].KDSEKOLAH);
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
                    url: "<?php echo base_url('ruangan/delete') ?>",
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