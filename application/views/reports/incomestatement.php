<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container">
			<div class="row"  class="text-center">
				<p class="text-center col-md-12">
					Accounting @ Hussains<br />
					Income Statement<br />
<?php
	if (!isset($_POST['endDate'])){
		echo "For the Year Ended December 31st, ".date('Y');
	}
	else {
		echo "For the Year Ended ".date('F jS, Y', strtotime($_POST['endDate']));
	}
?>
					<br />
					<button class="btn btn-primary" onClick="window.print()">Print</button>
					<button class="btn btn-primary" onClick="window.print()">Save</button>
					<button class="btn btn-primary" onClick="window.print()">Email</button>
				</p>
				<div class="mx-auto">
					<?=form_open(current_url(), 'class="form-inline"');?>
						<div class="form-group mb-2">
							<input class="form-control" placeholder="Start Date" name="startDate" type="date" required />
						</div>
						<div class="form-group mx-sm-3 mb-2">
							<input class="form-control" placeholder="End Date" name="endDate" type="date" required />
						</div>
						<div class="form-group mb-2">
						<input class="btn btn-info btn-block" type="submit" value="Filter Range" />
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>Account Name</th>
							<th>Account Amount</th>
						</tr>
					</thead>
					<tbody>
<?php
	$revenueTotal  = 0;
	$expensesTotal = 0;

	$accounts = array();

	foreach ($accountList as $account){
		$account = (array) $account;

		if (!isset($accounts[$account['accountCategory']])){
			$accounts[$account['accountCategory']] = array($account);
		}
		else {
			array_push($accounts[$account['accountCategory']], $account);
		}
	}

	$accountCategories = array_keys($accounts);
	$accountOrder = 0;

	$moneySign = 'TK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	foreach ($accounts as $accountCategory){
		echo '
					<tr>
						<td><strong>'.$accountCategories[$accountOrder].':</strong></td>
						<td></td>
					</tr>
		';
		foreach ($accountCategory as $account){
			if (!empty($_POST)){
				$accountBalance = $this->account_model->getAccountTotal($account['accountID'], $_POST['startDate'], $_POST['endDate']);
			}
			else {
			$accountBalance = $this->account_model->getAccountTotal($account['accountID']);
			}

			if ($accountBalance == 0){
				continue;
			}

			if ($account['accountCategory'] == 'Revenues'){
				$revenueTotal += $accountBalance;
			}
			else {
				$expensesTotal += $accountBalance;
			}
			echo '
						<tr>
							<td>'.$account['accountName'].'</td>
							<td class="text-right">'.$moneySign.number_format(abs($accountBalance), 0).'</td>
							</tr>
			';

			$moneySign = '';
			}
		if ($accountCategories[$accountOrder] == 'Revenues'){
			$accountAmount = number_format(abs($revenueTotal), 0);
		}
		else {
			$accountAmount = number_format(abs($expensesTotal), 0);
		}
		echo '
							<tr>
								<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
								<td class="text-right" style="text-decoration: underline;"><strong>TK&nbsp;&nbsp;&nbsp;&nbsp;'.$accountAmount.'</strong></td>
							</tr>
		';
		$accountOrder += 1;
		}
	echo '
							<tr>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-center"><strong>Net Income</strong></td>
								<td class="text-right" style="text-decoration: underline; text-decoration-style: double; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;&nbsp;'.number_format((abs($revenueTotal) - $expensesTotal), 0).'</strong></td>
							</tr>
	';
?>
					</tbody>
				</table>
			</div>
		</div>
