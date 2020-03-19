<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<?=validation_errors();?>
	<div class="card">
		<div class="card-header">
			<h2>Edit Account Info: <strong><?=$accountData['accountName'];?></strong> #<em><?=$accountData['accountID'];?></em></h2>
		</div>
		<div class="card-body">
			<?=form_open(current_url());?>
			<fieldset>
				<div class="form-group">
					<input class="form-control" placeholder="Account Name" name="accountName" type="text" required autofocus value="<?=$accountData['accountName'];?>" data-toggle="tooltip" data-placement="left" title="Account Name" />
				</div>
				<div class="form-group">
					<select class="form-control" name="accountCategory" data-toggle="tooltip" data-placement="left" title="Account Category">
						<?php
						switch ($accountData['accountCategory']) {
							case 'Assets':
							echo "<option selected disabled>Assets</option>";
							break;
							case 'Liabilities':
							echo "<option selected disabled>Liabilities</option>";
							break;
							default:
							break;
						}
						?>

									<option>Assets</option>
									<option>Liabilities</option>
									<option>Owners Equity</option>
									<option>Revenues</option>
									<option>Operating Expenses</option>
					
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="accountCategorySub" data-toggle="tooltip" data-placement="left" title="Account Sub-Category">
						<?php
						switch ($accountData['accountCategorySub']) {
							case 'Cash Related Accounts':
							echo "<option selected disabled>Cash Related Accounts</option>";
							break;
							default:
							break;
						}
						?>

									<option>Current Assets</option>
									<option>Non Current Assets</option>
									
									<option>Current Liabilities</option>
									<option>Non Current Liabilities</option>
									<option>Shareholders' Equity</option>
									<option>Revenues</option>
									<option>Expenses</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="accountSide" data-toggle="tooltip" data-placement="left" title="Account Side">
						<?php
						switch ($accountData['accountSide']) {
							case 'L':
							echo "<option value='L' selected disabled>Left (Debit)</option>";
							break;
							case 'R':
							echo "<option value='R' selected disabled>Right (Credit)</option>";
							break;
							default:
							break;
						}
						?>
						<option value='L'>Debit</option>
						<option value='R'>Credit</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="accountStatement" data-toggle="tooltip" data-placement="left" title="Account Statement">
						<?php
						switch ($accountData['accountStatement']) {
							case 'BS':
							echo "<option value='BS' selected disabled>Balance Statement</option>";
							break;
							case 'IS':
							echo "<option value='IS' selected disabled>Income Statement</option>";
							break;
							default:
							break;
						}
						?>
						<option value='BS'>Balance Statement</option>
						<option value='IS'>Income Statement</option>
					</select>
				</div>
				<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit Changes" />
			</fieldset>
		</form>
	</div>
</div>
</div>

<div class="container">
	<div class="row" style="padding-top: 40px;">

		<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">
			Delete Account: #<?=$accountData['accountID'];?>
		</button>

		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteModalLabel">Delete Account: #<?=$accountData['accountID'];?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>
							Are you sure you wish to delete the following account? If you do so, you will delete the entire account profile and this action is irreverisble.
						</p>
						<p class="text-right">
							<small>(All account logs will still be stored for security and safety)</small>
						</p>
					</div>
					<div class="modal-footer">
						<?=form_open(current_url());?>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="hidden" name="delete" value="Y" />
						<input type="submit" class="btn btn-danger" value="Delete Account" />
					</form>
				</div>
			</div>
		</div>
	</div>



</div>
</div>
