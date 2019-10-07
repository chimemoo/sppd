<?php
	//LIST OF MENU
	//CHECK ROUTING
	$menu = [
		'admin' => [
			'menu'=>[
				[
					'code' => 'manage_partisipant',
					'title' => 'Management Partisipant',
					'menu' => [
						'admin/manage_partisipant/manage_worker'=>'Master Worker',
						'admin/manage_partisipant/manage_vendor' => 'Master Vendor'
					]
				],
				[
					'code' => 'manage_information',
					'title' => 'Management Information',
					'menu' => [
						'admin/manage_information/manage_function'=>'Master Function',
						'admin/manage_information/manage_golongan'=>'Master Golongan'
					]
				]
			]
		],


		'superadmin' => [
			'menu'=>[
				[
					'code' => 'manage_partisipant',
					'title' => 'Management Partisipant',
					'menu' => [
						'admin/manage_partisipant/manage_user'=>'Master User',
						'admin/manage_partisipant/manage_worker'=>'Master Worker',
						'admin/manage_partisipant/manage_vendor' => 'Master Vendor'
					]
				],
				[
					'code' => 'manage_information',
					'title' => 'Management Information',
					'menu' => [
						'admin/manage_information/manage_function'=>'Master Function',
						'admin/manage_information/manage_golongan'=>'Master Golongan'
					]
				]
			]
		]
	];
	
?>
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
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url(); ?>assets/image/icon/icon.png" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $this->session->username; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?php echo base_url(); ?>assets/image/icon/icon.png" class="img-circle" alt="User Image">
								<p>
									<?php echo $this->session->username; ?>
									<small><?php echo $this->session->role; ?></small>
								</p>
							</li>
							<!-- Menu Body -->
							<li class="user-body">
								<div class="row">
							
								</div>
								<!-- /.row -->
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu" data-widget="tree">
				<?php

				if($this->session->userdata('role') == 'superadmin'){

					foreach($menu['superadmin']['menu'] as $mn){
						?>
							<li class="treeview <?php if($this->uri->segment(2) == $mn['code'] ){echo 'active';} ?>">
								<a href="">
									<i class="fa fa-dashboard"></i><span><?php echo $mn['title'];?></span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php foreach($mn['menu'] as $key => $sm){ ?>
										<li class="<?php if($this->uri->uri_string() == $key ){echo 'active';} ?>"><a href="<?php echo base_url().$key; ?>"><i class="fa fa-circle-o"></i> <?php echo $sm;?></a></li>
									<?php } ?>
								</ul>
							</li>
						<?php
					}
				}else if ($this->session->userdata('role') == 'admin') {
					foreach($menu['admin']['menu'] as $mn){
						?>
						<li class="treeview <?php if($this->uri->segment(2) == $mn['code'] ){echo 'active';} ?>">
							<a href="">
								<i class="fa fa-dashboard"></i><span><?php echo $mn['title'];?></span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<?php foreach($mn['menu'] as $key => $sm){ ?>
									<li class="<?php if($this->uri->uri_string() == $key ){echo 'active';} ?>"><a href="<?php echo base_url().$key; ?>"><i class="fa fa-circle-o"></i> <?php echo $sm;?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				<?php
					}
				}
				?>

				
			</ul>
		</section>
	</aside>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?php
					$no = 0;
					foreach($menu['admin'] as $key => $mm){
						
						if($this->uri->segment(2) == $mm[$no]['code']){
							echo $mm[$no]['title'];
						}
						$no++;
						
					} 
				?>
				<small>
					<?php
						$no = 0;
						foreach($menu['admin'] as $key => $mm){
							
							if($this->uri->segment(2) == $mm[$no]['code']){
								foreach($mm[$no]['menu'] as $k => $sm){
									if($this->uri->uri_string() == $k){
										echo $sm;
									}
								}
							}
							$no++;
							
						} 
					?>
				</small>
			</h1>
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