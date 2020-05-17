<div class="row">
	<div class="space-6"></div>
	<div class="col-sm-5 infobox-container">
		<div class="infobox infobox-green">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'guru/index'; ?>"><?php $guru = $this->db->query('select count(id) as total from tbguru where isdeleted != 1')->result_array();
																										echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'guru/index'; ?>">Jumlah Guru</a></div>
			</div>
		</div>

		<div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'siswa/index'; ?>"><?php $guru = $this->db->query('select count(id) as total from mssiswa where isdeleted != 1')->result_array();
																										echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'siswa/index'; ?>">Jumlah Siswa</a></div>
			</div>
		</div>

		<div class="infobox infobox-pink">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'karyawan/index'; ?>"><?php $guru = $this->db->query('select count(id_pengawas) as total from tbpengawas where isdeleted != 1')->result_array();
																											echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'karyawan/index'; ?>">Jumlah Karyawan</a></div>
			</div>
		</div>
		<div class="infobox infobox-red">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'kelulusan/index'; ?>"><?php $guru = $this->db->query('select count(IDRKP) as total from rkpaktvsiswa where isdeleted != 1')->result_array();
																											echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'kelulusan/index'; ?>">Jumlah Lulusan</a></div>
			</div>
		</div>

		<div class="infobox infobox-orange2">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-calendar"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'jadwal/index'; ?>"><?php $guru = $this->db->query('select count(id) as total from tbjadwal where isdeleted != 1')->result_array();
																										echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'jadwal/index'; ?>">Jumlah Jadwal Aktif</a></div>
			</div>
		</div>

		<div class="infobox infobox-brown">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-book"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'kurikulum/index'; ?>"><?php $guru = $this->db->query('select count(id_krs) as total from tbkrs where isdeleted != 1')->result_array();
																											echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'kurikulum/index'; ?>">Jumlah Kurikulum</a></div>
			</div>
		</div>
		<div class="infobox infobox-blue2">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-book"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'mataajaraktif/index'; ?>"><?php $guru = $this->db->query('select count(ID) as total from trmka where isdeleted != 1')->result_array();
																												echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'mataajaraktif/index'; ?>">Jumlah Mata ajar Aktif</a></div>
			</div>
		</div>
		<div class="infobox infobox-blue2">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-home"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'ruangan/index'; ?>"><?php $guru = $this->db->query('select count(ID) as total from msruang where isdeleted != 1')->result_array();
																										echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'ruangan/index'; ?>">Jumlah Ruangan</a></div>
			</div>
		</div>
		<div class="infobox infobox-blue2">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-calendar"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'jadwal/index'; ?>"><?php $guru = $this->db->query('select count(id) as total from tbjadwal where isdeleted != 1')->result_array();
																										echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'jadwal/index'; ?>">Jumlah Jadwal Aktif</a></div>
			</div>
		</div>
		<div class="infobox infobox-blue2">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-calendar"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><a href="<?php echo base_url() . 'jadwal/index'; ?>"><?php $guru = $this->db->query('select count(id) as total from tbjadwal where isdeleted != 1')->result_array();
																										echo $guru[0]['total']; ?></a></span>
				<div class="infobox-content"><a href="<?php echo base_url() . 'jadwal/index'; ?>">Jumlah Jadwal Aktif</a></div>
			</div>
		</div>
	</div>
	<div class="col-sm-7 infobox-container">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Tahun Akademik
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="piechart-placeholder"></div>

					<div class="hr hr8 hr-double"></div>

					<div class="clearfix">

					<div class="grid2">
							<div class="infobox infobox-red">
								<div class="infobox-chart">
									<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
								</div>
								<div class="infobox-data">
									<span class="infobox-data-number"><a href="<?php echo base_url() . 'tahun_akad1/index'; ?>"><?php $guru = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 01 or PS = 02 or PS = 03 or PS = 04
									 or PS = 05 or PS = 06 or PS = 07 or PS = 08 or PS = 09
									 or PS = 10 or PS = 11 or PS = 12
									 or PS = 13 or PS = 14 or PS = 15
									 or PS = 16 or PS = 17'
									 )->result_array();
																															echo $guru[0]['total']; ?></a></span>
									<div class="infobox-content"><a href="<?php echo base_url() . 'tahun_akad1/index'; ?>">TK</a></div>
								</div>
							</div>
						</div>

						<div class="grid2">
							<div class="infobox infobox-green">
								<div class="infobox-chart">
									<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
								</div>
								<div class="infobox-data">
									<span class="infobox-data-number"><a href="<?php echo base_url() . 'tahun_akad1/index'; ?>"><?php $guru = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 18 or PS = 19 or PS = 20')->result_array();
																															echo $guru[0]['total']; ?></a></span>
									<div class="infobox-content"><a href="<?php echo base_url() . 'tahun_akad1/index'; ?>">SD</a></div>
								</div>
							</div>
						</div>

						<div class="grid2">
							<div class="infobox infobox-blue">
								<div class="infobox-chart">
									<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
								</div>
								<div class="infobox-data">
									<span class="infobox-data-number"><a href="<?php echo base_url() . 'tahun_akad2/index'; ?>"><?php $guru = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 21')->result_array();
																															echo $guru[0]['total']; ?></a></span>
									<div class="infobox-content"><a href="<?php echo base_url() . 'tahun_akad2/index'; ?>">SMP</a></div>
								</div>
							</div>
						</div>

						<div class="grid2">
							<div class="infobox infobox-purple">
								<div class="infobox-chart">
									<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
								</div>
								<div class="infobox-data">
									<span class="infobox-data-number"><a href="<?php echo base_url() . 'tahun_akad3/index'; ?>"><?php $guru = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 22 or PS = 23')->result_array();
																															echo $guru[0]['total']; ?></a></span>
									<div class="infobox-content"><a href="<?php echo base_url() . 'tahun_akad3/index'; ?>">SMA</a></div>
								</div>
							</div>
						</div>

						<div class="grid2">
							<div class="infobox infobox-pink">
								<div class="infobox-chart">
									<span class="sparkline" data-values="196,111,111,177,154,94,111,111,111"></span>
								</div>
								<div class="infobox-data">
									<span class="infobox-data-number"><a href="<?php echo base_url() . 'tahun_akad1/index'; ?>"><?php $guru = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 26 or PS = 27')->result_array();
																															echo $guru[0]['total']; ?></a></span>
									<div class="infobox-content"><a href="<?php echo base_url() . 'tahun_akad1/index'; ?>">QUBA</a></div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
