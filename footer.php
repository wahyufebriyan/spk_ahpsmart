</div> <!-- /wrapper -->
<?php include 'statistik.php'; ?>
<footer>
	<p>Copyright &copy; 2021 | <script src="js/javascript.js"></script>
</footer>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<script src="js/buttonHide.js"></script>
	<script>
	    var chart1; // globally available
	    $(document).ready(function() {
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },  
	         title: {
	            text: 'Grafik Perangkingan '
	         },
	         xAxis: {
	            categories: ['Eskul','Eskul']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah'
	            }
	         },
	              series:            
	            [{
	                      name: 'Pramuka',
	                      data: [<?php echo $a ?>]
	                  },
                      {
	                      name: 'Animasi Dan Vidiografik',
	                      data: [<?php echo $b ?>]
	                  },
                      {
	                      name: 'Web Desain',
	                      data: [<?php echo $c ?>]
	                  },
                      {
	                      name: 'Paskibra',
	                      data: [<?php echo $d ?>]
	                  },
					  {
	                      name: 'Bahasa Arab',
	                      data: [<?php echo $e ?>]
	                  },
	            ]
	      });
	   });  
	</script>
    <script>
    $(document).ready(function() {

    	$('#tabeldata').DataTable();

	});
    function showSuccessToast() {
        $().toastmessage('showSuccessToast', "Data Diperbarui");
    }
    function showStickySuccessToast() {
        $().toastmessage('showToast', {
            text     : 'Sukses,',
            sticky   : true,
            position : 'top-right',
            type     : 'success',
            closeText: '',
            close    : function () {
                console.log("toast is closed ...");
            }
        });

    }
    </script>
