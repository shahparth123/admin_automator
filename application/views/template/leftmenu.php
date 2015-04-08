
<?php if($permission == 2){ ?>
<div class="sidebar-menu">


	<header class="logo-env">

		<!-- logo -->
		<div class="logo">
			<a href="<?php echo base_url();?>dashboard/index">
				<img src="<?php echo base_url();?>/assets/images/servicegenerator.png" class="img-responsive" alt="" />
			</a>
		</div>

		<!-- logo collapse icon -->

		<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>



		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>

	</header>

	<ul id="main-menu" class="">
		<!-- add class "multiple-expanded" to allow multiple submenus to open -->
		<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
		<!-- Search Bar -->
		<li id="search">
			<form method="get" action="">
				<input type="text" name="q" class="search-input" placeholder="Search something..."/>
				<button type="submit">
					<i class="entypo-search"></i>
				</button>
			</form>
		</li>
		<li class="active">
			<a href="<?php echo base_url();?>dashboard/index">
				<i class="entypo-gauge"></i>
				<span>Dashboard</span>
			</a>
		</li>

		<li>
			<a href="<?php echo base_url();?>service_generator/index">
				<i class="entypo-monitor"></i>
				<span>Generator</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>dataviewer/index">
				<i class="entypo-doc-text"></i>
				<span>Data viewer</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>user_list/index">
				<i class="entypo-users"></i>
				<span>Users List</span>
			</a>
		</li>

		<li>
			<a href="<?php echo base_url();?>api_list/index">
				<i class="entypo-tools"></i>
				<span>API List</span>
			</a>
		</li>

	</ul>
</li>
</ul>

</div>
<?php } else{?>

<div class="sidebar-menu">


	<header class="logo-env">

		<!-- logo -->
		<div class="logo">
			<a href="<?php echo base_url();?>dashboard/index">
				<img src="<?php echo base_url();?>/assets/images/servicegenerator.png" class="img-responsive" alt="" />
			</a>
		</div>

		<!-- logo collapse icon -->

		<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>



		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>

	</header>

	<ul id="main-menu" class="">
		<!-- add class "multiple-expanded" to allow multiple submenus to open -->
		<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
		<!-- Search Bar -->
		<li id="search">
			<form method="get" action="">
				<input type="text" name="q" class="search-input" placeholder="Search something..."/>
				<button type="submit">
					<i class="entypo-search"></i>
				</button>
			</form>
		</li>
		<li class="active">
			<a href="<?php echo base_url();?>dashboard/index">
				<i class="entypo-gauge"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>dataviewer/index">
				<i class="entypo-doc-text"></i>
				<span>Data viewer</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>api_list/index">
				<i class="entypo-tools"></i>
				<span>API List</span>
			</a>
		</li>

	</ul>
</li>
</ul>

</div>

<?php }?>