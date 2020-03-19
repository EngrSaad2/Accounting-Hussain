<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row"  class="text-center">
		<p class="text-center col-md-12">
			Accounting @ Hussains<br />
			Trial Balance<br />
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
				<th>Debit</th>
				<th>Credit</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$totalDebitAccount  = 0;
			$totalCreditAccount = 0;

			$accounts = array();

			asort($accountList);
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
				echo '
				<tr>
				<td><strong>'.$accountCategories[$accountOrder].':</strong></td>
				<td></td>
				<td></td>
				</tr>
				';
				$accountOrder += 1;

				$categoryCount = 0;
				$textDecor = 'none';

				$moneySign = 'TK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				foreach ($accountCategory as $account){
					$categoryCount++;
					if ($categoryCount == count($accountCategory)){
						$textDecor = 'underline';
					}

					if (!empty($_POST)){
						$_POST['startDate'] = '1970-01-01';
						$accountTotal = $this->account_model->getAccountTotalDebitCredit($account['accountID'], $_POST['startDate'], $_POST['endDate']);
					}
					else {
						$accountTotal = $this->account_model->getAccountTotalDebitCredit($account['accountID']);
					}

					// if ($accountTotal == 0){
					// 	continue;
					// }

					$totalDebitAccount += $accountTotal['debitTotal'];
					$totalCreditAccount += $accountTotal['creditTotal'];
					echo '
					<tr>
					<td>'.$account['accountName'].'</td>
					<td style="text-decoration: '.$textDecor.';" class="text-right">';
					if ($accountTotal['debitTotal'] != abs($accountTotal['debitTotal'])){
						echo '('.number_format(abs($accountTotal['debitTotal']), 0).')'.' /=';
					}
					else {
						echo number_format($accountTotal['debitTotal'], 0).' /=';
					}
					echo '<td style="text-decoration: '.$textDecor.';" class="text-right">';
					if ($accountTotal['creditTotal'] != abs($accountTotal['creditTotal'])){
						echo '('.number_format(abs($accountTotal['creditTotal']), 0).')'.' /=';
					}
					else {
						echo number_format($accountTotal['creditTotal'], 0).' /=';
					}
					echo '</td>
					</tr>
					';

					// if ($account['accountSide'] == 'Left (Debit)'){
					// 	$totalDebitAccount += $accountTotal;
					// 	echo '
					// 	<tr>
					// 	<td>'.$account['accountName'].'</td>
					// 	<td style="text-decoration: '.$textDecor.';" class="text-right">'.$moneySign;
					// 	if ($accountTotal != abs($accountTotal)){
					// 		echo '('.number_format(abs($accountTotal), 0).')';
					// 	}
					// 	else {
					// 		echo number_format($accountTotal, 0);
					// 	}
					// 	echo '</td>
					// 	<td></td>
					// 	</tr>
					// 	';
					// }
					// else {
					// 	$totalCreditAccount += $accountTotal;
					// 	echo '
					// 	<tr>
					// 	<td>'.$account['accountName'].'</td>
					// 	<td></td>
					// 	<td style="text-decoration: '.$textDecor.';" class="text-right">'.$moneySign;
					// 	if ($accountTotal != abs($accountTotal)){
					// 		echo '('.number_format($accountTotal, 0).')';
					// 	}
					// 	else {
					// 		echo number_format($accountTotal, 0);
					// 	}
					// 	echo '</td>
					// 	</tr>
					// 	';
					// }
					$moneySign = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
			}









			echo '
			<tr>
			<td class="text-center"><strong>Total</strong></td>
			<td class="text-right" style="text-decoration: underline; text-decoration-style: double; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;'.number_format($totalDebitAccount, 0).'</strong></td>
			<td class="text-right" style="text-decoration: underline; text-decoration-style: double; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;'.number_format($totalCreditAccount, 0).'</strong></td>
			</tr>
			';
			?>
		</tbody>
	</table>
</div>
</div>
