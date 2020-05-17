<div class="row">
    <form class="form-horizontal" role="form" id="formSearch">
        <div class="col-xs-3">
            <select class="form-control" name="tahun" id="tahun">
                <?php foreach ($mytahun as $value) { ?>
                    <option value=<?= $value['TAHUN'] ?>><?= $value['TAHUN'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="semester" id="semester">
                <option value="">-- Pilih semester --</option>
                <?php foreach ($mysemester as $value) { ?>
                    <option value=<?= $value['SEMESTER'] ?>><?= $value['SEMESTER'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="programsekolah" id="programsekolah">
                <?php foreach ($myps as $value) { ?>
                    <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] . '-' . $value['SINGKTBPS'] ?></option>
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
        <div class="col-xs-1">
            <button id="kirimemail" role="button" data-toggle="modal" class="btn btn-xs btn-info">
                <a class="ace-icon fa fa-share bigger-120"></a>Kirim Email
            </button>
        </div>
        <br>
        <br>
    </form>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Semua Data Permata ajar
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Mata Ajar</th>
                <th>Kelas</th>
                <th>UTS</th>
                <th>UAS</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('#kirimemail').click(function() {
        $('#kirimemail').html('Proses..');
        var periode = $('#tahun').val();
        var ps = $('#programsekolah').val();
        var semester = $('#semester').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('permataajar/kirim_email') ?>',
            data: {
                ps: ps,
                periode: periode,
                semester: semester
            },
            dataType: 'json',
            success: function(response) {
                $('#kirimemail').html('<i class="ace-icon fa fa-search"></i>' +
                    'Kirim Email');
                if (response == true) {
                    swalInputSuccess();
                } else {
                    swalInputFailed();
                }

                /* END TABLETOOLS */
            }
        });
    });

    if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                tahun: {
                    required: true,
                },
                semester: {
                    required: true,
                },
                programsekolah: {
                    required: true,
                },
            },
            messages: {
                tahun: {
                    required: "Tahun harus diisi!"
                },
                semester: {
                    required: "Semester harus diisi!"
                },
                programsekolah: {
                    required: "Harap Masukan Program sekolah dengan benar!"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('permataajar/search') ?>",
                    data: $('#formSearch').serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].nama_siswa + '</td>' +
                                '<td>' + data[i].nama_mapel + '</td>' +
                                '<td>' + data[i].KLSTRNIL + '</td>' +
                                '<td>' + data[i].UTSTRNIL + '</td>' +
                                '<td>' + data[i].UASTRNIL + '</td>' +
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
                return false;
            }
        });
    }

    $(document).ready(function() {
        // show_data();
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
                    url: "<?php echo base_url('karyawan/delete') ?>",
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

    $('#item-check').on('click', '.item_edit', function() {
        show_data();
    });
    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('permataajar/search') ?>",
            async: true,
            dataType: 'JSON',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].nip + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + data[i].jabatan + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].level + '</td>' +
                        '<td>' + data[i].statusv2 + '</td>' +
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