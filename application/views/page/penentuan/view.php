<div class="row">
    <div class="col-sm-6" id="default-buttons">
        <p>
            <button id="btn_proses" class="btn btn-sm btn-warning pull-left">
                <a class="ace-icon fa fa-exchange bigger-120 btn_proses"></a>Proses
            </button>
            <button href="#my-modal2" role="button" data-toggle="modal" class="btn btn-sm btn-light pull-left">
                <a class="ace-icon fa fa-cloud-download bigger-120"></a>
                Import
            </button>
            <button type="submit" id="btn_export" class="btn btn-sm btn-light pull-left">
                <a class="ace-icon fa fa-cloud-upload bigger-120"></a>
                Export
            </button>
        </p>
    </div>
</div>
<br>
<div id="my-modal2" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Form Import Data Penentuan Kelas</h3>
            </div>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" id="formImport">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Import Excel FIle </label>
                                <div class="col-sm-6">
                                    <input type="file" id="file" required name="file" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sample </label>
                                <div class="col-sm-9">
                                    <a href="<?php echo base_url() . 'assets/import_kenaikan_kelas.xls' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
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
<div class="row">
    <form class="form-horizontal" role="form" id="formSearch">
        <div class="col-xs-3">
            <select class="form-control" name="thn" id="thn">
                <option value=>--Pilih Tahun--</option>
                <?php foreach ($mytahun as $value) { ?>
                    <option value=<?= $value['TAHUN'] ?>><?= $value['TAHUN'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="jurusan" id="jurusan">
                <option>-- Pilih Jurusan --</option>
                <?php foreach ($myjurusan as $value) { ?>
                    <option value=<?= $value['KodeSek'] ?>><?= $value['NamaSek'] . ' - ' . $value['NamaJurusan'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-1">
            <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
                <a class="ace-icon fa fa-search bigger-120"></a>
                Cari&nbsp;&nbsp;
            </button>
        </div>
        <br>
        <br>
    </form>
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
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Kelas</th>
                <th>Kelas Saat ini</th>
                <th>Golongan Kelas</th>
                <th class="col-sm-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script>
    if ($("#formImport").length > 0) {
        $("#formImport").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {},
            messages: {},
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('penentuankelas/import') ?>",
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
                nopembayaran: {
                    required: false
                },

                tahun: {
                    required: false
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('penentuankelas/search') ?>',
                    data: $('#formSearch').serialize(),
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
                            'Periksa');
                        var html = '';
                        var html2 = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].NOINDUK + '</td>' +
                                '<td>' + data[i].NMSISWA + '</td>' +
                                '<td>' + data[i].v_Jk + '</td>' +
                                '<td>' + data[i].v_agama + '</td>' +
                                '<td>' + data[i].Kelas + '.' + data[i].GolKelas + '</td>' +
                                '<td>' + data[i].Kelas_naik + '</td>' +
                                '<td class="text-center">';
                            html += '<select class="form-control" name="gol" id="gol">';
                            if (data[i].GolKelas == null) {

                            } else {
                                html += '<option value="' + data[i].GolKelas + '" selected=``>' + data[i].GolKelas + '</option>'
                            }
                            html += '<option value="">--Pilih--</option>' +
                                <?php foreach ($myrev as $value) {
                                    echo "'<option value=" . $value->NAMA_REV . ">" . $value->NAMA_REV . "</option>'+";
                                }
                                ?> '</select>' +
                                '</td>' +
                                // '<td>asd</td>'
                                '<td>';
                            if (data[i].Kelas != null) {
                                html += '<button class="btn btn-xs btn-success item_ubah" title="Ubah" data-gol="' + data[i].GolKelas + '" data-id_Kelas_naik="' + data[i].id_Kelas_naik + '" data-noreg="' + data[i].NOINDUK + '">' +
                                    '<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>' +
                                    '</button> &nbsp' +
                                    '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_naik" title="Naik" data-id_kelas_naik="' + data[i].id_Kelas_naik + '" data-noreg="' + data[i].NOINDUK + '">' +
                                    '<i class="ace-icon fa fa-cloud-upload bigger-120"></i>' +
                                    '</button> &nbsp' +
                                    '<button class="btn btn-xs btn-warning item_tinggal" title="Tinggal" data-id_kelas="' + data[i].id_Kelas_turun + '" data-noreg="' + data[i].NOINDUK + '">' +
                                    '<i class="ace-icon fa fa-cloud-download bigger-120"></i>' +
                                    '</button>';
                            } else {
                                html += '<button class="btn btn-xs btn-success item_ubah" title="Ubah" data-gol="' + data[i].GolKelas + '" data-id_Kelas_naik="' + data[i].id_Kelas_naik + '" data-noreg="' + data[i].NOINDUK + '">' +
                                    '<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>' +
                                    '</button> &nbsp' +
                                    '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_naik" title="Naik" data-id_kelas_naik="' + data[i].id_Kelas_naik + '" data-noreg="' + data[i].NOINDUK + '">' +
                                    '<i class="ace-icon fa fa-cloud-upload bigger-120"></i>' +
                                    '</button> &nbsp' +
                                    '<button class="btn btn-xs btn-warning item_tinggal" title="Tinggal" data-id_kelas="' + data[i].id_Kelas_turun + '" data-noreg="' + data[i].NOINDUK + '">' +
                                    '<i class="ace-icon fa fa-cloud-download bigger-120"></i>' +
                                    '</button>';
                            }
                            html += '</td>' +
                                // '<td>' + data[i].Kelas_naik + '</td>' +

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


    $('.btn_proses').click(function() {
        $('#btn_proses').html('Proses..');
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('penentuankelas/validasi') ?>',
            data: $('#formSearch').serialize(),
            async: true,
            dataType: 'json',
            success: function(response) {
                $('#btn_proses').html('<a class="ace-icon fa fa-exchange bigger-120 btn_proses"></a>Proses');
                if (response == true) {
                    swalInputSuccess();
                } else if (response == 401) {
                    swalSuccessKosong('Tidak ada data terbaru!');
                } else {
                    swalInputFailed();
                }

                /* END TABLETOOLS */
            }
        });
    });

    function swalSuccessKosong(message) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: message,
        });
    }


    if ($("#formImport").length > 0) {
        $("#formImport").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('penentuankelas/import') ?>",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        // console.log(data);
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

    $('#show_data').on('click', '.item_ubah', function() {
        var id_Kelas_naik = $(this).data('id_Kelas_naik');
        var noreg = $(this).data('noreg');
        var gol = $("#gol").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('penentuankelas/ubah') ?>",
            async: true,
            dataType: "JSON",
            data: {
                noreg: noreg,
                gol: gol,
            },
            success: function(response) {
                if (response == true) {
                    swalEditSuccess();
                } else if (response == 401) {
                    swalSuccessKosong('Eror!');
                } else {
                    swalEditFailed();
                }
            }
        });
    })

    $('#show_data').on('click', '.item_naik', function() {
        var id_Kelas_naik = $(this).data('id_kelas_naik');
        var noreg = $(this).data('noreg');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('penentuankelas/naik') ?>",
            async: true,
            dataType: "JSON",
            data: {
                noreg: noreg,
                id_Kelas_naik: id_Kelas_naik,
            },
            success: function(response) {
                if (response == true) {
                    swalEditSuccess();
                } else if (response == 401) {
                    swalSuccessKosong('Eror!');
                } else {
                    swalEditFailed();
                }
            }
        });
    })

    $('#show_data').on('click', '.item_tinggal', function() {
        var id_kelas = $(this).data('id_kelas');
        var noreg = $(this).data('noreg');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('penentuankelas/tinggal') ?>",
            async: true,
            dataType: "JSON",
            data: {
                noreg: noreg,
                id_kelas: id_kelas,
            },
            success: function(response) {
                if (response == true) {
                    swalEditSuccess();
                } else if (response == 401) {
                    swalSuccessKosong('Eror!');
                } else {
                    swalEditFailed();
                }
            }
        });
    })
</script>