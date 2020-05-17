<script type="text/javascript">
	try {
		ace.settings.loadState('sidebar')
	} catch (e) {}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<!-- <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<button class="btn btn-success">
			<i class="ace-icon fa fa-signal"></i>
		</button>

		<button class="btn btn-info">
			<i class="ace-icon fa fa-pencil"></i>
		</button>

		<button class="btn btn-warning">
			<i class="ace-icon fa fa-users"></i>
		</button>

		<button class="btn btn-danger">
			<i class="ace-icon fa fa-cogs"></i>
		</button>
	</div>

	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<span class="btn btn-success"></span>

		<span class="btn btn-info"></span>

		<span class="btn btn-warning"></span>

		<span class="btn btn-danger"></span>
	</div> -->
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
	<li class="">
		<a href="<?= base_url().'modulkasir/dashboard'; ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>
		<b class="arrow"></b>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon glyphicon glyphicon-list-alt "></i>
			<span class="menu-text">
				Master
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modulkasir/tarifpembayaran'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tarif Pembayaran
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/jenispembayaran'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Jenis Pembayaran
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-exchange"></i>
			<span class="menu-text">
				Transaksi
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modulkasir/bayarlain'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pembayaran Lain-Lain
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/impbayar'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Import Pembayaran 
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/tunggakan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tunggakan
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/potongan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Potongan
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/tagihanpembayaran'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tagihan Siswa
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/bayarsiswa'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pembayaran Siswa
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa 	fa-book "></i>
			<span class="menu-text">
				Laporan
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modulkasir/lap_bayarsiswa'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pembayaran Siswa
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulkasir/surattagihan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Surat Tagihan
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="<?= base_url() . 'modulkasir/tentang'; ?>">
			<i class="menu-icon  fa fa-bell"></i>
			<span class="menu-text">
				Tentang Aplikasi
			</span>
		</a>
	</li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>