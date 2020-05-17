<div class="row">
	<div class="col-xs-1">
	</div>
	<br>
	<br>
</div>
<div id="modalTambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Edit Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formTambah">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jabatan </label>
								<div class="col-sm-6">
									<input type="text" id="id" name="id" id="form-field-1" placeholder="Kode Jabatan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan </label>
								<div class="col-sm-9">
									<input type="text" id="nama" name="nama" placeholder="Nama Jabatan" class="form-control" />
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
				<h3 class="smaller lighter blue no-margin">Form Edit <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formEdit">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Aplikasi </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" name="e_id" class="form-control" />
									<input type="text" id="e_appsname" name="e_appsname" placeholder="SIAK" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat</label>
								<div class="col-sm-9">
									<textarea type="text" id="e_alamat" name="e_alamat" placeholder="" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>
								<div class="col-sm-9">
									<input type="text" id="e_email" name="e_email" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sekolah</label>
								<div class="col-sm-9">
									<input type="text" id="e_sekolah" name="e_sekolah" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> URL</label>
								<div class="col-sm-9">
									<input type="text" id="e_url" name="e_url" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja</label>
								<div class="col-sm-9">
									<input type="text" id="e_satker" name="e_satker" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Google</label>
								<div class="col-sm-9">
									<input type="text" id="e_google" name="e_google" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Facebook</label>
								<div class="col-sm-9">
									<input type="text" id="e_facebook" name="e_facebook" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tweeter</label>
								<div class="col-sm-9">
									<input type="text" id="e_tweeter" name="e_tweeter" placeholder="" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Telp</label>
								<div class="col-sm-9">
									<input type="text" id="e_telp" name="e_telp" placeholder="0822xxxx xxxx" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi</label>
								<div class="col-sm-9">
									<textarea id="e_deskripsi" name="e_deskripsi" placeholder="" class="form-control"></textarea>
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
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Data <?= $page_name; ?>
		</div>
	</div>
</div>
<br>
<div class="table-responsive">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th class="col-md-1">Alamat</th>
				<th>Email</th>
				<th>Nama Sekolah</th>
				<th>URL</th>
				<th>Satuan Kerja</th>
				<th>Facebook</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script>
	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_id: {
					required: true
				},
				e_nama: {
					required: true
				},
			},
			messages: {

				e_id: {
					required: "Kode jabatan harus diisi!"
				},
				e_nama: {
					required: "Nama jabatan harus diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('biodata/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 401) {
							swalIdDouble('Terjadi Kesalahan!');
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('biodata/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + data[i].address + '</td>' +
						'<td class="text-center">' + data[i].email + '</td>' +
						'<td>' + data[i].name_school + '</td>' +
						'<td>' + data[i].url + '</td>' +
						'<td>' + data[i].satker + '</td>' +
						'<td>' + data[i].facebook + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" alt="edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'</button>' +
						'</td>' +
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
						"bAutoWidth": false
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//show modal tambah
	$('#item-tambah').on('click', function() {
		$('#modalTambah').modal('show');
	});

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('biodata/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_alamat').val(data[0].address);
				$('#e_appsname').val(data[0].apps_name);
				$('#e_email').val(data[0].email);
				$('#e_sekolah').val(data[0].name_school);
				$('#e_url').val(data[0].url);
				$('#e_tweeter').val(data[0].tweeter);
				$('#e_satker').val(data[0].satker);
				$('#e_google').val(data[0].google);
				$('#e_facebook').val(data[0].facebook);
				$('#e_telp').val(data[0].no_telp);
				$('#e_deskripsi').val(data[0].meta_deskripsi);
				$('#e_favicon').val(data[0].favicon);
				$('#e_folder').val(data[0].directory);
			}
		});
	});
</script>