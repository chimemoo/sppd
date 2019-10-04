<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $data['title_page']; ?></title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/dist/css/AdminLTE.min.css">
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/dist/css/skins/_all-skins.min.css">
	<?php
		foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body class="hold-transition skin-black fixed sidebar-mini">