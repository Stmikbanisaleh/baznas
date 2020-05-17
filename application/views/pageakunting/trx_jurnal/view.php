<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a> Generate
		</button>
	</div>
</div>
<br>
<div class="row">
	<form class="form-horizontal" role="form" id="formSearch">
		<div class="col-xs-3">
			<select class="form-control tahun" name="tahun" id="tahun">
				<option value="0">--Pilih Tahun--</option>
				<?php foreach ($mytahun as $value) { ?>
					<option value=<?= $value['tahun'] ?>><?= $value['tahun'] ?></option>
				<?php } ?>
			</select>
		</div>
		<td>
			<div class="col-xs-3">
				<select class="form-control" name="nopembayaran" id="nopembayaran">
					<option value="0">--Pilih Program--</option>
				</select>
			</div>
			<div class="col-xs-1">
				<button type="submit" id="btn_search" name="btn_search" class="btn btn-sm btn-success pull-left">
					<a class="ace-icon fa fa-search bigger-120"></a>Periksa
				</button>
			</div>
			<br>
			<br>
	</form>
</div>

<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Generate Jurnal</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formTambah">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode Awal </label>
								<div class="col-sm-6">
									<input type="date" id="periode_awal" required name="periode_awal" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode Akhir </label>
								<div class="col-sm-6">
									<input type="date" id="periode_akhir" required name="periode_akhir" class="form-control" />
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Proses
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
<br>
<div class="row">
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped  w-full" cellspacing="0">
			<thead>
				<tr>
					<th>Kode Rekening</th>
					<th>Nama Rekening</th>
					<th>Uraian</th>
					<th>D/K</th>
					<th>Nilai</th>
				</tr>
			</thead>
			<?php
			if ($this->input->get('tahun')) { ?>
				<tbody id="show_data">
					<tr>
						<?php $jurnal = $this->db->query("SELECT
					jurnal.kode_jurnal,
					jurnal.nama_jurnal,
					parameter.id
					FROM
					parameter 
					INNER JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal where parameter.isdeleted != 1")->result_array();
						?>
						<?php
						foreach ($jurnal as $data) { ?>
							<td><?= $data['kode_jurnal'] ?></td>
							<td><?= $data['nama_jurnal'] ?></td>
						<?php
						}
						?>
						<?php
						$bukti = $this->input->get('nopembayaran');
						$uraiain = $this->db->query("SELECT * FROM detail_akuntansi WHERE no_akuntansi='$bukti' AND dk='D'")->result_array();
						?>
						<?php
						$no = 1;
						if (!empty($uraiain)) {
							foreach ($uraiain as $val) { ?>
								<td><input type="text" value="<?= $val['urai'] ?>" id="urai1" name="urai1" placeholder="uraian" class="form-control" /></td>
							<?php
							}
							?>
						<?php } else { ?>
							<td><input type="text" id="urai1" name="urai1" placeholder="uraian" class="form-control" /></td>
						<?php } ?>
						<td>D (Debet)</td>
						<?php
						$nilai = $this->db->query("SELECT 
						pembayaran_sekolah.Nopembayaran,
						pembayaran_sekolah.NIS,
						pembayaran_sekolah.Noreg,
						pembayaran_sekolah.Kelas,
						pembayaran_sekolah.tglentri,
						pembayaran_sekolah.useridd,
						pembayaran_sekolah.TotalBayar,
						pembayaran_sekolah.kodesekolah,
						pembayaran_sekolah.TA
						FROM pembayaran_sekolah WHERE Nopembayaran='$bukti'")->result_array();
						foreach ($nilai as $nilaival) {
						?>
							<td><input type="text" id="nilai" readonly value="<?= $nilaival['TotalBayar'] ?>" name="nilai" placeholder="nilai" class="form-control" /></td>
						<?php } ?>
					</tr>
					<tr>
						<?php
						$datanil2 = $this->db->query("SELECT
							jurnal.kode_jurnal,
							jurnal.nama_jurnal,
							(SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.JR AND z.`STATUS`=7) AS JR,
							(SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.type AND z.`STATUS`=8) AS type,
							jenispembayaran.Kodejnsbayar,
							jenispembayaran.namajenisbayar,
							detail_bayar_sekolah.nominalbayar,
							pembayaran_sekolah.tglentri,
							pembayaran_sekolah.NIS,
							pembayaran_sekolah.Noreg,
							tbps.DESCRTBPS,
							tbps.KDTBPS,
							tbjs.DESCRTBJS,
							pembayaran_sekolah.Nopembayaran,
							detail_bayar_sekolah.NodetailBayar,
							mssiswa.NMSISWA
							FROM
							pembayaran_sekolah
							INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
							INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
							INNER JOIN jurnal ON jenispembayaran.no_jurnal = jurnal.no_jurnal
							INNER JOIN tbps ON pembayaran_sekolah.kodesekolah = tbps.KDTBPS
							INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS
							INNER JOIN mssiswa ON pembayaran_sekolah.Noreg = mssiswa.Noreg 
							WHERE pembayaran_sekolah.Nopembayaran='$bukti'
							ORDER BY pembayaran_sekolah.Nopembayaran")->result_array();
						foreach ($datanil2 as $value) {
						?>
							<td>
								<?= $value['kode_jurnal'] ?>
							</td>
						<?php
						}
						?>

						<?php
						$datanya = $this->db->query("SELECT
							jurnal.kode_jurnal,
							jurnal.nama_jurnal,
							(SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.JR AND z.`STATUS`=7) AS JR,
							(SELECT z.NAMA_REV FROM msrev z WHERE z.KETERANGAN=jurnal.type AND z.`STATUS`=8) AS type,
							jenispembayaran.Kodejnsbayar,
							jenispembayaran.namajenisbayar,
							detail_bayar_sekolah.nominalbayar,
							pembayaran_sekolah.tglentri,
							pembayaran_sekolah.NIS,
							pembayaran_sekolah.Noreg,
							tbps.DESCRTBPS,
							tbps.KDTBPS,
							tbjs.DESCRTBJS,
							pembayaran_sekolah.Nopembayaran,
							detail_bayar_sekolah.NodetailBayar,
							mssiswa.NMSISWA
							FROM
							pembayaran_sekolah
							INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
							INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
							INNER JOIN jurnal ON jenispembayaran.no_jurnal = jurnal.no_jurnal
							INNER JOIN tbps ON pembayaran_sekolah.kodesekolah = tbps.KDTBPS
							INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS
							INNER JOIN mssiswa ON pembayaran_sekolah.Noreg = mssiswa.Noreg
							WHERE pembayaran_sekolah.Nopembayaran='$bukti'
							ORDER BY pembayaran_sekolah.Nopembayaran")->result_array();
				
						foreach ($datanya as $val) {
						?>
							<td>
								<?= $val['nama_jurnal'] ?>
							</td>
						<?php
						}
						?>
						<?php
						$data3 = $this->db->query("SELECT DISTINCT * FROM detail_akuntansi WHERE no_akuntansi='$bukti' AND dk='K'")->result_array();
						if (!empty($data3)) {
							foreach ($data3 as $datanya) {
						?>
								<td><input type="text" id="urai2" value="<?= $datanya['urai'] ?>" name="urai2" placeholder="uraian" class="form-control" /></td>
							<?php } ?>
						<?php } else { ?>
							<td><input type="text" id="urai2" name="urai2" placeholder="uraian" class="form-control" /></td>
						<?php } ?>
						<td>K (Kredit)</td>
						<?php
						$data4 = $this->db->query("SELECT 
						pembayaran_sekolah.Nopembayaran,
						pembayaran_sekolah.NIS,
						pembayaran_sekolah.Noreg,
						pembayaran_sekolah.Kelas,
						pembayaran_sekolah.tglentri,
						pembayaran_sekolah.useridd,
						pembayaran_sekolah.TotalBayar,
						pembayaran_sekolah.kodesekolah,
						pembayaran_sekolah.TA
						FROM pembayaran_sekolah WHERE Nopembayaran='$bukti'")->result_array();
						foreach ($data4 as $datanya) {
						?>
							<td><input type="number" id="nilai2" value="<?= $datanya['TotalBayar'] ?>" required readonly name="nilai2" placeholder="Nilai" class="form-control" /></td>
						<?php } ?>
					</tr>
					<tr>
						<?php $data5 = $this->db->query("SELECT
							jurnal.kode_jurnal,
							jurnal.nama_jurnal,
							parameter.id
							FROM
							parameter 
					INNER JOIN jurnal ON parameter.no_jurnal = jurnal.no_jurnal where parameter.isdeleted != 1")->result_array();
						$no = 1;
						foreach ($data5 as $val) { ?>
							<td><input name="kod" id="kod" type="hidden" value="<?= $val['kode_jurnal'] ?>"></td>
						<?php } ?>
						<?php $data6 = $this->db->query("SELECT 
							pembayaran_sekolah.Nopembayaran,
							pembayaran_sekolah.NIS,
							pembayaran_sekolah.Noreg,
							pembayaran_sekolah.Kelas,
							pembayaran_sekolah.tglentri,
							pembayaran_sekolah.useridd,
							pembayaran_sekolah.TotalBayar,
							pembayaran_sekolah.kodesekolah,
							pembayaran_sekolah.TA
							FROM pembayaran_sekolah WHERE Nopembayaran='$bukti'")->result_array();
						foreach ($data6 as $data) { ?>
							<td><input name="nopem" id="nopem" type="hidden" value="<?= $data['Nopembayaran'] ?>"></td>
						<?php } ?>
						<td></td>
						<td></td>
						<?php
						$status = $this->db->query("SELECT COUNT(*)AS n,urai FROM akuntansi WHERE bukti='$bukti'")->result_array();
						if ($status[0]['n'] == 1) { ?>
							<td style="text-align: right">
								<input name="kdo" id="kdo" type="hidden" value="2">
								<button class="btn btn-xs btn-danger" id="simpan1" title="">
									Batal
								</button>
								<div id="tampilkandatanya1">
							</td>
						<?php } else { ?>
							<td style="text-align: right">
								<input name="kdo" id="kdo" type="hidden" value="1">
								<button class="btn btn-xs btn-success" id="simpan1" title="">
									Simpan
								</button>
								<div id="tampilkandatanya1">
							</td>
						<?php } ?>
					</tr>
				</tbody>
		</table>
	</div>
</div>
<?php
			}
?>
<script type="text/javascript">
	$(document).ready(function() {
		// show_data();
		$('#datatable_tabletools').DataTable();
		$("#tahun").change(function() {
			var tahun = $('#tahun').val();
			$.ajax({
				type: "POST",
				url: "trx_jurnal/show_nopem",
				data: {
					tahun: tahun
				}
			}).done(function(data) {
				$("#nopembayaran").html(data);
			});
		});

		$("#simpan1").click(function() {
			var nopem = $("#nopem").val();
			var uraian = $("#urai1").val();
			var uraian_2 = $("#urai2").val();
			var nilai = $("#nilai").val();
			var nilai_2 = $("#nilai2").val();
			var kdo = $("#kdo").val();
			var kod = $("#kod").val();
			$("#simpan1").hide();
			$.ajax({
				type: "POST",
				url: '<?php echo site_url('modulakunting/trx_jurnal/simpanjurnal') ?>',
				data: "nopem=" + nopem + "&nilai=" + nilai + "&kdo=" + kdo + "&kod=" + kod + "&nilai_2=" + nilai_2 + "&uraian=" + uraian + "&uraian_2=" + uraian_2,
				cache: false,
				success: function(data) {
					$("#simpan1").hide();
					$("#tampilkandatanya1").html(data);
				}
			});
			return false;
		});

	});

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				periode_awal: {
					required: true,
				},
				periode_akhir: {
					required: true,
				},
			},
			messages: {
				periode_awal: {
					required: "Periode awal harus diisi!",
				},
				periode_akhir: {
					required: "Periode akhir harus diisi!",
				},
			},
			submitHandler: function(form) {
				Swal.fire({
					title: 'Apakah anda yakin?',
					text: "Transaksi tidak dapat dibatalkan setelah di proses!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Proses!',
					cancelButtonText: 'Batal'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							type: "POST",
							url: "<?php echo base_url('modulakunting/trx_jurnal/proses') ?>",
							async: true,
							dataType: "JSON",
							data: $('#formTambah').serialize(),
							success: function(data) {
								$('#my-modal').modal('hide');
								if(data == true){
									swalInputSuccess();
									document.getElementById("formTambah").reset();
								}else if(data == 401){
									document.getElementById("formTambah").reset();
									swalKosong();
								}else{
									document.getElementById("formTambah").reset();
									swalInputFailed();
								}
							}
						});
					}
				})
				return false;
			}
		});
	}
</script>