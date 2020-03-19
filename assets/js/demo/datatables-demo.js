// Call the dataTables jQuery plugin
$(document).ready(function() {
  	$('#dataTable').DataTable();
  	$('#dataTable2').DataTable({
  		"lengthMenu": [ 100, 25, 50, 75, 100 ]
  	});
});
