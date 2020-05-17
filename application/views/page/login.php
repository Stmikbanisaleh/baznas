<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page Operator</title>
	<link rel="apple-touch-icon" href="<?php echo base_url() ?>global/images/logo.png">
	<link rel="shortcut icon" href="<?php echo base_url() ?>global/images/logo.png">
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/4.5.0/css/font-awesome.min.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/fonts.googleapis.com.css" />
	<!-- ace styles -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace-rtl.min.css" />
</head>

<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<span class="red">Halaman</span>
								<span class="white" id="id-text2">Operator</span>
							</h1>
							<h4 class="blue" id="id-company-text">&copy; Smart School</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-coffee green"></i>
											Please Enter Your Information
										</h4>

										<div class="space-6"></div>
										<?php if ($this->session->flashdata('category_error')) { ?>
											<div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
										<?php } ?>
										<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() . 'dashboard/login'; ?>">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="email" class="form-control" placeholder="Email" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="password" class="form-control" placeholder="Password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<label class="inline">
														<input type="checkbox" class="ace" />
														<span class="lbl"> Remember Me</span>
													</label>

													<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->

									<div class="toolbar clearfix">
										<div>
											<a href="<?php echo base_url() ?>" data-target="#forgot-box" class="forgot-password-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Menu Utama
											</a>

										</div>
									</div>

								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->

							<div id="forgot-box" class="forgot-box widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header red lighter bigger">
											<i class="ace-icon fa fa-key"></i>
											Retrieve Password
										</h4>

										<div class="space-6"></div>
										<p>
											Enter your email and to receive instructions
										</p>

										<form class="form-horizontal" role="form" id="formSearch">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="email" name="email" id="email" class="form-control" placeholder="Email" />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<div class="clearfix">
													<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
														<i class="ace-icon fa fa-lightbulb-o"></i>
														<span class="bigger-110">Send Me!</span>
													</button>
												</div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->

									<div class="toolbar center">
										<a href="#" data-target="#login-box" class="back-to-login-link">
											Back to login
											<i class="ace-icon fa fa-arrow-right"></i>
										</a>
									</div>
								</div><!-- /.widget-body -->
							</div><!-- /.forgot-box -->
						</div><!-- /.position-relative -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="<?php echo base_url() ?>assets/template/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		if ($("#formSearch").length > 0) {
			$("#formSearch").validate({
				errorClass: "my-error-class",
				validClass: "my-valid-class",
				rules: {
					nopembayaran: {
						required: false
					},

					tahun: {
						required: false
					},
				},
				submitHandler: function(form) {
					$('#btn_search').html('Searching..');
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url('dashboard/lupaspassword') ?>',
						data: $('#formSearch').serialize(),
						async: true,
						dataType: 'json',
						success: function(data) {
							$('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
								'Periksa');
							var html = '';
							var i = 0;
							var no = 1;
							for (i = 0; i < data.length; i++) {
								html += '<tr>' +
									'<td>' + data[i].Noreg + '</td>' +
									'<td>' + data[i].Namacasis + '</td>' +
									'<td>' + data[i].agama + '</td>' +
									'<td>' + data[i].kodesekolah + '-' + data[i].NamaJurusan + '</td>' +
									'<td>' + data[i].Kelas + '</td>' +
									'<td>' + data[i].AlamatRumah + '</td>' +
									'<td>' + data[i].TelpRumah + '</td>' +
									'<td>' + data[i].TelpHp + '</td>' +
									'<td class="text-center">' +
									'<a href="<?= base_url() ?>siswa/tampil_byid?id=' + data[i].Noreg + '" class="btn btn-xs btn-info" title="Edit">' +
									'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
									'</a> &nbsp' +
									'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].Noreg + '">' +
									'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
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
			})
		}

		jQuery(function($) {
			$(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible'); //hide others
				$(target).addClass('visible'); //show target
			});
		});



		//you don't need this, just used for changing background
		jQuery(function($) {
			$('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			});
			$('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			});
			$('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');

				e.preventDefault();
			});

		});
	</script>
</body>

</html>