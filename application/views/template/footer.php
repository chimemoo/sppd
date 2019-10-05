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
	<script src="<?php echo base_url();?>assets/grocery_crud/themes/tablestrap/js/custom.js"></script>
</body>
</html>
