<div class="row">
    <div class="col-xs-6">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form" id="formSearch">

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Sekolah </label>
                <div class="col-sm-9">
                    <select class="form-control" name="programsekolah" id="programsekolah">
                        <option value="">-- Pilih Program --</option>
                        <?php foreach ($myprogram as $value) { ?>
                            <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] .' '. $value['DESCRTBJS']?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Akademik </label>
                <div class="col-sm-9">
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="">-- Pilih Tahun --</option>
                        <?php foreach ($myakadmk as $value) { ?>
                            <option value=<?= $value['TAHUN'] ?>><?= $value['TAHUN'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" id="btn_periksa" class="btn btn-xs btn-info pull-right">
                <i class="ace-icon fa fa-search bigger-120"></i>
                Periksa
            </button>
            <br>
            <br>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Tampil Jadwal
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Guru</th>
                <th>Mata Ajar</th>
                <th>Hari </th>
                <th>Ruang</th>
                <th>Kelas</th>
                <th>Jam</th>
                <th>Program Sekolah</th>
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
                periode: {
                    required: true,
                },
                programsekolah: {
                    required: true,
                },
            },
            messages: {
                periode: {
                    required: "Periode harus diisi!"
                },
                programsekolah: {
                    required: "Harap Masukan Program sekolah dengan benar!"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('modulguru/jadwal/search') ?>",
                    data: $('#formSearch').serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].GuruNama + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].hari + '</td>' +
                                '<td>' + data[i].RUANG + '</td>' +
                                '<td>' + data[i].NMKLSTRJDK + '</td>' +
                                '<td>' + data[i].JAM + '</td>' +
                                '<td>' + data[i].DESCRTBPS + '</td>' +
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

    $('#item-check').on('click', '.item_edit', function() {
        show_data();
    });
    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('modulguru/jadwal/search') ?>",
            async: true,
            dataType: 'JSON',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].idGuru + '</td>' +
                        '<td>' + data[i].id_mapel + '</td>' +
                        '<td>' + data[i].hari + '</td>' +
                        '<td>' + data[i].Ruang + '</td>' +
                        '<td>' + data[i].NMKLSTRJDK + '</td>' +
                        '<td>' + data[i].JAM + '</td>' +
                        '<td>' + data[i].DESCRTBPS + '</td>' +
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