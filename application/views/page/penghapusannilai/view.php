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
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script type="text/javascript">
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
                    url: "<?php echo base_url('penghapusannilai/search') ?>",
                    data: $('#formSearch').serialize(),
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
                    url: "<?php echo base_url('penghapusannilai/delete') ?>",
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
            url: "<?php echo base_url('penghapusannilai/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].id_pengawas);
                $('#e_nip').val(data[0].nip);
                $('#e_nama').val(data[0].nama);
                $('#e_jabatan').val(data[0].jabatan);
                $('#e_email').val(data[0].username);
                $('#e_level').val(data[0].level);
                $('#e_status').val(data[0].status);
                $('#e_file').val(data[0].gambar);
                $("#avatar").attr('src', 'http://localhost/siak/assets/gambar/2fb4ccd62e4ab2886d2b51fe1fa5ca2e.png');
            }
        });
    });

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