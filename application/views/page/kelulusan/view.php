<div class="row">
    <div class="col-xs-1">
        <button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-info">
            <a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
        </button>
    </div>
    <div class="col-xs-1">
        <button id="item-proses" role="button" data-toggle="modal" class="btn btn-xs btn-info">
            <a class="ace-icon fa fa-plus bigger-120"></a>Proses Data
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
            <select class="form-control" name="programsekolah" id="programsekolah">
                <option value=>--Pilih Program --</option>
                <?php foreach ($myps as $value) { ?>
                    <option value=<?= $value['id'] ?>><?= "[" . $value['sekolah'] . "-" . $value['jurusan'] . "]" ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="gangenap" id="gangenap">
                <option value=>-- Semester --</option>
                <option value="1">Ganjil</option>
                <option value="2">Genap</option>
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Lulus </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="tahun" id="tahun">
                                        <option value=>--Pilih Tahun --</option>
                                        <?php foreach ($mythnakad as $value) { ?>
                                            <option value=<?= $value['THNAKAD'] ?>><?= $value['THNAKAD'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="semester" id="semester">
                                        <option value=>--Pilih Semester --</option>
                                        <?php foreach ($mysemester as $value) { ?>
                                            <option value=<?= $value['SEMESTER'] ?>>Semester <?= $value['SEMESTER'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" id="tanggal" name="tanggal" placeholder="1/2/3/4/5/6" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Induk</label>
                                <div class="col-sm-9">
                                    <input type="text" id="kode" name="kode" placeholder="1400101" class="form-control" />
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

<div id="modalProses" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Form Proses Masal Data <?= $page_name; ?></h3>
            </div>
            <form class="form-horizontal" role="form" id="formProses">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Masuk </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="tahun_masuk" id="tahun_masuk">
                                        <option value=>--Pilih Tahun --</option>
                                        <?php foreach ($mythnmasuk as $value) { ?>
                                            <option value=<?= $value['TAHUN'] ?>><?= $value['TAHUN'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Lulus </label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="tahun_lulus" id="tahun_lulus">
                                        <option value=>--Pilih Tahun --</option>
                                        <?php foreach ($mythnakad as $value) { ?>
                                            <option value=<?= $value['THNAKAD'] ?>><?= $value['THNAKAD'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="semester" id="semester">
                                        <option value=>--Pilih Semester --</option>
                                        <?php foreach ($mysemester as $value) { ?>
                                            <option value=<?= $value['SEMESTER'] ?>>Semester <?= $value['SEMESTER'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                            <input type="hidden" id="semester" name="semester" value="2" class="form-control" />

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="programsekolah" id="programsekolah">
                                        <option value=>--Pilih Program --</option>
                                        <?php foreach ($myps as $value) { ?>
                                            <option value=<?= $value['id'] ?>><?= "[".$value['sekolah']."-".$value['jurusan']."]" ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Proses</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tipeproses" id="tipeproses">
                                        <option value="L">Proses Kelulusan</option>
                                        <option value="B">Batalkan Proses Kelulusan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal </label>
                                <div class="col-sm-9">
                                    <input type="date" id="tanggal" name="tanggal" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_proses" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Proses
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
                                            <option value=<?= $value['kode'] ?>><?= $value['kode'] ?> - <?= $value['nama'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester</label>
                                <div class="col-sm-9">
                                    <input type="number" id="e_semester" name="e_semester" placeholder="1/2/3/4/5/6" class="form-control" />
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
            <th>No Induk</th>
            <th class="col-md-4">Nama</th>
            <th>Tahun</th>
            <th>Program Sekolah</th>
            <th>Aksi Lulus</th>
            <th>Aksi Keluar</th>
        </tr>
    </thead>
    <tbody id="show_data">
    </tbody>
</table>
<script>
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
                gangenap: {
                    required: true
                },
            },
            messages: {

                programsekolah: {
                    required: "Program sekolah harus diisi!"
                },
                tahun: {
                    required: "Tahun harus dipilih!"
                },
                tahun: {
                    required: "Semester harus dipilih!"
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('kelulusan/search') ?>',
                    data: $('#formSearch').serialize(),
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
                            'Periksa');
                        var st_calsis_keluar = '';
                        var st_calsis_lulus = '';
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            if(data[i].STATUSCALONSISWA == '1'){
                                st_calsis_lulus = '<button class="btn btn-xs btn-warning item_lulus" title="Batal" data-noreg="' + data[i].NOREG + '">' +
                                            '<i class="ace-icon glyphicon glyphicon-repeat bigger-120"></i>' +
                                            '</button>';
                            }else if(data[i].STATUSCALONSISWA == '4'){
                                st_calsis_lulus = '<button class="btn btn-xs btn-success item_lulus" title="Lulus" data-noreg="' + data[i].NOREG + '">' +
                                    '<i class="ace-icon fa fa-check bigger-120"></i>' +
                                    '</button>';
                            }

                            if (data[i].STATUSCALONSISWA == 3) {
                                st_calsis_keluar = '<button class="btn btn-xs btn-success item_keluarkan" title="Batal" data-noreg="' + data[i].NOREG + '" data-n="4">' +
                                    '<i class="ace-icon glyphicon glyphicon-repeat bigger-120"></i>' +
                                    '</button>';
                            } else {
                                st_calsis_keluar = '<button class="btn btn-xs btn-danger item_keluarkan" title="Keluarkan" data-noreg="' + data[i].NOREG + '" data-n="3">' +
                                    '<i class="ace-icon glyphicon glyphicon-share bigger-120"></i>' +
                                    '</button>';
                            }
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].NISRKP + '</td>' +
                                '<td>' + data[i].NMSISWA + '</td>' +
                                '<td>' + data[i].THNAKDRKP + '</td>' +
                                '<td>' + data[i].DESCRTBPS + '</td>' +
                                '<td class="text-center">' +
                                st_calsis_lulus +
                                '</td>' +
                                '<td class="text-center">' +
                                st_calsis_keluar +
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
                    url: "<?php echo base_url('kelulusan/simpan') ?>",
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

    if ($("#formProses").length > 0) {
        $("#formProses").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                tahun_masuk: {
                    required: true
                },
                tahun_lulus: {
                    required: true
                },
                programsekolah: {
                    required: true
                },
                tipeproses: {
                    required: true
                },
                tanggal: {
                    required: true,
                }
            },
            submitHandler: function(form) {
                $('#btn_proses').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('kelulusan/proses') ?>",
                    type: "POST",
                    data: $('#formProses').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#btn_proses').html('<i class="ace-icon fa fa-save"></i>' +
                            'Simpan');
                        if (response == true) {
                            document.getElementById("formProses").reset();
                            swalprosessukses('Proses Berhasil!');
                            $('#modalProses').modal('hide');
                        } else if (response == 401) {
                            swalIdDouble('Data sudah pernah di proses!!');
                        } else {
                            swalInputFailed();
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
    });


    //show modal tambah
    $('#item-tambah').on('click', function() {
        $('#modalTambah').modal('show');
    });

    $('#item-proses').on('click', function() {
        $('#modalProses').modal('show');
    });

    $('#show_data').on('click', '.item_lulus', function() {
        var noreg = $(this).data('noreg');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('kelulusan/lulus') ?>",
            async: true,
            dataType: "JSON",
            data: {
                noreg: noreg,
            },
            success: function(response) {
                if (response == true) {
                    swalEditSuccess();
                    $("#table_id").dataTable().fnDestroy();
                    var a = $('#show_data').html('');
                    if (a) {
                        $('#table_id').dataTable({
                            "bPaginate": true,
                            "bLengthChange": false,
                            "bFilter": true,
                            "bInfo": false,
                            "bAutoWidth": false
                        });
                    }
                } else if (response == 401) {
                    swalSuccessKosong('Eror!');
                } else {
                    swalEditFailed();
                }
            }
        });
    })

    $('#show_data').on('click', '.item_keluarkan', function() {
        var noreg = $(this).data('noreg');
        var n = $(this).data('n');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('kelulusan/keluarkan') ?>",
            async: true,
            dataType: "JSON",
            data: {
                noreg: noreg,
                n: n,
            },
            success: function(response) {
                if (response == true) {
                    swalEditSuccess();
                    $("#table_id").dataTable().fnDestroy();
                    var a = $('#show_data').html('');
                    if (a) {
                        $('#table_id').dataTable({
                            "bPaginate": true,
                            "bLengthChange": false,
                            "bFilter": true,
                            "bInfo": false,
                            "bAutoWidth": false
                        });
                    }
                } else if (response == 401) {
                    swalSuccessKosong('Eror!');
                } else {
                    swalEditFailed();
                }
            }
        });
    })
</script>