<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
	<span class="sr-only">Toggle sidebar</span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>

	<span class="icon-bar"></span>
</button>

<div class="navbar-header pull-left">
	<a href="<?= base_url() . 'modulsiswa/dashboard'; ?>" class="navbar-brand">
		<small>
			<img src="<?php echo base_url() ?>global/images/group.png" width="32" height="32" /></div>
Siswa
</small>
</a>
</div>

<div class="navbar-buttons navbar-header pull-right" role="navigation">
	<ul class="nav ace-nav">
		<li class="light-blue dropdown-modal">
			<a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle">
				<img class="nav-user-photo" src="<?= base_url() ?>assets/image/avatars/avatar2.png" alt="Jason's Photo" />
				<span class="user-info">
					<small>Selamat datang,</small>
					<?php echo $this->session->userdata('username_siswa'); ?>
				</span>

				<i class="ace-icon fa fa-caret-down"></i>
			</a>

			<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				<li>
					<a href="<?= base_url() . 'modulsiswa/setting'; ?>">
						<i class="ace-icon fa fa-cog"></i>
						Settings
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'modulsiswa/profile'; ?>">
						<i class="ace-icon fa fa-user"></i>
						Profile
					</a>
				</li>

				<li class="divider"></li>

				<li>
					<a href="<?= base_url() . 'modulsiswa/dashboard/logout'; ?>">
						<i class="ace-icon fa fa-power-off"></i>
						Logout
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>