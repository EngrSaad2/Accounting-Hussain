<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>&copy; HUSSAINS™ Business Consultants Ltd <?=date("Y");?> </span>

			<!-- || Developed By <a href="http://www.saadportfolio.ml/" rel="noopener noreferrer" target="_blank">SAAD</a> -->
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				Select "Logout" below if you are ready to end your current session.
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?=site_url('home/logout');?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=site_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=site_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=site_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=site_url();?>assets/js/sb-admin-2.min.js"></script>

<!-- Data Tables Plugins-->
<script src="<?=site_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=site_url();?>assets/js/demo/datatables-demo.js"></script>


<!-- Page level plugins -->
<script src="<?=site_url();?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=site_url();?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?=site_url();?>assets/js/demo/chart-pie-demo.js"></script>







<script type="text/javascript">
	$(document).ready(function() {
		var debitCount  = 1;
		$('button#addDebit').click(function(){
			var divOption    = '<div class="row" id="debitRow'+debitCount+'">';
			var selectOption = '<div class="col-5"><select class="form-control" name="entryDebitAccount[]" data-toggle="tooltip" data-placement="left" title="Debit Account">';
			<?php
			foreach ($accountsList as $account) {
				$account = (array) $account;
				echo "
				selectOption += '<option value=\"{$account['accountID']}\">Debit: {$account['accountName']}</option>';
				";
			}
			?>
			selectOption += '</select></div>';
			var inputOption   = $('<div class="col-5"><input class="form-control" placeholder="Entry Debit Balance" name="entryDebitBalance[]" type="number" step="0.01" required /></div>');
			var buttonOption  = $('<div class="col-2"><button id="removeDebit[]" class="btn btn-danger btn-block">Remove</button></div></div>');

			buttonOption.click(function() {
				$(this).parent().remove();
			});

			$('#debitAccounts').append(divOption);
			$('#debitRow'+debitCount).append(selectOption);
			$('#debitRow'+debitCount).append(inputOption);
			$('#debitRow'+debitCount).append(buttonOption);
			debitCount += 1;

		});

		var creditCount = 1;
		$('button#addCredit').click(function(){
			var divOption    = '<div class="row" id="creditRow'+creditCount+'">';
			var selectOption = '<div class="col-5"><select class="form-control" name="entryCreditAccount'+creditCount+'" data-toggle="tooltip" data-placement="left" title="Credit Account">';
			<?php
			foreach ($accountsList as $account) {
				$account = (array) $account;
				echo "
				selectOption += '<option value=\"{$account['accountID']}\">Credit: {$account['accountName']}</option>';
				";
			}
			?>
			selectOption += '</select></div>';
			var inputOption   = $('<div class="col-5"><input class="form-control" placeholder="Entry Credit Balance" name="entryCreditBalance'+creditCount+'" type="number" step="0.01" required /></div>');
			var buttonOption  = $('<div class="col-2"><button id="removeCredit'+creditCount+'" class="btn btn-danger btn-block">Remove</button></div></div>');

			buttonOption.click(function() {
				$(this).parent().remove();
			});

			$('#creditAccounts').append(divOption);
			$('#creditRow'+creditCount).append(selectOption);
			$('#creditRow'+creditCount).append(inputOption);
			$('#creditRow'+creditCount).append(buttonOption);
			creditCount += 1;

		});
	});
</script>
<script src="<?=base_url('/assets/js/main.js');?>"></script>















</body>
</html>
