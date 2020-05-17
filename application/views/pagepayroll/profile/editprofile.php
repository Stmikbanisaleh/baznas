<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" role="form" id="formTambah">
            <div id="edit-password" class="tab-pane">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">No Induk</label>
                    <div class="col-sm-4">
                        <input type="hidden" name="e_id" value="<?php echo $mydata[0]['IdGuru']; ?>" id="e_id" class="form-control" />
                        <input readonly type="text" name="nip" value="<?php echo $mydata[0]['IdGuru']; ?>" id="nip" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Nama</label>
                    <div class="col-sm-4">
                        <input minlength="4" readonly type="text" value="<?php echo $mydata[0]['GuruNama']; ?>" name="nama" id="nama" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Email</label>
                    <div class="col-sm-4">
                        <input minlength="4" type="text" value="<?php echo $mydata[0]['GuruEmail']; ?>" name="email" id="email" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Telp</label>
                    <div class="col-sm-4">
                        <input minlength="4" type="text" value="<?php echo $mydata[0]['GuruTelp']; ?>" name="telp" id="telp" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?php echo $mydata[0]['GuruAlamat']; ?>" name="alamat" id="alamat" class="form-control" />
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Foto Profile</label>
                    <div class="col-sm-9">
                        <input type="file" name="file" id="file" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_simpan" class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-save bigger-110"></i>
                    Ubah
                </button> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url() . 'modulguru/profile/index'; ?>" class="ace-icon fa fa-back bigger-110">
                    Kembali</a>
            </div>
        </form>
    </div>

</div>
<script type="text/javascript">
    if ($("#formTambah").length > 0) {
        $("#formTambah").validate({
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

                id: {
                    required: "Kode jabatan harus diisi!"
                },
                nama: {
                    required: "Nama jabatan harus diisi!"
                },

            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                formdata = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url('modulguru/profile/update') ?>",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        document.getElementById("formTambah").reset();
                        swalEditSuccess();
                        location.reload();
                    }
                });
            }
        })
    }
</script>