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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="kodesekolah" id="kodesekolah">
                                        <option value="">-- Pilih Program --</option>
                                        <?php foreach ($sklh as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Pembayaran </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="Kodejnsbayar" id="Kodejnsbayar">
                                        <option value="">-- Pilih Jenis --</option>
                                        <?php foreach ($myjenis as $value) { ?>
                                            <option value=<?= $value['Kodejnsbayar'] ?>><?= $value['Kodejnsbayar']; echo"-" ?><?= $value['namajenisbayar'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="tahun" id="tahun">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php foreach ($ta as $value) { ?>
                                            <option value=<?= $value['ID'] ?>><?= $value['TAHUN'] ; echo"-"?><?= $value['THNAKAD'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nominal </label>
                                <div class="col-sm-6">
                                    <input type="number" id="Nominal" name="Nominal" id="form-field-1" placeholder="" class="form-control" />
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
                                <input type="hidden" id="e_id" name="e_id" placeholder="1234567" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_kodesekolah" id="e_kodesekolah">
                                        <option value="">-- Pilih Program --</option>
                                        <?php foreach ($sklh as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Pembayaran </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_Kodejnsbayar" id="e_Kodejnsbayar">
                                        <option value="">-- Pilih Jenis --</option>
                                        <?php foreach ($myjenis as $value) { ?>
                                            <option value=<?= $value['Kodejnsbayar'] ?>><?= $value['Kodejnsbayar']; echo"-" ?><?= $value['namajenisbayar'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="e_tahun" id="e_tahun">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php foreach ($ta as $value) { ?>
                                            <option value=<?= $value['ID'] ?>><?= $value['TAHUN'] ; echo"-"?><?= $value['THNAKAD'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nominal </label>
                                <div class="col-sm-6">
                                    <input type="number" id="e_Nominal" name="e_Nominal" id="form-field-1" placeholder="" class="form-control" />
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
        <th>No</th>
            <th>Kode Sekolah</th>
            <th>Kode Jenis Bayar</th>
            <th>Tahun Masuk</th>
            <th>Nominal</th>
            <th>Tahun Akademik</th>
            <th>Aksi</th>
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
                },
                kodesekolah: {
                    required: true
                },
                Nominal: {
                    required: true
                },
                Kodejnsbayar: {
                    required: true
                },
                tahun: {
                    required: true
                },
            },
            messages: {

                id: {
                    required: "Kode harus diisi!"
                },
                kodesekolah: {
                    required: "Kode harus diisi!"
                },
                Kodejnsbayar: {
                    required: "Kode harus diisi!"
                },
                Nominal: {
                    required: "Nominal harus diisi!"
                },
                tahun: {
                    required: "tahun harus diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modultu/tarifbayar/simpan') ?>",
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
                            swalIdDouble('Nama Sudah digunakan!');
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
                e_kodesekolah: {
                    required: true
                },
                e_Nominal: {
                    required: true
                },
                e_Kodejnsbayar: {
                    required: true
                },
                e_tahun: {
                    required: true
                },
            },
            messages: {

                e_id: {
                    required: "Kode harus diisi!"
                },
                e_kodesekolah: {
                    required: "Kode harus diisi!"
                },
                e_Kodejnsbayar: {
                    required: "Kode harus diisi!"
                },
                e_Nominal: {
                    required: "Nominal harus diisi!"
                },
                e_tahun: {
                    required: "tahun harus diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_edit').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modultu/tarifbayar/update') ?>",
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
                            swalIdDouble('Id Sudah digunakan!');
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
            url: '<?php echo site_url('modultu/tarifbayar/tampil') ?>',
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
                        '<td>' + data[i].namajenisbayar + '</td>' +
                        '<td>' + data[i].TAHUN + '</td>' +
                        '<td>' + data[i].Nominal + '</td>' +
                        '<td>' + data[i].THNAKAD + '</td>' +
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
            url: "<?php echo base_url('modultu/tarifbayar/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].id);
                $('#e_kodesekolah').val(data[0].kodesekolah);
                $('#e_Kodejnsbayar').val(data[0].Kodejnsbayar);
                $('#e_tahun').val(data[0].tahun);
                $('#e_Nominal').val(data[0].Nominal);
                //$('#e_userridd').val(data[0].userridd);
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
                    url: "<?php echo base_url('modultu/tarifbayar/delete') ?>",
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


    //Simpan guru
    // $('#btn_simpan1').on('click', function() {
    // 	var id = $('#id').val();
    // 	var nama = $('#nama').val();
    // 	$.ajax({
    // 		type: "POST",
    // 		url: "<?php echo base_url('jabatan/simpan_jabatan') ?>",
    // 		dataType: "JSON",
    // 		data: {
    // 			id: id,
    // 			nama: nama,
    // 		},
    // 		success: function(response) {
    // 			if(response == true){
    // 				swalInputSuccess();
    // 				show_data();
    // 				$('[name="id"]').val("");
    // 				$('[name="nama"]').val("");
    // 				$('#modalTambah').modal('hide');
    // 			}else if(response == 1048){
    // 				swalIdDouble('ID Jabatan Sudah digunakan!');
    // 			}else{
    // 				swalInputFailed();
    // 			}
    // 		}
    // 	});
    // 	return false;
    // });
</script>