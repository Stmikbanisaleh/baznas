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
		<a href="<?= base_url().'modulakunting/dashboard'; ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>
		<b class="arrow"></b>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa  glyphicon-plus "></i>
			<span class="menu-text">
				Master
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modulakunting/pengeluaran'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Jenis Pengeluaran
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/rekening'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Rekening 
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/pemasukan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Jenis Pemasukan
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/parameter'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Parameter
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
				<a href="<?= base_url() . 'modulakunting/buk'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					BUK
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/trx_keluar'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Transaksi Pengeluaran 
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/trx_jurnal'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Transaksi Jurnal
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
				<a href="<?= base_url() . 'modulakunting/laba_rugi'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Laporan Laba Rugi
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/neraca'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Laporan Neraca 
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/lap_bukubesar'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Laporan Buku Besar
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/rekap_bukubesar'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Rekapitulasi Buku Besar
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulakunting/pendapatan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Penerimaan Pendapatan
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="<?= base_url() . 'modulakunting/tentang'; ?>">
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