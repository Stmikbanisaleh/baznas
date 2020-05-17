<!-- Start Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<!-- End Select2 -->

<div class="row">
    <div class="form-group">
                <div class="col-xs-12">
                    <?php if ($this->session->flashdata('cat_error')) { ?>
                        <div class="alert alert-danger"> <?= $this->session->flashdata('cat_error') ?> </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('cat_success')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('cat_success') ?> </div>
                    <?php } ?>
                </div>
            </div>
    <form class="form-horizontal" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>modulkasir/surattagihan/laporan_pdf">
        <div class="col-xs-5">
            Siswa
            <select class="form-control" name="siswa" id="siswa">
                <option value="0">--Pilih Siswa--</option>
                <?php foreach ($my_siswa as $value) { ?>
                    <option value=<?= $value['NOINDUK'] ?>><?= $value['NOINDUK']." - ".$value['NMSISWA'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-3">
            Kelas
            <select class="form-control" name="kelas" id="kelas">
                <option value="0">--Pilih Kelas--</option>
                <?php foreach ($my_kelas as $value) { ?>
                    <option value=<?= $value['id_kelas'] ?>><?= $value['nama'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-1">
            <br>
            <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
                <a class="ace-icon fa fa-search bigger-120"></a>Periksa
            </button>
        </div>
        <br>
        <br>
    </for
    m>
</div>

<!-- Start Select2 -->
<script>
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
</script>
<!-- End Select2 -->