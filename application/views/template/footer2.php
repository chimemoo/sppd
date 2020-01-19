
	<!-- Jquery 3 -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Slimscroll -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>assets/adminlte/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url();?>assets/grocery_crud/themes/tablestrap/js/custom.js"></script>

	<!-- DatePicker -->
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>assets/adminlte/bower_components/jquery-ui/jquery-ui.js"></script>
	<!-- Color Picker Datepiccker -->
	<script>
  $(function () {
  
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    $('#datepicker').datepicker({
      autoclose: true
    })


  
  })
</script>
    <!-- jQuery UI -->
     <script type="text/javascript">

     
        
      $(document).ready(function(){
        $date = "01/04/2020 12:00 AM - 01/04/2020 11:59 PM";
        // $('#search_worker').on('keyup', function() {
        //   global $date;
        //   date = $('#reservationtime').val();
        //       console.log(date);
        // });
        $( "#search_worker").autocomplete({
          source: "<?php echo site_url('watcher/manage_sppd/get_worker/?date=');?>"+$('#reservationtime').val()
        });
        $( "#search_function" ).autocomplete({
          source: "<?php echo site_url('watcher/manage_sppd/get_function/?');?>"
        });
        $( "#search_vendor" ).autocomplete({
          source: "<?php echo site_url('watcher/manage_sppd/get_vendor/?');?>"
        });
      });
    </script>
</body>
</html>
