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
            <th>Kelas</th>
            <th>Tagihan</th>
            <th>Bayar</th>
            <th>Sisa</th>
            <th>Tahun Akademik</th>
        </tr>
    </thead>
    <tbody id="show_data">

</tbody>
</table>
</div>
<hr>
<br>
<div class="table-responsive">
<table id="table_id2" class="display">
    <thead>
        <tr>
            <th class="col-md-1">No</th>
            <th>No Induk</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Bayar</th>
            <th>Petugas</th>
            <th>Tahun Akademik</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="show_data2">

    </tbody>
</table>
</div>
<hr>
<br>
<div class="table-responsive">
<table id="table_id3" class="display">
    <thead>
        <tr>
            <th class="col-md-1">No</th>
            <th>No Induk</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Tagihan</th>
            <th>Bayar</th>
            <th>Sisa</th>
            <th>Petugas</th>
            <th>Tahun Akademik</th>
        </tr>
    </thead>
    <tbody id="show_data3">

    </tbody>
</table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        show_data();
        $('#table_id').DataTable();
        $('#table_id2').DataTable();
        $('#table_id3').DataTable();
    });

    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulsiswa/rekap/search') ?>',
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
                        '<td>' + data[i].NIS + '</td>' +
                        '<td>' + data[i].Kelas + '</td>' +
                        '<td>' + formatRupiah(data[i].TotalTagihan) + '</td>' +
                        '<td>' + formatRupiah(data[i].Bayar) + '</td>' +
                        '<td>' + formatRupiah(data[i].Sisa) + '</td>' +
                        '<td>' + data[i].TA + '</td>' +
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

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulsiswa/rekap/search_pemb_sekolah') ?>',
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
                        '<td>' + data[i].NIS + '</td>' +
                        '<td>' + data[i].Kelas + '</td>' +
                        '<td>' + data[i].tglentri + '</td>' +
                        '<td>' + formatRupiah(data[i].TotalBayar) + '</td>' +
                        '<td>' + data[i].useridd + '</td>' +
                        '<td>' + data[i].TA + '</td>' +
                        '<td>' +
                        '<a target="_blank"  href="<?php echo  base_url() . 'modulsiswa/rekap/print2?noreg=' ?>' + data[i].Noreg + '&no=' + data[i].Nopembayaran + '&kls=' + data[i].Kelas + '" class="btn btn-xs btn-info" title="Print" data-id="' + data[i].NIS + '">' +
                        '<i class="ace-icon fa fa-print bigger-120"></i>' +
                        '</a> &nbsp' +
                        '</td>' +
                        '</tr>';
                    no++;
                }
                $("#table_id2").dataTable().fnDestroy();
                var a = $('#show_data2').html(html);
                //                    $('#mydata').dataTable();
                if (a) {
                    $('#table_id2').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,

                    });

                }
                /* END TABLETOOLS */
            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('modulsiswa/rekap/search_pemb_sekolah_q2') ?>',
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
                        '<td>' + data[i].NIS + '</td>' +
                        '<td>' + data[i].Kelas + '</td>' +
                        '<td>' + data[i].tglentri + '</td>' +
                        '<td>' + data[i].namajenisbayar + '</td>' +
                        '<td>' + formatRupiah(data[i].Nominal) + '</td>' +
                        '<td>' + formatRupiah(data[i].nominalbayar) + '</td>' +
                        '<td>' + formatRupiah(data[i].sisa) + '</td>' +
                        '<td>' + data[i].useridd + '</td>' +
                        '<td>' + data[i].TA + '</td>' +
                        '</tr>';
                    no++;
                }
                $("#table_id3").dataTable().fnDestroy();
                var a = $('#show_data3').html(html);
                //                    $('#mydata').dataTable();
                if (a) {
                    $('#table_id3').dataTable({
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

    function formatRupiah(angka) {
        if (angka != null) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        } else {
            return 0;
        }

    }
</script>