<div class="row">
	<form class="form-horizontal" role="form" id="formTambah">
		<div class="form-group">
			<div class="col-xs-3">
				Jenis Transaksi
				<select class="form-control tahun" name="jenis" id="tahun">
					<option value="0">--Pilih Jenis Transaksi--</option>
					<?php foreach ($mytrx as $value) { ?>
						<option value=<?= $value['kode_jurnal'] ?>><?= $value['NamaTransaksi'] . "-" . $value['kode_jurnal'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-xs-2">
				Debet / Kredit
				<select class="form-control tahun" name="dk" id="dk">
					<option value="0">--Pilih D/K--</option>
					<?php foreach ($dk as $value) { ?>
						<option value=<?= $value['KETERANGAN'] ?>><?= $value['NAMA_REV'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-xs-4">
				Keterangan
				<input type="text" id="ket" required name="ket" placeholder="Keterangan" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-3">
				Nilai
				<input type="text" id="nominal" required name="nominal" placeholder="Nilai" class="form-control" />
				<input type="hidden" id="nominal_v" name="nominal_v" class="form-control" />
				<script language="JavaScript">
					var rupiah3 = document.getElementById('nominal');
					rupiah3.addEventListener('keyup', function(e) {
						// tambahkan 'Rp.' pada saat form di ketik
						// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
						rup3 = this.value.replace(/\D/g, '');
						$('#nominal_v').val(rup3);
						rupiah3.value = formatRupiah3(this.value, 'Rp. ');
					});

					function formatRupiah3(angka, prefix) {
						var number_string = angka.replace(/[^,\d]/g, '').toString(),
							split = number_string.split(','),
							sisa = split[0].length % 3,
							rupiah3 = split[0].substr(0, sisa),
							ribuan3 = split[0].substr(sisa).match(/\d{3}/gi);

						// tambahkan titik jika yang di input sudah menjadi angka ribuan
						if (ribuan3) {
							separator = sisa ? '.' : '';
							rupiah3 += separator + ribuan3.join('.');
						}

						rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
						return prefix == undefined ? rupiah3 : (rupiah3 ? 'Rp. ' + rupiah3 : '');
					}
				</script>
			</div>
			<div class="col-xs-3">
				Tanggal Bukti
				<input type="date" id="tgl" required name="tgl" placeholder="Tgl Bukti" class="form-control" />
			</div>
			<div class="col-xs-3">
				Nomor Bukti
				<input type="number" id="no_bukti" required name="no_bukti" placeholder="Nomor Bukti" class="form-control" />
			</div>
			<div class="col-xs-1">
				<br>
				<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
					Simpan
				</button>
			</div>
		</div>

		<br>
		<br>
	</form>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data Transaksi Pengeluaran
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Rekening</th>
				<th>Tanggal Bukti</th>
				<th>No Bukti</th>
				<th>Keterangan</th>
				<th>Nilai</th>
				<th>DK</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
			<!-- <?php
					$no = 1;
					foreach ($mytransaksi as $r) {
					?>
			</tr>
				<td><?= $no ?></td>
						<td><?= $r['no_rek'] ?></td>
						<td><?= $r['Tgl_bukti'] ?></td>
						<td><?= $r['No_bukti'] ?></td>
						<td><?= $r['Ket'] ?></td>
						<td><?= $r['Nilai'] ?></td>
						<td><?= $r['DK'] ?></td>
						<td><button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="<=$r['id']">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </button></td>
					</tr>
				<?php
						$no++;
					}
				?> -->


		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#datatable_tabletools').DataTable();
	});

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				jenis: {
					required: true
				},
				dk: {
					required: true
				},
				ket: {
					required: true
				},
				nominal: {
					required: true
				},
				tgl: {
					required: true
				},
				no_bukti: {
					required: true
				},

			},
			messages: {

				jenis: {
					required: "Jenis Transaksi harus dipilih!"
				},
				dk: {
					required: "Debit/Kredit harus dipilih!"
				},
				ket: {
					required: "Keterangan harus diisi!"
				},
				nominal: {
					required: "Nilai harus diisi!"
				},
				tgl: {
					required: "Tanggal harus diisi!"
				},
				no_bukti: {
					required: "Nomor Bukti harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('modulakunting/trx_keluar/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							// $('#modalTambah').modal('hide');
						} else if (response == 401) {
							swalIdDouble('Eror!');
						} else {
							swalInputFailed();
						}
					}
				});
			}
		})
	}

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
					url: "<?php echo base_url('modulakunting/trx_keluar/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})

	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('modulakunting/trx_keluar/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].no_rek + '</td>' +
						'<td>' + data[i].Tgl_bukti + '</td>' +
						'<td>' + data[i].No_bukti + '</td>' +
						'<td>' + data[i].Ket + '</td>' +
						'<td>' + data[i].Nilai + '</td>' +
						'<td>' + data[i].DK + '</td>' +
						'<td>' +
						// '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						// '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						// '</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button>' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#datatable_tabletools").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				// $('#mydata').dataTable();
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