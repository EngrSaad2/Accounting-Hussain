<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row"  class="text-center">
		<p class="text-center col-md-12">
			Accounting @ Hussains<br />
			Balance Sheet<br />
			<?php
			if (!isset($_POST['endDate'])){
				echo "At December 31st, ".date('Y');
			}
			else {
				echo "At ".date('F jS, Y', strtotime($_POST['endDate']));
			}
			?>
			<br />
			<button class="btn btn-primary" onClick="window.print()">Print</button>
			<button class="btn btn-primary" onClick="window.print()">Save</button>
			<button class="btn btn-primary" onClick="window.print()">Email</button>
		</p>
		<div class="mx-auto">
			<?=form_open(current_url(), 'class="form-inline"');?>
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
		<tbody>
			<?php

			function getRetainedEarnings($accountList){
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
				foreach ($accounts as $accountCategory){
					foreach ($accountCategory as $account){
						$accountBalance = $account['accountDebit'] - $account['accountCredit'];
						if ($account['accountCategory'] == 'Revenues'){
							$revenueTotal += $accountBalance;
						}
						else {
							$expensesTotal += $accountBalance;
						}
					}
				}
				$netIncome        = abs($revenueTotal) - $expensesTotal;
				$dividends        = 0;
				$retainedEarnings = $netIncome - $dividends;

				return $retainedEarnings;
			}

			$retainedEarnings = getRetainedEarnings($retainedEarningsList);

			$retainedEarningArray = array(
				"accountID" => "30009990",
				"accountName" => "Retained Earnings",
				"accountCategory" => "Owners Equity",
				"accountCategorySub" => "Stockholders' Equity",
				"accountDebit" => 0,
				"accountCredit" => $retainedEarnings,
			);





			$assetsTotal      = 0;
			$liabilitiesTotal = 0;
			$equityTotal      = 0;

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

			
			if($retainedEarningArray == null)  {
				array_push($accounts["Owners Equity"], $retainedEarningArray);
				return 0;
			}


			$accountCategories = array_keys($accounts);
			$accountOrder = 0;
			foreach ($accounts as $accountCategory){
				echo '
				<tr>
				<td><strong>'.$accountCategories[$accountOrder].':</strong></td>
				<td></td>
				</tr>
				';
				$moneySign = 'TK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				$accountSubCategory = NULL;
				$subTotal = 0;
				foreach ($accountCategory as $account){
					if (!empty($_POST)){
						$_POST['startDate'] = '2020-01-01';
						$accountBalance = $this->account_model->getAccountTotal($account['accountID'], $_POST['startDate'], $_POST['endDate']);
					}
					else {
						$accountBalance = $this->account_model->getAccountTotal($account['accountID']);
					}

					if ($accountBalance == 0){
						continue;
					}

					if ($account['accountCategory'] == 'Assets'){
						$assetsTotal += $accountBalance;
					}
					elseif ($account['accountCategory'] == 'Liabilities'){
						$liabilitiesTotal += $accountBalance;
					}
					else {
						$equityTotal += $accountBalance;
					}

					$subTotal += $accountBalance; 
					if($accountSubCategory != $account['accountCategorySub']){
						$accountSubCategory = $account['accountCategorySub'];
						echo '
						<tr style="background:aliceblue;">
						<td colspan=2><strong>'.$account['accountCategorySub'].'</strong></td>
						</tr>
						';
						$subTotal = 0;
					}
					echo '
					<tr>
					<td>'.$account['accountName'].'</td>
					<td class="text-right">'.$moneySign;
					if ($accountBalance != abs($accountBalance)){
						echo '('.number_format(abs($accountBalance), 0).')';
					}
					else {
						echo number_format($accountBalance, 0);
					}
					echo '</td>
					</tr>
					';
					$moneySign = '';
				}
				if ($accountCategories[$accountOrder] == 'Assets'){
					if ($assetsTotal != abs($assetsTotal)){
						$accountAmount = '('.number_format(abs($assetsTotal), 0).')';
					}
					else {
						$accountAmount = number_format($assetsTotal, 0);
					}

					echo '
					<tr>
					<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
					<td class="text-right" style="text-decoration: underline; text-decoration-style: double; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;'.$accountAmount.'</strong></td>
					</tr>
					';
				}
				elseif ($account['accountCategory'] == 'Liabilities'){
					if ($liabilitiesTotal != abs($liabilitiesTotal)){
						$accountAmount = '('.number_format(abs($liabilitiesTotal), 0).')';
					}
					else {
						$accountAmount = number_format($liabilitiesTotal, 0);
					}
					echo '
					<tr>
					<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
					<td class="text-right" style="text-decoration: underline; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;'.$accountAmount.'</strong></td>
					</tr>
					';
				}
				else{
					if ($equityTotal != abs($equityTotal)){
						$accountAmount = '('.number_format(abs($equityTotal), 0).')';
					}
					else {
						$accountAmount = number_format($equityTotal, 0);
					}
					echo '
					<tr>
					<td class="text-center"><strong>Total '.$accountCategories[$accountOrder].'</strong></td>
					<td class="text-right" style="text-decoration: underline; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;'.$accountAmount.'</strong></td>
					</tr>
					';
				}
				$accountOrder += 1;
			}

			$liaequTotal = $liabilitiesTotal + $equityTotal;
			if ($liaequTotal != abs($liaequTotal)){
				$accountAmount = '('.number_format(abs($liaequTotal), 0).')';
			}
			else {
				$accountAmount = number_format($liaequTotal, 0);
			}

			echo '
			<tr>
			<td class="text-center"><strong>Total Liabilities & Owner\'s Equity</strong></td>
			<td class="text-right" style="text-decoration: underline; text-decoration-style: double; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;'.$accountAmount.'</strong></td>
			</tr>
			';
			?>
		</tbody>
	</table>
</div>
</div>
