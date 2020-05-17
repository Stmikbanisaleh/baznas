<div class="row">
	<div class="col-xs-6">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" id="formEdit">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode </label>
				<div class="col-sm-6">
					<input type="hidden" id="e_id" required name="e_id" />
					<input type="text" disabled id="e_IdGuru" required name="e_IdGuru" placeholder="Kode Guru" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Dapodik </label>
				<div class="col-sm-9">
					<input type="text" disabled id="e_GuruNoDapodik" required name="e_GuruNoDapodik" placeholder="kode Dapodik" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
				<div class="col-sm-9">
					<input type="text" id="e_nama" required name="e_nama" placeholder="Nama Guru" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Telepon </label>
				<div class="col-sm-9">
					<input type="text" id="e_telepon" required name="e_telepon" placeholder="No Telp" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
				<div class="col-sm-9">
					<textarea class="form-control" required name="e_alamat" id="e_alamat" placeholder="Masukan Alamat"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
				<div class="col-sm-9">
					<select class="form-control" name="e_jenis_kelamin" id="e_jenis_kelamin">
						<option value="">-- Pilih Pengguna --</option>
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendidikan Terakhir </label>
				<div class="col-sm-9">
					<select class="form-control" name="e_pendidikan_terakhir" id="e_pendidikan_terakhir">
						<option value="">-- Pilih Pendidikan --</option>
						<?php foreach ($mypendidikan as $value) { ?>
							<option value=<?= $value['IDMSPENDIDIKAN'] ?>><?= $value['NMMSPENDIDIKAN'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama </label>
				<div class="col-sm-9">
					<select class="form-control" name="e_agama" id="e_agama">
						<option value="">-- Pilih Agama --</option>
						<?php foreach ($myagama as $value) { ?>
							<option value=<?= $value['KDTBAGAMA'] ?>><?= $value['DESCRTBAGAMA'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Telah bergabung (tahun) </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="e_tahun" id="e_tahun" placeholder="" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="e_email" id="e_email" placeholder="Email" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal lahir </label>
				<div class="col-sm-9">
					<input type="date" class="form-control" name="e_tgl_lahir" id="e_tgl_lahir" placeholder="24/10/1995"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="e_tempat_lahir" id="e_tempat_lahir" placeholder="Jakarta" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Aktif </label>
				<div class="col-sm-9">
					<select class="form-control" name="e_status" id="e_status">
						<option value="">-- Pilih Status --</option>
						<option value="T">Aktif</option>
						<option value="F">Tidak</option>
					</select>
				</div>
			</div>
	</div>
</div>
</div>
</div>
<div class="modal-footer">
	<button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
		<i class="ace-icon fa fa-save"></i>
		Ubah
	</button>
	<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
		<i class="ace-icon fa fa-times"></i>
		Batal
	</button>
</div>
</form>
<script type="text/javascript">
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
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
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('modulguru/biodata/simpan') ?>",
					dataType: "JSON",
					data: $('#formTambah').serialize(),
					success: function(data) {
						$('#my-modal').modal('hide');
						if (data == 1) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formTambah").reset();
							swalIdDouble();
						} else {
							document.getElementById("formTambah").reset();
							swalInputFailed();
						}
					}
				});
				return false;
			}
		});
	}

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
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
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('modulguru/biodata/update') ?>",
					dataType: "JSON",
					data: $('#formEdit').serialize(),
					success: function(data) {
						$('#modalEdit').modal('hide');
						if (data == 1) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formEdit").reset();
							swalIdDouble();
						} else {
							document.getElementById("formEdit").reset();
							swalEditFailed();
						}
					}
				});
				return false;
			}
		});
	}

	$(document).ready(function() {
		show_data();
		$('#datatable_tabletools').DataTable();
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('modulguru/biodata/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_IdGuru').val(data[0].IdGuru);
				$('#e_IdGuru2').val(data[0].IdGuru);
				$('#e_GuruNoDapodik').val(data[0].GuruNoDapodik);
				$('#e_nama').val(data[0].GuruNama);
				$('#e_telepon').val(data[0].GuruTelp);
				$('#e_alamat').val(data[0].GuruAlamat);
				$('#e_program_sekolah').val(data[0].GuruBase);
				$('#e_jenis_kelamin').val(data[0].GuruJenisKelamin);
				$('#e_pendidikan_terakhir').val(data[0].GuruPendidikanAkhir);
				$('#e_agama').val(data[0].GuruAgama);
				$('#e_email').val(data[0].GuruEmail);
				$('#e_tahun').val(data[0].GuruWaktu);
				$('#e_tgl_lahir').val(data[0].GuruTglLahir);
				$('#e_tempat_lahir').val(data[0].GuruTempatLahir);
				$('#e_status').val(data[0].GuruStatus);
			}

		});
	}
</script>