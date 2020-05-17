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
		<a href="<?= base_url().'modultu/dashboard'; ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>
		<b class="arrow"></b>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa glyphicon-plus"></i>
			<span class="menu-text">
				Master
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modultu/tahunajaran'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tahun Ajaran
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/tahunkeuangan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tahun Keuangan 
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/jenisbayar'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Jenis Pembayaran
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/tarifbayar'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tarif Pembayaran
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/aktifakun'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Aktivasi Akun
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/tagihan'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Tagihan Pembayaran
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/jeniskelas'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Jenis Kelas
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa 	fa-exchange "></i>
			<span class="menu-text">
				Transaksi
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modultu/ambilformulir'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pengambilan Formulir
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/kembaliformulir'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pengembalian Formulir 
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/biodatasiswa'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Biodata Siswa
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/buatnis'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pembuatan NIS
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/kelas'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Penentuan Kelas
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/imp_kelas'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Import Penentuan Kelas
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modultu/siswalulus'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pernyataan Lulus Siswa
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="<?= base_url() . 'modultu/tentang'; ?>">
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