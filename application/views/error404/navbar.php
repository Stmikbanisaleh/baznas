<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
	<span class="sr-only">Toggle sidebar</span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>
</button>

<div class="navbar-header pull-left">
	<a href="<?php echo base_url() ?>" class="navbar-brand">
		<small>
			<i class="fa fa-leaf"></i>
			Operator
		</small>
	</a>
</div>

<div class="navbar-buttons navbar-header pull-right" role="navigation">
	<ul class="nav ace-nav">
		<li class="light-blue dropdown-modal">
			<a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle">
				<?php $result = $this->db->query("select gambar from tbpengawas where username ='" . $this->session->userdata('username') . "'")->result_array(); ?>
				<!-- <img class="nav-user-photo" src="<?= base_url() ?>assets/gambar/?>" /> -->
				<span class="user-info">
					<small>Selamat datang,</small>
					<!-- <?php echo $this->session->userdata('nama'); ?> -->
				</span>

				<i class="ace-icon fa fa-caret-down"></i>
			</a>

			<!-- <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				<li>
					<a href="<?php echo base_url() . 'setting/index'; ?>">
						<i class="ace-icon fa fa-cog"></i>
						Password
					</a>
				</li>

				<li>
					<a href="<?php echo base_url() . 'profile/index'; ?>">
						<i class="ace-icon fa fa-user"></i>
						Profile
					</a>
				</li>

				<li class="divider"></li>

				<li>
					<a href="<?= base_url() . 'dashboard/logout'; ?>">
						<i class="ace-icon fa fa-power-off"></i>
						Logout
					</a>
				</li>
			</ul> -->
		</li>
	</ul>
</div>