</div><!-- /.row -->
<script type="text/javascript">
	jQuery(function($) {
		$('.easy-pie-chart.percentage').each(function() {
			var $box = $(this).closest('.infobox');
			var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
			var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
			var size = parseInt($(this).data('size')) || 50;
			$(this).easyPieChart({
				barColor: barColor,
				trackColor: trackColor,
				scaleColor: false,
				lineCap: 'butt',
				lineWidth: parseInt(size / 10),
				animate: ace.vars['old_ie'] ? false : 1000,
				size: size
			});
		})

		$('.sparkline').each(function() {
			var $box = $(this).closest('.infobox');
			var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
			$(this).sparkline('html', {
				tagValuesAttribute: 'data-values',
				type: 'bar',
				barColor: barColor,
				chartRangeMin: $(this).data('min') || 0
			});
		});


		//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
		//but sometimes it brings up errors with normal resize event handlers
		$.resize.throttleWindow = false;

		var placeholder = $('#piechart-placeholder').css({
			'width': '90%',
			'min-height': '150px'
		});
		var data = [{
				label: "TK",
				data: <?php $tbakadmk = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 01 or PS = 02 or PS = 03 or PS = 04
									 or PS = 05 or PS = 06 or PS = 07 or PS = 08 or PS = 09
									 or PS = 10 or PS = 11 or PS = 12
									 or PS = 13 or PS = 14 or PS = 15
									 or PS = 16 or PS = 17')->result_array();
						echo $tbakadmk[0]['total']; ?>,
				color: "red"
			},
			{
				label: "SD",
				data: <?php $tbakadmk2 = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 18 or PS = 19 or PS = 20')->result_array();
						echo $tbakadmk2[0]['total']; ?>,
				color: "green"
			},
			{
				label: "SMP",
				data: <?php $tbakadmk3 = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 21')->result_array();
						echo $tbakadmk3[0]['total']; ?>,
				color: "blue"
			},
			{
				label: "SMA",
				data: <?php $tbakadmk3 = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 22 or PS = 23')->result_array();
						echo $tbakadmk3[0]['total']; ?>,
				color: "purple"
			},
			{
				label: "QUBA",
				data: <?php $tbakadmk3 = $this->db->query('select count(NMSISWA) as total from mssiswa where PS = 26 or PS = 27')->result_array();
						echo $tbakadmk3[0]['total']; ?>,
				color: "pink"
			},
		]

		function drawPieChart(placeholder, data, position) {
			$.plot(placeholder, data, {
				series: {
					pie: {
						show: true,
						tilt: 1,
						highlight: {
							opacity: 0.25
						},
						stroke: {
							color: '#fff',
							width: 3
						},
						startAngle: 3
					}
				},
				legend: {
					show: true,
					position: position || "ne",
					labelBoxBorderColor: null,
					margin: [-30, 15]
				},
				grid: {
					hoverable: true,
					clickable: true
				}
			})
		}
		drawPieChart(placeholder, data);

		/**
		we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
		so that's not needed actually.
		*/
		placeholder.data('chart', data);
		placeholder.data('draw', drawPieChart);


		//pie chart tooltip example
		var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
		var previousPoint = null;

		placeholder.on('plothover', function(event, pos, item) {
			if (item) {
				if (previousPoint != item.seriesIndex) {
					previousPoint = item.seriesIndex;
					var tip = item.series['label'] + " : " + item.series['percent'] + '%';
					$tooltip.show().children(0).text(tip);
				}
				$tooltip.css({
					top: pos.pageY + 10,
					left: pos.pageX + 10
				});
			} else {
				$tooltip.hide();
				previousPoint = null;
			}

		});

	})
</script>