<div class="row">
	<?php $user_data = $this->session->all_userdata();?>
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">

		<ul class="user-info pull-left pull-none-xsm">

			<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo base_url();?>uploads/<?php echo $user_data['logged_in']['id']?>.jpg" alt="" class="img-circle" width="44" />
					<?php
					echo $user_data['logged_in']['name'];
					?>
				</a>

				<ul class="dropdown-menu">

					<!-- Reverse Caret -->
					<li class="caret"></li>

					<!-- Profile sub-links -->
					<li>
						<a href="<?php echo base_url(); ?>user/editprofile">
							<i class="entypo-vcard"></i>
							Edit Profile
						</a>
					</li>

					<li>
						<a href="<?php echo base_url(); ?>user/changepic">
							<i class="entypo-user"></i>
							Change Profile Picture
						</a>
					</li>

					<li>
						<a href="<?php echo base_url(); ?>user/editpassword">
							<i class="entypo-key"></i>
							Change Password
						</a>
					</li>

					<li>
						<a href="<?php echo base_url(); ?>user/logout">
							<i class="entypo-logout"></i>
							LogOut
						</a>
					</li>
				</ul>
			</li>

		</ul>

		<ul class="user-info pull-left pull-right-xs pull-none-xsm">



		</ul>

	</div>

</div>
