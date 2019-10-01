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
<body class="hold-transition skin-black sidebar-mini">
	<header class="main-header">
		<!-- Logo -->
		<a href="index2.html" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><img src="<?php echo base_url();?>assets/image/logo/pertamina.png" style="max-width:50px;"/></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b><img src="<?php echo base_url();?>assets/image/logo/pertamina.png" style="max-width:60px;"/></b></span>
		</a>
		<nav class="navbar navbar-static-top">
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        		<span class="sr-only">Toggle navigation</span>
      		</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">

				</ul>
			</div>
		</nav>
	</header>

	<aside class="main-sidebar">
	<section class="sidebar">
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li class="treeview">
					<a href="">
						<i class="fa fa-dashboard"></i><span>Dashboard</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
						<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
					</ul>
				</li>
			</ul>
		</section>
	</aside>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Dashboard
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-sm-12">
					<div style="padding: 10px">
						<?php echo $output; ?>
					</div>
				</div>
			</div>
		</section>
	</div>

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.18
		</div>
		<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
		reserved.
	</footer>

    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Slimscroll -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>assets/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
