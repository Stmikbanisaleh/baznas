<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
		</button>
	</div>
	<div class="col-xs-1">
		<button href="#my-modal2" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Import Data
		</button>
	</div>
	<br>
	<br>
</div>
<div id="my-modal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Import Data Jenis Pengeluaran</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" enctype="multipart/form-data" id="formImport">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Import Excel FIle </label>
								<div class="col-sm-6">
									<input type="file" id="file" required name="file" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sample </label>
								<div class="col-sm-9">
									<a label class="col-sm-3" for="form-field-1"> Download Sample Format </label></a>
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
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data Rekening</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formTambah">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Rekening</label>
								<div class="col-sm-6">
									<input type="text" id="kode_jurnal" required name="kode_jurnal" placeholder="Kode Rekening" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Rekening </label>
								<div class="col-sm-6">
									<input type="text" id="nama_jurnal" required name="nama_jurnal" placeholder="Nama Rekening" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Rekening </label>
								<div class="col-sm-9">
									<select class="form-control" name="JR" id="JR">
										<option value="">-- Pilih --</option>
										<?php foreach ($myjenisrek as $value) { ?>
											<option value=<?= $value['KETERANGAN'] ?>><?= $value['NAMA_REV'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type </label>
								<div class="col-sm-9">
									<select class="form-control" name="type" id="type">
										<option value="">-- Pilih --</option>
										<?php foreach ($mytype as $value) { ?>
											<option value=<?= $value['KETERANGAN'] ?>><?= $value['NAMA_REV'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Simpan
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Edit Data Rekening</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formEdit">
							<input type="hidden" class="form-control" name="e_no_jurnal" id="e_no_jurnal" />

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Rekening</label>
								<div class="col-sm-6">
									<input type="text" id="e_kode_jurnal" required name="e_kode_jurnal" placeholder="Kode Rekening" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Rekening </label>
								<div class="col-sm-6">
									<input type="text" id="e_nama_jurnal" required name="e_nama_jurnal" placeholder="Nama Rekening" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Rekening </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_JR" id="e_JR">
										<option value="">-- Pilih --</option>
										<?php foreach ($myjenisrek as $value) { ?>
											<option id='<?= 'ej_' . $value['KETERANGAN'] ?>' value=<?= $value['KETERANGAN'] ?>><?= $value['NAMA_REV'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_type" id="e_type">
										<option value="">-- Pilih --</option>
										<?php foreach ($mytype as $value) { ?>
											<option id='<?= 'et_' . $value['KETERANGAN'] ?>' value=<?= $value['KETERANGAN'] ?>><?= $value['NAMA_REV'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_update" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Update
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data guru
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Rekening</th>
				<th>Nama Rekening</th>
				<th>Jenis Rekening</th>
				<th>Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
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
					url: "<?php echo base_url('guru/import') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data) {
						console.log(data);
						$('#my-modal').modal('hide');
						if (data == 1) {
							document.getElementById("formImport").reset();
							swalInputSuccess();
							show_data();
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
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				kode_jurnal: {
					required: true,
				},
				nama_jurnal: {
					required: true,
				},
				JR: {
					required: true,
				},
				type: {
					required: true,
				},
			},
			messages: {
				kode_jurnal: {
					required: "Kode rekening harus diisi!",
				},
				nama_jurnal: {
					required: "Nama rekening harus diisi!",
				},
				JR: {
					required: "Jenis rekening harus diisi!",
				},
				type: {
					required: "Tipe rekening harus diisi!",
				},
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('modulakunting/rekening/simpan') ?>",
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
				JnsTransaksi: {
					required: true,
					maxlength: 3,
					minlength: 2,
				},
				no_jurnal: {
					required: true,
				},
				NamaTransaksi: {
					required: true,
					maxlength: 80,
				},
			},
			messages: {
				JnsTransaksi: {
					required: "Jenis transaksi harus diisi!",
					maxlength: "Jenis Transaksi lebih dari 3 karakter!",
					minlength: "Jenis transaksi kurang dari 2 karakter!",
				},
				no_jurnal: {
					required: "Telepon harus diisi!"
				},
				NamaTransaksi: {
					required: "Nama transaksi harus diisi!",
					maxlength: "Jenis Transaksi lebih dari 80 karakter!",
				},
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('modulakunting/rekening/update') ?>",
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

	//Simpan guru

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('modulakunting/rekening/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						swalDeleteSuccess();
						show_data();
					}
				});
			}
		})
	})

	$('#show_data').on('click', '.item_edit', function() {
		console.log('aa' + 'bb');
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('modulakunting/rekening/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				var jr = 'ej_' + data[0].JR;
				var type = data[0].type;
				console.log(jr);
				$('#e_no_jurnal').val(data[0].no_jurnal);
				$('#e_kode_jurnal').val(data[0].kode_jurnal);
				$('#e_nama_jurnal').val(data[0].nama_jurnal);
				document.getElementById(jr).selected = "true";
				document.getElementById('et_' + type).selected = "true";
			}
		});
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('modulakunting/rekening/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].kode_jurnal + '</td>' +
						'<td>' + data[i].nama_jurnal + '</td>' +
						'<td>' + data[i].JR + '</td>' +
						'<td>' + data[i].type + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].no_jurnal + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].no_jurnal + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button>' +
						'</td>' +
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