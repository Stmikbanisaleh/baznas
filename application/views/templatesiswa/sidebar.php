<script type="text/javascript">
	try {
		ace.settings.loadState('sidebar')
	} catch (e) {}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
	<li class="">
		<a href="<?= base_url().'modulsiswa/dashboard'; ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon glyphicon glyphicon-th-list"></i>
			<span class="menu-text">
				Master
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>
		<?php
			$menu = $this->db->query("select * from sys_menu where pengguna = 'SISWA' and blokir = 'T' and jenis = 1 ")->result_array();
			foreach ($menu as $value) {
		?>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modulsiswa/'.$value['ALAMAT']; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					<?= $value['NAMA'] ?>
				</a>
			</li>
		</ul>
		<?php
			}
		?>	
	</li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>