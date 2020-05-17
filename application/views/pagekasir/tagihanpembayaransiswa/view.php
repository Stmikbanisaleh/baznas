<div class="row">
    <form class="form-horizontal" role="form" id="formSearch">
        <div class="col-xs-3">
            <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS"></textarea>
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
                <th>Kelas</th>
                <th>Total Tagihan</th>
                <th>Bayar</th>
                <th>Sisa</th>
                <th>Tahun Akademik</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script>
    if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
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
                    url: "<?php echo base_url('modulkasir/tagihanpembayaran/search') ?>",
                    type: "POST",
                    data: $('#formSearch').serialize(),
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].NIS + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].Kelas + '</td>' +
                                '<td>' + data[i].TotalTagihan2 + '</td>' +
                                '<td>' + data[i].Bayar2 + '</td>' +
                                '<td>' + data[i].Sisa2 + '</td>' +
                                '<td>' + data[i].THNAKAD + '</td>' +
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
</script>
<script type="text/javascript">
    $(document).ready(function() {
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
                        '<td>' + data[i].kodesekolah + '</td>' +
                        '<td>' + data[i].Kodejnsbayar + '</td>' +
                        '<td>' + data[i].ThnMasuk + '</td>' +
                        '<td>' + data[i].nominal_v + '</td>' +
                        '<td>' + data[i].TA + '</td>' +
                        '<td>' + data[i].createdAt + '</td>' +
                        '<td>' + data[i].userridd + '</td>' +
                        '<td>' + data[i].status + '</td>' +
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
</script>