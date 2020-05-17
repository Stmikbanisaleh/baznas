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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jenis Bayar </label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="kdjenisbayar" id="kdjenisbayar" placeholder="Kode Jenis Bayar"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jenis Bayar </label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="nmjenisbayar" id="nmjenisbayar" placeholder="Nama Jenis Bayar"></textarea>
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jenis Bayar </label>
                                <div class="col-xs-6">
                                    <input type="hidden" name="e_id" id="e_id" placeholder="Kode Jenis Bayar"></textarea>
                                    <input type="text" class="form-control" name="e_kdjenisbayar" id="e_kdjenisbayar" placeholder="Kode Jenis Bayar"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jenis Bayar </label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="e_nmjenisbayar" id="e_nmjenisbayar" placeholder="Nama Jenis Bayar"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Edit
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
                <th>Kode Jenis Bayar</th>
                <th>Nama Jenis Bayar</th>
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
            rules: {},
            messages: {},
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modulkasir/jenispembayaran/simpan') ?>",
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

    if ($("#formImport").length > 0) {
        $("#formImport").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('modulkasir/jadwal/import') ?>",
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
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('modulkasir/jenispembayaran/update') ?>",
                    data: $('#formEdit').serialize(),
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#modalEdit').modal('hide');
                        if (data == 1 || data == true) {
                            document.getElementById("formEdit").reset();
                            swalEditSuccess();
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
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulkasir/jenispembayaran/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].Kodejnsbayar + '</td>' +
                        '<td>' + data[i].namajenisbayar + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].Kodejnsbayar + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].Kodejnsbayar + '">' +
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
            url: "<?php echo base_url('modulkasir/jenispembayaran/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].Kodejnsbayar);
                $('#e_kdjenisbayar').val(data[0].Kodejnsbayar);
                $('#e_nmjenisbayar').val(data[0].namajenisbayar);
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
                    url: "<?php echo base_url('modulkasir/jenispembayaran/delete') ?>",
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