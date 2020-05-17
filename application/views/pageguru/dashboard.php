<div class="row">
	<div class="col-sm-6 widget-container-col" id="widget-container-col-12">
		<div class="widget-box transparent" id="widget-box-12">
			<div class="widget-header">
			<?php foreach ($myvisimisi as $value) { ?>
                            <h4 class="widget-title lighter"><?= $value['title'] ?></h4>
                        <?php } ?>
					<!-- <div class="widget-toolbar no-border">
						<a href="#" data-action="settings">
							<i class="ace-icon fa fa-cog"></i>
						</a>

						<a href="#" data-action="reload">
							<i class="ace-icon fa fa-refresh"></i>
						</a>

						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>

						<a href="#" data-action="close">
							<i class="ace-icon fa fa-times"></i>
						</a>
					</div> -->
				</div>

				<div class="widget-body">
				<?php foreach ($myvisimisi as $value) { ?>
							<div class="widget-main padding-6 no-padding-left no-padding-right"><?= $value['description'] ?>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
	<div class="col-sm-6 widget-container-col" id="widget-container-col-13">
		<div class="widget-box transparent" id="widget-box-13">
			<div class="widget-header">
			<?php foreach ($mymisi as $value) { ?>
                            <h4 class="widget-title lighter"><?= $value['title'] ?></h4>
                        <?php } ?>
					<!-- <div class="widget-toolbar no-border">
						<a href="#" data-action="settings">
							<i class="ace-icon fa fa-cog"></i>
						</a>

						<a href="#" data-action="reload">
							<i class="ace-icon fa fa-refresh"></i>
						</a>

						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>

						<a href="#" data-action="close">
							<i class="ace-icon fa fa-times"></i>
						</a>
					</div> -->
				</div>

				<div class="widget-body">
				<?php foreach ($mymisi as $value) { ?>
							<div class="widget-main padding-6 no-padding-left no-padding-right"><?= $value['description'] ?>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>