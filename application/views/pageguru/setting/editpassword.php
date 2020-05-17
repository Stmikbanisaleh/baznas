<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" role="form" id="formTambah">
            <div id="edit-password" class="tab-pane">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Password</label>
                    <div class="col-sm-4">
                        <input minlength="6" type="password" name="password" value="" id="password" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password</label>
                    <div class="col-sm-4">
                        <input minlength="6" type="password" value="" name="password_new" id="password_new" class="form-control" />
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
            submitHandler: function(form) {
                var password1 = form.password.value; 
                var password2 = form.password_new.value; 
                if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 
                $('#btn_simpan').html('Sending..');
                formdata = new FormData(form);
                
                $.ajax({
                    url: "<?php echo base_url('modulguru/setting/update') ?>",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        document.getElementById("formTambah").reset();
                        swalEditSuccess();
                    }
                });
            }
        })
    }
</script>