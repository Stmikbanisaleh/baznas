<body class="no-skin">
	<div class="main-content">
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="hr dotted"></div>
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<?php $result = $this->db->query("select * from tbpengawas where username ='" . $this->session->userdata('username') . "'")->result_array(); ?>
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url(); ?>assets/gambar/<?php echo $result[0]['gambar']; ?>" />
									</span>
									<div class="space-4"></div>
									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
												<span class="white"><?php echo $this->session->userdata('nama'); ?></span>
											</a>
										</div>
									</div>
								</div>

								<div class="space-6"></div>

								<div class="hr hr12 dotted"></div>



								<div class="hr hr16 dotted"></div>
							</div>

							<div class="col-xs-12 col-sm-9">
								<div class="center">
									<span class="btn btn-app btn-sm btn-light no-hover">
										<span class="line-height-1 bigger-170 blue"> 1,411 </span>

										<br />
										<span class="line-height-1 smaller-90"> Views </span>
									</span>

									<span class="btn btn-app btn-sm btn-yellow no-hover">
										<span class="line-height-1 bigger-170"> 32 </span>

										<br />
										<span class="line-height-1 smaller-90"> Followers </span>
									</span>

									<span class="btn btn-app btn-sm btn-pink no-hover">
										<span class="line-height-1 bigger-170"> 4 </span>

										<br />
										<span class="line-height-1 smaller-90"> Projects </span>
									</span>

									<span class="btn btn-app btn-sm btn-grey no-hover">
										<span class="line-height-1 bigger-170"> 23 </span>

										<br />
										<span class="line-height-1 smaller-90"> Reviews </span>
									</span>

									<span class="btn btn-app btn-sm btn-success no-hover">
										<span class="line-height-1 bigger-170"> 7 </span>

										<br />
										<span class="line-height-1 smaller-90"> Albums </span>
									</span>

									<span class="btn btn-app btn-sm btn-primary no-hover">
										<span class="line-height-1 bigger-170"> 55 </span>

										<br />
										<span class="line-height-1 smaller-90"> Contacts </span>
									</span>
								</div>

								<div class="space-12"></div>

								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> Nama Lengkap </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $result[0]['nama']; ?> </span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> NIP </div>

										<div class="profile-info-value">
											<span class="editable" id="age"><?php echo $result[0]['nip']; ?> </span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Jabatan </div>

										<div class="profile-info-value">
											<span class="editable" id="age"><?php echo $result[0]['jabatan']; ?> </span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Joined </div>

										<div class="profile-info-value">
											<span class="editable" id="signup"><?php echo $result[0]['createdAt']; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Email </div>

										<div class="profile-info-value">
											<span class="editable" id="login"><?php echo $result[0]['username']; ?></span>
										</div>
									</div>

								</div>

							</div>

						</div>
						<div class="modal-footer">
							<a href="<?php echo base_url() . 'profile/edit'; ?>" class="btn btn-xs btn-success" title="Edit" data-id=15>Edit Profile</a>
						</div>
					</div>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
	</div><!-- /.main-content -->
	</div><!-- /.main-container -->