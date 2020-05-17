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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Registrasi </label>
                                <div class="col-sm-6">
                                    <?php
                                    $tahun = date("Y");
                                    $noreg = $this->db->query("SELECT
                                    RIGHT(calon_siswa.Noreg+1,4)AS Noreg FROM calon_siswa WHERE thnmasuk='$tahun' ORDER BY Noreg DESC")->row();
                                    if (empty($noreg)) {
                                        $no = '0001';
                                    } else {
                                        $no = $noreg->Noreg;
                                    }
                                    ?>
                                    <input type="text" value="<?= $tahun ?><?= $no ?>" id="noreg" required name="noreg" placeholder="" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Calon Siswa </label>
                                <div class="col-sm-9">
                                    <input type="text" id="nama" required name="nama" placeholder="Nama Siswa" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nominal </label>
                                <div class="col-sm-9">
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sekolah </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="sekolah" id="sekolah">
                                        <option value="">-- Pilih Sekolah --</option>
                                        <?php foreach ($mysekolah as $value) { ?>
                                            <option value=<?= $value['kodesekolah'] ?>> <?= $value['sekolah'] . "-" . $value['NamaJurusan'] . "- Rp. " . $value['Nominal'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                                <div class="col-sm-9">
                                    <!-- <input type="text" maxlength="9" class="form-control" required name="tahunakademik" id="tahunakademik" placeholder="2020/2021" /> -->
                                    <select class="form-control" name="tahunakademik" id="tahunakademik">
                                        <option value="">-- Pilih Tahun Akademik --</option>
                                        <?php foreach ($my_thnakad3 as $value) { ?>
                                            <option value=<?= $value['THNAKAD'] ?>> <?= $value['THNAKAD'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Bayar </label>
                                <div class="col-sm-9">
                                    <input type="date" id="tanggal" required name="tanggal" placeholder="" class="form-control" />
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
                <h3 class="smaller lighter blue no-margin">Form Edit Data Guru</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form" id="formEdit">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode </label>
                                <div class="col-sm-6">
                                    <input type="hidden" id="e_id" required name="e_id" />
                                    <input type="text" id="e_IdGuru" required name="e_IdGuru" placeholder="Kode Guru" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Dapodik </label>
                                <div class="col-sm-9">
                                    <input type="text" id="e_GuruNoDapodik" required name="e_GuruNoDapodik" placeholder="kode Dapodik" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
                                <div class="col-sm-9">
                                    <input type="text" id="e_nama" required name="e_nama" placeholder="Nama Guru" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Telepon </label>
                                <div class="col-sm-9">
                                    <input type="text" id="e_telepon" required name="e_telepon" placeholder="No Telp" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" required name="e_alamat" id="e_alamat" placeholder="Masukan Alamat"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_program_sekolah" id="e_program_sekolah">
                                        <option value="">-- Pilih Program --</option>
                                        <?php foreach ($myprogram as $value) { ?>
                                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_jenis_kelamin" id="e_jenis_kelamin">
                                        <option value="">-- Pilih Pengguna --</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendidikan Terakhir </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_pendidikan_terakhir" id="e_pendidikan_terakhir">
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <?php foreach ($mypendidikan as $value) { ?>
                                            <option value=<?= $value['IDMSPENDIDIKAN'] ?>><?= $value['NMMSPENDIDIKAN'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_agama" id="e_agama">
                                        <option value="">-- Pilih Agama --</option>
                                        <?php foreach ($myagama as $value) { ?>
                                            <option value=<?= $value['KDTBAGAMA'] ?>><?= $value['DESCRTBAGAMA'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="e_email" id="e_email" placeholder="Email" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal lahir </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="e_tgl_lahir" id="e_tgl_lahir" placeholder="24/10/1995"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="e_tempat_lahir" id="e_tempat_lahir" placeholder="Jakarta" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Aktif </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="e_status" id="e_status">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="T">Aktif</option>
                                        <option value="F">Tidak</option>
                                    </select>
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
            Semua Data <?= $page_name ?>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>No Regsistrasi</th>
                <th>Nama</th>
                <th>Tanggal Bayar</th>
                <th>Sekolah</th>
                <th>Tahun Akademik</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
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
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('pengambilanformulir/simpan') ?>",
                    dataType: "JSON",
                    data: $('#formTambah').serialize(),
                    success: function(data) {
                        $('#my-modal').modal('hide');
                        if (data == 1) {
                            document.getElementById("formTambah").reset();
                            swalInputSuccess();
                            location.reload();
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
                    url: "<?php echo base_url('guru/update') ?>",
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
                    url: "<?php echo base_url('pengambilanformulir/delete') ?>",
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

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('pengambilanformulir/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].Noreg + '</td>' +
                        '<td>' + data[i].Namacasis + '</td>' +
                        '<td>' + data[i].tglbayar + '</td>' +
                        '<td>' + data[i].NamaSek + '-' + data[i].NamaJurusan + '</td>' +
                        '<td>' + data[i].TA + '</td>' +
                        '<td >' +
                        '<a  href="<?php echo base_url() ?>pengambilanformulir/cetak/' + data[i].Noreg + '" class="btn btn-xs btn-info" target="_blank" title="Print" data-id="' + data[i].Noreg + '">' +
                        '<i class="ace-icon fa fa-print bigger-120"></i>' +
                        '</a> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].Noreg + '">' +
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