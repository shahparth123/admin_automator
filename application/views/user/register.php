
<html>
<head>
<title>Form</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="http://localhost/CodeIgniter/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<?php echo form_open('user/register'); ?>

	<?php echo form_label('Name:');
$info = array('name'=> 'name','id'=> 'name');
echo form_input($info); ?>

	<?php echo form_label('Username:');
$info = array('name'=> 'username','id'=> 'username');
echo form_input($info); ?>

	<?php echo form_label('Email');
$info = array('name'=> 'email','id'=> 'email');
echo form_input($info); ?>

	<?php echo form_label('Password:');
$info = array('name'=> 'password','id'=> 'password','type'=>'password');
echo form_input($info); ?>
    
<?php $info = array('name'=> 'submit','value'=> 'Register');
	echo form_submit($info); ?>
<?php echo form_close(); ?>
</div>
</body>
</html>

