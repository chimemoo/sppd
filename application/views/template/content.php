<?php

$menu = [
    [
        'hk' => 'hk_admin',
        'md_user' => [
            'title' => 'Master User/Worker/Vendor',
            'ms_user'=>'Master User',
            'ms_worker'=>'Master Worker',
            'ms_vendor' => 'Master Vendor'
        ],
        'md_detail' => [
            'ms_function'=>'Master Function',
            'ms_golongan'=>'Master Golongan'
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

				</ul>
			</div>
		</nav>
	</header>

	<aside class="main-sidebar">
	<section class="sidebar">
			<ul class="sidebar-menu" data-widget="tree">
                <?php var_dump($menu); foreach($menu as $mn) { $i=0; if($mn[$i]['hk'] == 'hk_admin'){?>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-dashboard"></i><span><?php $mn[$i]['hk']['md_user']['title'];?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                        </ul>
                    </li>
                <?php }$i++; } ?>   
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