<form class="form-horizontal" role="form" id="formTambah">
    <div id="edit-password" class="tab-pane">
        <div class="space-10"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Password Baru</label>
            <div class="col-sm-9">
                <input minlength="6" required type="password" name="password1" id="form-field-pass1" />
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Ulangi Passsword Baru</label>

            <div class="col-sm-9">
                <input minlength="6" required type="password" name="password2" id="form-field-pass2" />
            </div>
        </div>
    </div>
    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button id="btn_simpan" class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Ubah
            </button>
        </div>
    </div>
</form>
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
                $.ajax({
                    url: "<?php echo base_url('setting/simpan2') ?>",
                    type: "POST",
                    data: $('#formTambah').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
                            'Simpan');
                        if (response == true) {
                            document.getElementById("formTambah").reset();
                            swalEditSuccess();
                            show_data();
                            $('#modalTambah').modal('hide');
                        } else if (response == 0) {
                            swalEditFailed('Password New dan Konfirm tidak sama!');
                        } else {
                            swalEditFailed();
                        }
                    }
                });
            }
        })
    }
</script>