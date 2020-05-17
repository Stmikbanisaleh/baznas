<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$this->load->view('templateakunting/head');
	?>
	<?php
	$this->load->view('templateakunting/js-main');
	?>
</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default          ace-save-state navbar-fixed-top">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<?php
			$this->load->view('templateakunting/navbar');
			?>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>

		<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
			<?php
			$this->load->view('templateakunting/sidebar');
			?>
		</div>

		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="<?= base_url(); ?>">Home</a>
						</li>
						<?= $ribbon; ?>
					</ul><!-- /.breadcrumb -->

					<!-- <div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div> -->
					<!-- /.nav-search -->
				</div>

				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<!-- <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div> -->
						<!-- <div class="alert alert-info" style="height: 40px; padding: 7px; margin: 5px; margin-top: 0px">
								<button type="button" class="close" data-dismiss="alert">
									<i class="ace-icon fa fa-times"></i>
								</button>

								<strong>
									Success
								</strong>

								Input data master employee &nbsp
								<br />
							</div> -->
					</div><!-- /.ace-settings-container -->

					<div class="page-header">
						<h1>
							<?= $page_name; ?>
						</h1>
					</div><!-- /.page-header -->

					<div class="row">
						<div class="col-xs-12">

							<?php
							$this->load->view('page/' . $page_content);
							?>

							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		<div class="footer">
			<?php
			$this->load->view('templateakunting/footer');
			?>
		</div>

		<a href="javascript:void(0);" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->


</body>

</html>