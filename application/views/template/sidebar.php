<script type="text/javascript">
	try {
		ace.settings.loadState('sidebar')
	} catch (e) {}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">

</div><!-- /.sidebar-shortcuts -->
<?php
$jabatan = $this->session->userdata('jabatan');
if ($jabatan == 19) { ?>
	<ul class="nav nav-list">
		<li class="">
			<a href="<?= base_url(); ?>dashboard">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<!-- Menu Selain PSB -->
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-user"></i>
				<span class="menu-text">
					Penerimaan Siswa Baru
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'pengambilanformulir'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pengambilan Formulir
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'pengembalianformulir'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pengembalian Formulir
					</a>
				</li>
			</ul>
		</li>

	</ul>
<?php } else { ?>
	<ul class="nav nav-list">
		<li class="">
			<a href="<?= base_url(); ?>dashboard">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<!-- Menu Selain PSB -->
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-cogs"></i>
				<span class="menu-text">
					Setting
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?= base_url() . 'biodata'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Biodata sekolah
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'ruangan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Ruangan
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'jabatan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Jabatan
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= base_url() . 'tahun_akad1'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Tahun Keuangan
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= base_url() . 'tahun_akad2'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Tahun Akademik
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'tahun_akad3'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Tahun PSB
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'prog_sekolah'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Program Sekolah
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'menu'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Menu
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'aktivasiakun'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Aktivasi Akun
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-user"></i>
				<span class="menu-text">
					Data Master
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?= base_url() . 'mssiswa'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Siswa
					</a>
				</li>


				<li class="">
					<a href="<?= base_url() . 'guru'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Biodata Guru
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'karyawan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Karyawan
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'jeniskelas'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Jenis Kelas
					</a>
				</li>

			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-user"></i>
				<span class="menu-text">
					Penerimaan Siswa Baru
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?= base_url() . 'siswa'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Biodata Siswa
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'pengambilanformulir'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pengambilan Formulir
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'pengembalianformulir'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pengembalian Formulir
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'pembuatannis'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pembuatan NIS
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'penentuankelas'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Penentuan Kelas
					</a>
				</li>


			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-pencil"></i>
				<span class="menu-text">
					Nilai
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?= base_url() . 'permataajar'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Per Mataajar
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'penghapusannilai'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Penghapusan Nilai
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text">
					Jadwal
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?= base_url() . 'jadwal'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Jadwal
					</a>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text">
					Kurikulum
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?= base_url() . 'kurikulum'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Kurikulum
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= base_url() . 'mataajaraktif'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Mata Ajar Aktif
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-users "></i>
				<span class="menu-text">
					Lulusan
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'kelulusan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Kelulusan Siswa
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
	</ul>
<?php } ?>
<!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>