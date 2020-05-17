<!-- basic scripts -->

<!--[if !IE]> -->

<!-- <![endif]-->

<script src="<?= base_url() ?>assets/template/js/jquery-1.11.3.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/template/js/jquery-2.1.4.min.js"></script> -->
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script> -->

<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url() ?>assets/template/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?= base_url() ?>assets/template/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?= base_url() ?>assets/template/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?= base_url() ?>assets/template/js/jquery-ui.custom.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.easypiechart.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.sparkline.index.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.flot.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.flot.pie.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.flot.resize.min.js"></script>
<!-- ace scripts -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/template/js/ace-elements.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/ace.min.js"></script>

<!-- Sweet alert2 -->
<script src="<?= base_url() ?>assets/template/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>


<script type="text/javascript">
	function swalInputSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Tambah Data Berhasil',
		});
	}

	function swalInputFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Tambah Data gagal!',
		});
	}

	function swalEditSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Ubah Data Berhasil',
		});
	}

	function swalEditFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Ubah Data gagal!',
		});
	}

	function swalIdDouble(message){
		Swal.fire({
		  icon: 'error',
		  title: 'Data Duplicate',
		  text: message,
		});
	}

	function swalKosong(message){
		Swal.fire({
		  icon: 'success',
		  title: 'Tidak ada data yang di proses',
		  text: message,
		});
	}

	function swalDeleteSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Hapus Data Berhasil',
		});
	}


</script>

<!-- inline scripts related to this page -->