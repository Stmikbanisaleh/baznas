<!-- Start Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<!-- End Select2 -->

<div class="row">
    <form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>modulkasir/kartubayar/laporan_pdf">
        <div class="form-group">
            <div class="col-xs-6">
                Siswa
                <select class="form-control" name="siswa" id="siswa">
                    <option value="0">--Pilih Siswa--</option>
                    <?php foreach ($my_siswa as $value) { ?>
                        <option value=<?= $value['NOINDUK'] ?>><?= $value['NOINDUK']." - ".$value['NMSISWA'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-3">
                Pilihan Pertama
                <select class="form-control" name="p_pertama" id="p_pertama">
                    <option value="0">--Pilih No Pembayaran--</option>
                </select>
            </div>
            <div class="col-xs-3">
                Dari
                <select class="form-control" name="dari" id="dari">
                    <option value="0">--Pilih No Pembayaran--</option>
                </select>
            </div>
            <div class="col-xs-3">
                Sampai
                <select class="form-control" name="sampai" id="sampai">
                    <option value="0">--Pilih No Pembayaran--</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-1">
                <br>
                <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
                    <a class="ace-icon fa fa-search bigger-120"></a>Periksa
                </button>
            </div>
        </div>
        <br>
        <br>
    </form>
</div>

<!-- Start Select2 -->
<script>
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
    $(document).ready(function() {
        $("#siswa").change(function() {
            var siswa = $('#siswa').val();
            $.ajax({
                type: "POST",
                url: "kartubayar/show_nopem",
                data: {
                    siswa: siswa
                }
            }).done(function(data) {
                $("#p_pertama").html(data);
                $("#dari").html(data);
                $("#sampai").html(data);
            });
        });

    });
</script>
<!-- End Select2 -->