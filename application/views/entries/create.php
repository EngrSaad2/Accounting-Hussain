<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<?=validation_errors();?>
	<div class="card">
		<div class="card-header">
			<h2>Create an Entry</h2>
		</div>
		<div class="card-body">
			<?=form_open(current_url(), 'enctype="multipart/form-data"');?>
			<fieldset>
				<div class="form-group">
					<input class="form-control" placeholder="Entry Description" name="entryDescription" type="text" required />
				</div>
				<div class="form-group">
					<select class="form-control" name="entryType" data-toggle="tooltip" data-placement="left" title="Entry Type">
						<option>Initial</option>
						<option>Adjusting</option>
						<option>Closing</option>
					</select>
				</div>
				<div class="form-group" id="debitAccounts">
					<div class="row">
						<div class="col-5">
							<select class="form-control" name="entryDebitAccount[]" data-toggle="tooltip" data-placement="left" title="Debit Account">
								<?php
								foreach ($accountsList as $account) {
									$account = (array) $account;
									echo "
									<option value='{$account['accountID']}'>Debit: {$account['accountName']}</option>
									";
								}
								?>
							</select>
						</div>
						<div class="col-5">
							<input class="form-control" placeholder="Entry Debit Balance" name="entryDebitBalance[]" type="number" min="0" step="0.01" required />
						</div>
						<div class="col-2">
							<button id="addDebit" class="btn btn-primary btn-block" type="button">Add Debit</button>
						</div>
					</div>
				</div>
				<div class="form-group" id="creditAccounts">
					<div class="row">
						<div class="col-5">
							<select class="form-control" name="entryCreditAccount[]" data-toggle="tooltip" data-placement="left" title="Credit Account">
								<?php
								foreach ($accountsList as $account) {
									$account = (array) $account;
									echo "
									<option value='{$account['accountID']}'>Credit: {$account['accountName']}</option>
									";
								}
								?>
							</select>
						</div>
						<div class="col-5">
							<input class="form-control" placeholder="Entry Credit Balance" name="entryCreditBalance[]" type="number" min="0" step="0.01" required />
						</div>
						<div class="col-2">
							<button id="addCredit" class="btn btn-primary btn-block" type="button">Add Credit</button>
						</div>
					</div>
				</div>
				<div class="form-group" style="padding-top: 10px;">
					<input type="file" class="form-control-file" id="entryFile" name="entryFile">
					<small class="form-text text-muted">You need give a pdf, docx, png, jpeg, etc. for the reason for the creation of this entry.</small>
				</div>
				<input class="btn btn-lg btn-success btn-block" type="submit" value="Create Entry" />
			</fieldset>
		</form>
	</div>
</div>
</div>
