<div class="row">
	<div class="space-6"></div>

	<div class="col-sm-12 infobox-container">
		<div class="infobox infobox-green">
			<div class="infobox-icon ">
				<i class="ace-icon fa fa-users"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number">Siswa</span>
				<div class="infobox-content">Jumlah Siswa</div>
			</div>

			<div class="stat stat-success"><?=$siswa[0]->pengguna?></div>
		</div>

		<div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-eye"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number">Visit</span>
				<div class="infobox-content">Jumlah Pengunjung</div>
			</div>

			
			<div class="stat stat-success"><?=$visit[0]->visit?></div>
		</div>

		<div class="infobox infobox-pink">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-book"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number">Klik</span>
				<div class="infobox-content">Jumlah Klik</div>
			</div>
			<div class="stat stat-success"><?=$click[0]->klik?></div>
		</div>

		<div class="infobox infobox-red">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-credit-card"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number">Guru</span>
				<div class="infobox-content">Jumlah Guru</div>
			</div>

			<div class="stat stat-success"><?=$guru[0]->guru?></div>
		</div>
	</div>

	
	</div><!-- /.col -->
</div><!-- /.row -->

<!-- <div class="hr hr32 hr-dotted"></div> -->

