
<html>
<head>
<title>Form</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="http://localhost/CodeIgniter/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<?php echo form_open('user'); ?>

	<?php echo form_label('Name:');
$data = array('name'=> 'name','id'=> 'name');
echo form_input($data); ?>

	<?php echo form_label('Username:');
$data = array('name'=> 'username','id'=> 'username');
echo form_input($data); ?>

	<?php echo form_label('Email');
$data = array('name'=> 'email','id'=> 'email');
echo form_input($data); ?>

	<?php echo form_label('Password:');
$data = array('name'=> 'password','id'=> 'password','type'=>'password');
echo form_input($data); ?>
    
<?php $data = array('name'=> 'submit','value'=> 'Register');
	echo form_submit($data); ?>
<?php echo form_close(); ?>
</div>
</body>
</html>

