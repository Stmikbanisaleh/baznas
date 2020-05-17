<div class="row">
    <div class="col-sm-12 widget-container-col" id="widget-container-col-12">
        <div class="widget-box transparent" id="widget-box-12">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Form Import Data Pembayaran</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" id="formImport">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sekolah </label>
                                    <div class="col-xs-6">
                                        <select class="form-control" name="sekolah" id="sekolah">
                                            <option value="0">-- Status --</option>
                                            <?php foreach ($sekolah as $value) { ?>
                                                <option value=<?= $value['KDTBPS'] ?>><?= $value['DESCRTBPS'] ?> - <?= $value['DESCRTBJS'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Import Excel FIle </label>
                                    <div class="col-sm-6">
                                        <input type="file" id="file" required name="file" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sample </label>
                                    <div class="col-sm-9">
                                        <a href="<?php echo base_url() . 'modulkasir/impbayar/downloadsample' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
                        <i class="ace-icon fa fa-save"></i>
                        Simpan
                    </button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div>
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
                        url: "<?php echo base_url('modulkasir/impbayar/import') ?>",
                        data: formdata,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        success: function(data) {
                            console.log(data);
                            if (data == 1 || data == true) {
                                document.getElementById("formImport").reset();
                                swalInputSuccess();
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
    </script>