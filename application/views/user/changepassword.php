<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>Change Password</title>
	

	<link rel="stylesheet" href="<?php echo base_url();?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/custom.css">

	<script src="<?php echo base_url();?>/assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">

<!-- This is needed when you send requests via Ajax --><script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="index.html" class="logo">
				<img src="<?php echo base_url();?>/assets/images/logo@2x.png" width="120" alt="" />
			</a>
			
			<p class="description">Dear User Please Enter New Password</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p><strong>User Name</strong>/<strong>Password</strong> is invalid.</p>
			</div>
			
			<?php $attr = array('id'=> "form_login");
			     echo form_open('user/changepassword',$attr); ?>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Confirm Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Submit
					</button>
				
						
			<?php echo form_close(); ?>
			
			
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom Scripts -->
	<script src="<?php echo base_url();?>/assets/js/gsap/main-gsap.js"></script>
	<script src="<?php echo base_url();?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>/assets/js/joinable.js"></script>
	<script src="<?php echo base_url();?>/assets/js/resizeable.js"></script>
	<script src="<?php echo base_url();?>/assets/js/neon-api.js"></script>
	<script src="<?php echo base_url();?>/assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/neon-login.js"></script>
	<script src="<?php echo base_url();?>/assets/js/neon-custom.js"></script>
	<script src="<?php echo base_url();?>/assets/js/neon-demo.js"></script>

</body>
</html>