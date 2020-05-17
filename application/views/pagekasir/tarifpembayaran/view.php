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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sekolah </label>
                                <div class="col-xs-6">
                                    <select class="form-control" required name="sekolah" id="sekolah">
                                        <option value="">-- Status --</option>
                                        <?php foreach ($sekolah as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?> - <?= $value['DESCRTBJS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jenis Bayar </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="kodejenis" id="kodejenis">
                                        <option value="0">-- Status --</option>
                                        <?php foreach ($jenisbayar as $value) { ?>
                                            <option value=<?= $value['Kodejnsbayar'] ?>><?= $value['namajenisbayar'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Masuk </label>
                                <div class="col-sm-3">
                                    <input type="number" maxlength="4" id="tahun" name="tahun" placeholder="2020" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nominal </label>
                                <div class="col-sm-6">
                                    <input type="text" id="nominal" name="nominal" placeholder="Rp.1000.000" class="form-control" />
                                    <input type="hidden" class="form-control" name="nominal_v" placeholder="Rp.1000.000" id="nominal_v" />
                                    <script language="JavaScript">
                                        var rupiah5 = document.getElementById('nominal');
                                        rupiah5.addEventListener('keyup', function(e) {
                                            // tambahkan 'Rp.' pada saat form di ketik
                                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                            rup5 = this.value.replace(/\D/g, '');
                                            $('#nominal_v').val(rup5);
                                            rupiah5.value = formatRupiah5(this.value, 'Rp. ');
                                        });

                                        function formatRupiah5(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                                split = number_string.split(','),
                                                sisa5 = split[0].length % 3,
                                                rupiah5 = split[0].substr(0, sisa5),
                                                ribuan5 = split[0].substr(sisa5).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan5) {
                                                separator = sisa5 ? '.' : '';
                                                rupiah5 += separator + ribuan5.join('.');
                                            }

                                            rupiah5 = split[1] != undefined ? rupiah5 + ',' + split[1] : rupiah5;
                                            return prefix == undefined ? rupiah5 : (rupiah5 ? 'Rp. ' + rupiah5 : '');
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                                <div class="col-sm-3">
                                    <input type="text" id="tahunakad" name="tahunakad" placeholder="2020/2021" class="form-control" />
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
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sekolah </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="e_sekolah" id="e_sekolah">
                                        <option value="0">-- Status --</option>
                                        <?php foreach ($sekolah as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?> - <?= $value['DESCRTBJS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jenis Bayar </label>
                                <div class="col-xs-6">
                                    <select class="form-control" name="e_kodejenis" id="e_kodejenis">
                                        <option value="0">-- Status --</option>
                                        <?php foreach ($jenisbayar as $value) { ?>
                                            <option value=<?= $value['Kodejnsbayar'] ?>><?= $value['namajenisbayar'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Masuk </label>
                                <div class="col-sm-3">
                                    <input type="hidden" id="e_id" name="e_id" placeholder="" class="form-control" />
                                    <input type="number" id="e_tahun" name="e_tahun" placeholder="2020" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nominal </label>
                                <div class="col-sm-6">
                                    <input type="text" id="e_nominal" name="e_nominal" placeholder="Rp.1000.000" class="form-control" />
                                    <input type="hidden" class="form-control" name="e_nominal_v" placeholder="Rp.1000.000" id="e_nominal_v" />
                                    <script language="JavaScript">
                                        var rupiah6 = document.getElementById('e_nominal');
                                        rupiah6.addEventListener('keyup', function(e) {
                                            // tambahkan 'Rp.' pada saat form di ketik
                                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                            rup6 = this.value.replace(/\D/g, '');
                                            $('#e_nominal_v').val(rup6);
                                            rupiah6.value = formatRupiah6(this.value, 'Rp. ');
                                        });

                                        function formatRupiah6(angka, prefix) {
                                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                                split = number_string.split(','),
                                                sisa6 = split[0].length % 3,
                                                rupiah6 = split[0].substr(0, sisa6),
                                                ribuan6 = split[0].substr(sisa6).match(/\d{3}/gi);

                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                            if (ribuan6) {
                                                separator = sisa6 ? '.' : '';
                                                rupiah6 += separator + ribuan6.join('.');
                                            }

                                            rupiah6 = split[1] != undefined ? rupiah6 + ',' + split[1] : rupiah6;
                                            return prefix == undefined ? rupiah6 : (rupiah6 ? 'Rp. ' + rupiah6 : '');
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                                <div class="col-sm-3">
                                    <input type="text" id="e_tahunakad" name="e_tahunakad" placeholder="2020/2021" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="e_status" id="e_status">
                                        <option value="">-- Pilih Status --</option>
                                        <option value='T'>Aktif</option>
                                        <option value='F'>Tidak</option>
                                    </select>
                                </div>
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
                <th>Sekolah</th>
                <th>Kode Sekolah</th>
                <th>Kode Jenis Bayar</th>
                <th>Tahun Masuk</th>
                <th>Nominal</th>
                <th>TA</th>
                <th>Tanggal Input</th>
                <th>User Input</th>
                <th>Status</th>
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
                id: {
                    required: true
                },
                nama: {
                    required: true
                },
            },
            messages: {
                nama: {
                    required: "Nama jenjang harus diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modulkasir/tarifpembayaran/simpan') ?>",
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
                            swalIdDouble('Nama Jenjang sudah terdaftar!');
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
                e_nama: {
                    required: true
                },
            },
            messages: {
                e_jenjang: {
                    required: "Nama Jenjang harus diisi!"
                },

            },
            submitHandler: function(form) {
                $('#btn_edit').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modulkasir/tarifpembayaran/update') ?>",
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
                            swalIdDouble('Nama Jenjang Sudah digunakan!');
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
            url: '<?php echo site_url('modulkasir/tarifpembayaran/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].DESCRTBPS + '-' + data[i].DESCRTBJS +  '</td>' +
                        '<td>' + data[i].kodesekolah + '</td>' +
                        '<td>' + data[i].Kodejnsbayar + '</td>' +
                        '<td>' + data[i].ThnMasuk + '</td>' +
                        '<td>' + data[i].nominal_v + '</td>' +
                        '<td>' + data[i].TA + '</td>' +
                        '<td>' + data[i].createdAt + '</td>' +
                        '<td>' + data[i].userridd + '</td>' +
                        '<td>' + data[i].status + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].idtarif + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].idtarif + '">' +
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
            url: "<?php echo base_url('modulkasir/tarifpembayaran/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].idtarif);
                $('#e_sekolah').val(data[0].kodesekolah);
                $('#e_kodejenis').val(data[0].Kodejnsbayar);
                $('#e_tahun').val(data[0].ThnMasuk);
                $('#e_nominal').val(formatRupiah5(data[0].Nominal, 'Rp. '));
                $('#e_nominal_v').val(data[0].Nominal);
                $('#e_tahunakad').val(data[0].TA);
                $('#e_status').val(data[0].status);


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
                    url: "<?php echo base_url('modulkasir/tarifpembayaran/delete') ?>",
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