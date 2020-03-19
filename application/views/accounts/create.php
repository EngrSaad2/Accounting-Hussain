<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
<?=validation_errors();?>
			<div class="card">
				<div class="card-header">
					<h2>Create an Account</h2>
				</div>
				<div class="card-body">
					<?=form_open(current_url());?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Account ID" name="accountID" type="number" min="0" step="1" required autofocus />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Account Name" name="accountName" type="text" required />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Account Starting Balance" name="accountBalance" type="number" min="0" step="0.01" value="0.00" required />
							</div>
							<div class="form-group">
								<select class="form-control" name="accountCategory">
									<option>Assets</option>
									<option>Liabilities</option>
									<option>Owners Equity</option>
									<option>Revenues</option>
									<option>Expenses</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="accountCategorySub">
									<option>Current Assets</option>
									<option>Non Current Assets</option>
									
									<option>Current Liabilities</option>
									<option>Non Current Liabilities</option>
									<option>Shareholders' Equity</option>
									<option>Income</option>
									<option>Expenses</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="accountSide">
									<option>Debit</option>
									<option>Credit</option>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="accountStatement">
									<option>Balance Sheet</option>
									<option>Income Statement</option>
								</select>
							</div>
							<input class="btn btn-lg btn-success btn-block" type="submit" value="Create Account" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
