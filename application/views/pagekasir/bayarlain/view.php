<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
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
            <select class="form-control" name="nik" id="nik">
                <option value="">--Pilih NIK / No Induk--</option>
                <?php foreach ($mysiswa as $value) { ?>
                    <option value=<?= $value['NOINDUK'] ?>><?= $value['NOINDUK'] . '-' . $value['NMSISWA'] ?></option>
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
<div id="modalTambah" class="modal fade">
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Registrasi </label>
                                <div class="col-xs-9">
                                    <select class="form-control" name="nik2" id="nik2">
                                        <option value="">--Pilih NIK / No Induk--</option>
                                        <?php foreach ($mysiswa as $value) { ?>
                                            <option value=<?= $value['NOINDUK'] ?>><?= $value['NOINDUK'] . '-' . $value['NMSISWA'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Siswa </label>
                                <div class="col-xs-9">
                                    <input type="text" readonly class="form-control" name="nama" id="nama" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nominal </label>
                                <div class="col-xs-9">
                                    <input type="text" id="nominal" required name="nominal" placeholder="Rp.65.000" class="form-control" />
                                    <input type="hidden" id="nominal_v" name="nominal_v" class="form-control" />
                                    <script language="JavaScript">
                                        var rupiah3 = document.getElementById('nominal');
                                        rupiah3.addEventListener('keyup', function(e) {
                                            // tambahkan 'Rp.' pada saat form di ketik
                                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                            rup3 = this.value.replace(/\D/g, '');
                                            $('#nominal_v').val(rup3);
                                            rupiah3.value = formatRupiah3(this.value, 'Rp. ');
                                        });

                                        function formatRupiah3(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                                split = number_string.split(','),
                                                sisa = split[0].length % 3,
                                                rupiah3 = split[0].substr(0, sisa),
                                                ribuan3 = split[0].substr(sisa).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan3) {
                                                separator = sisa ? '.' : '';
                                                rupiah3 += separator + ribuan3.join('.');
                                            }

                                            rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
                                            return prefix == undefined ? rupiah3 : (rupiah3 ? 'Rp. ' + rupiah3 : '');
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                <div class="col-xs-9">
                                    <select class="form-control" name="ket" id="ket">
                                        <option value="0">-- Pilih Data --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                                <div class="col-xs-9">
                                    <input type="text" value=<?= $ta ?> readonly class="form-control" name="thnakad" id="thnakad" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal bayar </label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="tglbayar" id="tglbayar" placeholder="">
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
                <th>No Induk</th>
                <th>Nama</th>
                <th>Sekolah</th>
                <th>Kelas</th>
                <th>Jenis Pembayaran</th>
                <th>Tarif</th>
                <th>Bayar</th>
                <th>TA</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('select').select2({
            width: '100%',
            placeholder: "Masukan Siswa",
            allowClear: true
        });


        $("#nik2").change(function() {
            var nik = $('#nik2').val();
            $.ajax({
                type: "POST",
                url: "bayarlain/showsiswa",
                data: {
                    nik: nik
                }
            }).done(function(data) {
                // console.log(data);
                $("#ket").html(data);
            });
        });

        $("#nik2").change(function() {
            var nik = $('#nik2').val();
            $.ajax({
                type: "POST",
                url: "bayarlain/showsiswa2",
                data: {
                    nik: nik
                }
            }).success(function(data) {
                $("#nama").val(data);
            });
        });
    });

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
                    url: "<?php echo base_url('modulkasir/bayarlain/simpan') ?>",
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
                    url: '<?php echo site_url('modulkasir/bayarlain/search') ?>',
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
                                '<td>' + data[i].NOINDUK + '-' + data[i].Noreg + '</td>' +
                                '<td>' + data[i].NMSISWA + '</td>' +
                                '<td>' + data[i].NamaSek + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].namajenisbayar + '</td>' +
                                '<td>' + data[i].Nominal2 + '</td>' +
                                '<td>' + data[i].TotalBayar2 + '</td>' +
                                '<td>' + data[i].TA + '</td>' +
                                '<td>' +
                                '<a target="_blank"  href="<?php echo  base_url() . 'modulkasir/bayarlain/cetak?noreg=' ?>' + data[i].NOINDUK + '&nm_siswa=' + data[i].NMSISWA + '&jenis_bayar=' + data[i].Kodejnsbayar +'&desc_jenis_bayar=' + data[i].namajenisbayar + '&tarif=' + data[i].Nominal + '&total_bayar=' + data[i].TotalBayar + '&no=' + data[i].Nopembayaran +'" class="btn btn-xs btn-info" title="Print">' +
                                '<i class="ace-icon fa fa-print bigger-120"></i>' +
                                '</a> &nbsp' +
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

                            });

                        }
                        /* END TABLETOOLS */
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
                    url: "<?php echo base_url('jadwal/delete') ?>",
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