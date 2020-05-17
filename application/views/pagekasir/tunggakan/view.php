<div class="row">
    <div class="col-xs-1">
        <button role="button" id="btn_generate" onclick="generate();" class="btn btn-xs btn-warning">
            <a class="ace-icon fa fa-plus bigger-120"></a> Generate
        </button>
    </div>
    <br>
    <br>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Semua Data
        </div>
    </div>
</div>
<br>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>No Induk</th>
                <th>Nama</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        show_data();
        $('#datatable_tabletools').DataTable();
    });

    function generate() {
        $('#btn_generate').html('Generating...');
        document.getElementById("btn_generate").setAttribute("disabled", true);
        $.ajax({
            url: "<?php echo base_url('modulkasir/tunggakan/generate') ?>",
            type: "POST",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                $('#btn_generate').html('<i class="ace-icon fa fa-plus"></i>' +
                    'Generate');
                if (response == true) {
                    swalGenerateSuccess();
                    document.getElementById("btn_generate").removeAttribute("disabled");
                    show_data();
                } else if (response == 401) {
                    swalIdDouble('Nama Ruangan Sudah digunakan!');
                    document.getElementById("btn_generate").removeAttribute("disabled");
                } else {
                    swalInputFailed();
                    document.getElementById("btn_generate").removeAttribute("disabled");
                }
            }
        });
    };
    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulkasir/tunggakan/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-left">' + no + '</td>' +
                        '<td class="text-left">' + data[i].NIS + '</td>' +
                        '<td class="text-left">' + data[i].Namacasis + '</td>' +
                        '<td class="text-right">' + data[i].totaltagihan2 + '</td>' +
                        '<td class="text-right">' + data[i].bayar2 + '</td>' +
                        '<td class="text-right">' + data[i].sisa2 + '</td>' +
                        '<td class="text-left">' + data[i].TA + '</td>' +
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