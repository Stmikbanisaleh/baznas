<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
	<span class="sr-only">Toggle sidebar</span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>
</button>

<div class="navbar-header pull-left">
	<a href="<?= base_url() . 'modulkasir/dashboard'; ?>" class="navbar-brand">
		<small>
		<img src="<?php echo base_url() ?>global/images/kasir.png" width="32" height="32"/></div>
			Kasir
		</small>
	</a>
</div>

<div class="navbar-buttons navbar-header pull-right" role="navigation">
	<ul class="nav ace-nav">
		<li class="light-blue dropdown-modal">
			<a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle">
				<?php $result = $this->db->query("select gambar from tbpengawas where nip ='" . $this->session->userdata('kodekaryawan') . "'")->row(); ?>
				<!-- <img class="nav-user-photo" src="<?= base_url() ?>assets/gambar/<?php echo $result->gambar; ?>" /> -->
				<span class="user-info">
					<small>Selamat Datang,</small>
					<?php echo $this->session->userdata('nama'); ?>
				</span>

				<i class="ace-icon fa fa-caret-down"></i>
			</a>

			<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				<li class="">
					<a href="<?= base_url() . 'modulkasir/profile'; ?>">
						<i class="ace-icon fa fa-user"></i>
						Profile
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'modulkasir/pengumuman'; ?>">
						<i class="ace-icon fa fa-user"></i>
						Pengumuman
					</a>
				</li>
				<li class="divider"></li>

				<li>
					<a href="<?= base_url() . 'modulkasir/dashboard/logout'; ?>">
						<i class="ace-icon fa fa-power-off"></i>
						Logout
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>