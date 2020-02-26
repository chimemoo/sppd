<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/tablestrap/js/jquery.dataTables.min.js"></script>
	        <script src="<?php echo base_url(); ?>assets/grocery_crud/themes/tablestrap/js/datatables-bootstrap.min.js"></script>
<script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#dataSPPD').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('watcher/manage_sppd/dtable_get_list')?>",
	                "type": "POST"
	            },
	 
	            buttons: [
		            'pdfHtml5'
		        ],

	            "columnDefs": [
	            { 
	                "targets": [ 0 ], 
	                "orderable": false, 
	            },
	            ],

		        
	 
	    });
	 
	});
</script>

<script type="text/javascript">
	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>

<script type="text/javascript">
	function deleteSPPD(id){
		if(confirm('Apakah anda yakin menghapus data ini?')){

			$.ajax({
				url  : "<?php echo site_url('watcher/manage_sppd/delete_sppd') ?>/"+id,
				type : "POST",
				dataType : "JSON",
				success  : function(data)
				{
					reload_table();
				}
			})
			reload_table();
		}
	}
</script>

<script type="text/javascript">
    function setFeatured(id){
        if(confirm('Jadikan Featured Post?')){
            $.ajax({
                url  : "<?php echo site_url('Admin/Article/dtable_featured_row') ?>/"+id,
                type : "POST",
                dataType : "JSON",
                success  : function(data)
                {
                    reload_table();
                }
            })
            reload_table();
        }
    }
</script>
