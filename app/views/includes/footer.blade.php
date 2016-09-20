<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 {{date('Y')}} All Rights Reserved
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
{{HTML::script('assets/plugins/jquery-1.10.2.min.js')}}
{{HTML::script('assets/plugins/jquery-migrate-1.2.1.min.js')}}
{{HTML::script('assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js')}}
{{HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}
{{HTML::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
{{HTML::script('assets/plugins/jquery.blockui.min.js')}}
{{HTML::script('assets/plugins/jquery.cokie.min.js')}}
{{HTML::script('assets/plugins/uniform/jquery.uniform.min.js')}}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{HTML::script('assets/plugins/flot/jquery.flot.min.js')}}
{{HTML::script('assets/plugins/flot/jquery.flot.resize.min.js')}}
{{HTML::script('assets/plugins/flot/jquery.flot.categories.min.js')}}
{{HTML::script('assets/plugins/jquery.pulsate.min.js')}}
{{HTML::script('assets/plugins/gritter/js/jquery.gritter.js')}}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{HTML::script('assets/scripts/angular/angular.js')}}
{{HTML::script('assets/scripts/angular/customize.js')}}
{{HTML::script('assets/scripts/core/app.js')}}
{{HTML::script('assets/plugins/data-tables/jquery.dataTables.js')}}
{{HTML::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
{{HTML::script('assets/scripts/custom/table-advanced.js')}}
{{HTML::script('assets/scripts/custom/index.js')}}
{{HTML::script('assets/plugins/data-tables/jquery.dataTables.min.js')}}
{{HTML::script('assets/plugins/data-tables/DT_bootstrap.js')}}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- START DATA TABLES SCRIPT -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#viewdata').DataTable();
} );
</script>
<!-- END DATA TABLES SCRIPTS -->
<!-- START DATE PICKER SCRIPTS -->
<script type="text/javascript">          
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
    startDate: '-3d'
    });    
    $('#datepicker1').datepicker({
          format: 'yyyy-mm-dd',
        startDate: '-3d'
    });    
    $('#datepicker2').datepicker({
      	format: 'yyyy-mm-dd',
  		startDate: '-3d'
    });  
    $('#datepicker3').datepicker({
          format: 'yyyy-mm-dd',
        startDate: '-3d'
    });      
</script>
<!-- END DATE PICKER SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   App.init(); 
   Index.init();    
   Index.initIntro();   
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>