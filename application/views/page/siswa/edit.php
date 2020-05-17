<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form" id="formTambah">
            <div class="form-group">
                <label class="col-xs-3 control-label no-padding-right" for="form-field-1"> No Registrasi </label>
                <div class="col-xs-9">
                    <span class="input-icon">
                        <input type="text" name="noreg" readonly value="<?= $mysiswa->Noreg; ?>" id="noreg" />
                        <i class="ace-icon fa fa-check-square-o blue"></i>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Nama Siswa</label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->Namacasis; ?>" required class="col-xs-10 col-sm-5" id="nama" name="nama" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Agama </label>
                <div class="col-sm-3">
                    <select class="form-control" required name="agama" id="agama">
                        <option value="">-- Pilih Agama --</option>
                        <?php foreach ($myagama as $value) { ?>
                            <?php if ($mysiswa->agama == $value['KDTBAGAMA']) {
                                echo "<option value='" . $value['KDTBAGAMA'] . "' selected>" . $value['DESCRTBAGAMA'] . "</option>";
                            } else {
                                echo "<option value='" . $value['KDTBAGAMA'] . "'>" . $value['DESCRTBAGAMA'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Jenis Kelamin </label>
                <div class="col-sm-3">
                    <select required class="form-control" name="jk" id="jk">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <?php foreach ($myjeniskelamin as $value) { ?>
                            <?php if ($mysiswa->Jk == $value['KETERANGAN']) {
                                echo "<option value='" . $value['KETERANGAN'] . "' selected>" . $value['NAMA_REV'] . "</option>";
                            } else {
                                echo "<option value='" . $value['KETERANGAN'] . "'>" . $value['NAMA_REV'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Tanggal Lahir </label>
                <div class="col-sm-9">
                    <span class="input-icon">
                        <input type="date" name="tglhr" id="tglhr" required value="<?= $mysiswa->tgllhr ?>" />
                        <i class="ace-icon fa fa-calendar blue"></i>
                    </span>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Sekolah</label>
                <div class="col-sm-3">
                    <select class="form-control" name="sekolah" id="sekolah">
                        <option value="">-- Pilih Sekolah --</option>
                        <?php foreach ($mysekolah as $value) { ?>
                            <?php if ($mysiswa->kodesekolah == $value['kodesekolah']) {
                                echo "<option value='" . $value['kodesekolah'] . "' selected>" . $value['sekolah']  . "-" . $value['NamaJurusan'] .  "</option>";
                            } else {
                                echo "<option value='" . $value['kodesekolah'] . "'>" . $value['sekolah'] . "-" . $value['NamaJurusan'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">Photo Siswa</label>
                <div class="col-sm-9">
                    <input type="file" name="file1" id="file1" class="col-xs-12" id="form-field-icon-2" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Tempat Lahir</label>
                <div class="col-sm-9">
                    <span class="input-icon">
                        <input type="text" value="<?= $mysiswa->tptlhr ?>" required name="tempat" id="tempat" placeholder="Bekasi" />
                        <i class="ace-icon fa fa-home blue"></i>
                    </span>
                </div>
            </div>
            <hr />
            <h3 class="header smaller lighter blue">
                Data Keluarga
            </h3>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Ayah </label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->NmBapak ?>" required name="ayah" id="ayah" placeholder="Nama Ayah" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Penghasilan</label>
                <div class="col-sm-6">
                    <select class="form-control" name="penghasilan" id="penghasilan">
                        <option value="">-- Pilih Penghasilan --</option>
                        <?php
                        foreach ($mytbpk as $value) { ?>
                            <?php if ($mysiswa->GajiOrtu == $value['IDMSPENGHASILAN']) {
                                echo "<option value='" . $value['IDMSPENGHASILAN'] . "' selected>" . $value['NMMSPENGHASILAN'] . "</option>";
                            } else {
                                echo "<option value='" . $value['IDMSPENGHASILAN'] . "'>" . $value['NMMSPENGHASILAN'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Nama Ibu </label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->NmIbu ?>" required name="ibu" id="ibu" placeholder="Nama Ibu" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Kelurahan </label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->Kelurahan ?>" name="kelurahan" id="kelurahan" placeholder="kelurahan" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Provinsi</label>
                <div class="col-sm-6">
                    <select class="form-control" name="provinsi" id="provinsi">
                        <option value="">-- Pilih Provinsi --</option>
                        <?php
                        foreach ($mypro as $value) { ?>
                            <?php if ($mysiswa->Propinsi == $value['KDTBPRO']) {
                                echo "<option value='" . $value['KDTBPRO'] . "' selected>" . $value['PROPTBPRO'] . "</option>";
                            } else {
                                echo "<option value='" . $value['KDTBPRO'] . "'>" . $value['PROPTBPRO'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kabupaten</label>
                <div class="col-sm-6">
                    <select class="form-control" name="kabupaten" id="kabupaten">
                        <option value="">-- Pilih Kabupaten --</option>
                        <?php 
                        foreach ($mytbpro as $value) { ?>
                            <?php if ($mysiswa->Kabupaten == $value['KDTBPRO']) {
                                echo "<option value='" . $value['KDTBPRO'] . "' selected>" . $value['KOTATBPRO'] . "</option>";
                            } else {
                                echo "<option value='" . $value['KDTBPRO'] . "'>" . $value['KOTATBPRO'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kecamatan</label>
                <div class="col-sm-6">
                    <select class="form-control" name="kecamatan" id="kecamatan">
                        <option value="">-- Pilih Kecamatan --</option>
                        <?php
                        foreach ($mytbkec as $value) { ?>
                            <?php if ($mysiswa->Kecamatan == $value['IDKEC']) {
                                echo "<option value='" . $value['IDKEC'] . "' selected>" . $value['NMKEC'] . "</option>";
                            } else {
                                echo "<option value='" . $value['IDKEC'] . "'>" . $value['NMKEC'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">Kode Pos</label>
                <div class="col-sm-9">
                    <input type="number" name="kdpos" value="<?= $mysiswa->Kodepos ?>" id="kdpos" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Hp</label>
                <div class="col-sm-9">
                    <input type="number" name="nohp" value="<?= $mysiswa->TelpHp ?>" id="nohp" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Wali </label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->NamaWali ?>" name="wali" id="wali" placeholder="Nama Wali" class=" col-sm-3" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pekerjaan</label>
                <div class="col-sm-6">
                    <select class="form-control" name="pekerjaan" id="pekerjaan">
                        <option value="">-- Pilih Pekerjaan --</option>
                        <?php
                        foreach ($myjob as $value) { ?>
                            <?php if ($mysiswa->Perkerjaanortu == $value['IDMSPEKERJAAN']) {
                                echo "<option value='" . $value['IDMSPEKERJAAN'] . "' selected>" . $value['NMMSPEKERJAAN'] . "</option>";
                            } else {
                                echo "<option value='" . $value['IDMSPEKERJAAN'] . "'>" . $value['NMMSPEKERJAAN'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Alamat</label>
                <div class="col-sm-8">
                    <input type ="text" value="<?=$mysiswa->AlamatRumah?>" id="alamat2" name="alamat2" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Telp Rumah</label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->TelpRumah ?>" name="telprmh" id="telprmh" placeholder="Telp Rumah" class=" col-sm-3" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Telp Wali</label>
                <div class="col-sm-9">
                    <div class="inline">
                        <input type="text" value="<?= $mysiswa->TelpWali ?>" name="telpwali" id="telpwali" placeholder="Telp Wali" />
                    </div>
                </div>
            </div>
            <hr />
            <h3 class="header smaller lighter blue">
                Data Sekolah
            </h3>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Asal Sekolah </label>
                <div class="col-sm-9">
                    <input type="text" id="aslsekolah" value="<?= $mysiswa->AsalSekolah ?>" name="aslsekolah" placeholder="Asal Sekolah" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Provinsi </label>
                <div class="col-sm-9">
                    <select class="form-control" name="provinsi2" id="provinsi2">
                        <option value="">-- Pilih Provinsi --</option>
                        <?php
                        foreach ($mypro as $value) { ?>
                            <?php if ($mysiswa->aslsekpropinsi == $value['KDTBPRO']) {
                                echo "<option value='" . $value['KDTBPRO'] . "' selected>" . $value['PROPTBPRO'] . "</option>";
                            } else {
                                echo "<option value='" . $value['KDTBPRO'] . "'>" . $value['PROPTBPRO'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kabupaten</label>
                <div class="col-sm-6">
                    <select class="form-control" name="kabupaten2" id="kabupaten2">
                        <option value="">-- Pilih Kabupaten --</option>
                        <?php
                        foreach ($mytbpro as $value) { ?>
                            <?php if ($mysiswa->KABUPATEN == $value['KDTBPRO']) {
                                echo "<option value='" . $value['KDTBPRO'] . "' selected>" . $value['KOTATBPRO'] . "</option>";
                            } else {
                                echo "<option value='" . $value['KDTBPRO'] . "'>" . $value['KOTATBPRO'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kecamatan</label>
                <div class="col-sm-6">
                    <select class="form-control" name="kecamatan2" id="kecamatan2">
                        <option value="">-- Pilih Kecamatan --</option>
                        <?php
                        foreach ($mytbkec as $value) { ?>
                            <?php if ($mysiswa->KECAMATAN == $value['IDKEC']) {
                                echo "<option value='" . $value['IDKEC'] . "' selected>" . $value['NMKEC'] . "</option>";
                            } else {
                                echo "<option value='" . $value['IDKEC'] . "'>" . $value['NMKEC'] . "</option>";
                            } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Kelurahan </label>
                <div class="col-sm-9">
                    <input type="text" value="<?= $mysiswa->ASlKelurahan ?>" name="kelurahan2" id="kelurahan2" placeholder="kelurahan" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Alamat</label>

                <div class="col-sm-8">
                    <input class="form-control" type="text" value="<?= $mysiswa->AlamatASalSek ?>" name ="alamat3" id="alamat3" placeholder="" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-5">No Ijazah</label>

                <div class="col-sm-9">
                    <div class="clearfix">
                        <input class="col-xs-1" type="text" value="<?= $mysiswa->NoIjazah ?>" name="noijazah" id="noijazah" placeholder="" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right">Photo Ijazah</label>
                <div class="col-sm-9">
                    <input type="file" id="photoijazah" name="photoijazah" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Tahun Masuk</label>
                <div class="col-sm-9">
                    <input type="number" id="thnmasuk" value="<?= $mysiswa->thnmasuk ?>" name="thnmassuk" placeholder="Tahun masuk"  />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">NEM</label>
                <div class="col-sm-9">
                    <div class="inline">
                        <input type="text" name="nem" id="nem" value="<?= $mysiswa->NilaiNem ?>" value="Tag Input Control" placeholder="Masukan NEM Sekolah " />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Photo NEM</label>

                <div class="col-sm-9">
                    <div class="inline">
                        <!-- <input type="file" name="photonem" id="photonem" value="" /> -->
                    </div>
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    <a href="<?php echo base_url() . 'siswa/index'; ?>"> Kembali </a>
                </div>
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
                $('#btn_simpan').html('Sending..');
                formdata = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url('siswa/update') ?>",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        console.log(response);
                        $('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
                            'Simpan');
                            swalEditSuccess();
                            location.reload();
                    }
                });
            }
        })
    }
</script>