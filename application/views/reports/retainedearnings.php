<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row"  class="text-center">
		<p class="text-center col-md-12">
			Accounting @ Hussains<br />
			Statement of Retained Earnings<br />
			<?php
			if (!isset($_POST['reportYear'])){
				$reportYear = date('Y');
			}
			else {
				$reportYear = $_POST['reportYear'];
			}
			?>
			For the Year Ended <?=date('F 31\s\t, ').$reportYear;?><br />
			<br />
			<button class="btn btn-primary" onClick="window.print()">Print</button>
			<button class="btn btn-primary" onClick="window.print()">Save</button>
			<button class="btn btn-primary" onClick="window.print()">Email</button>
		</p>
		<div class="mx-auto">
			<?=form_open(current_url(), 'class="form-inline"');?>
			<div class="form-group mx-sm-3 mb-2">
				<select class="form-control" name="reportYear" required />
				<?php
				if (!isset($_POST['reportYear'])){
					$reportYear = date('Y');
					echo '<option>'.$reportYear.'</option>';
				}
				else {
					$reportYear = $_POST['reportYear'];
					echo '<option>'.$reportYear.'</option>';
				}
				?>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
				<option>2024</option>
				<option>2025</option>
			</select>
		</div>
		<div class="form-group mb-2">
			<input class="btn btn-info btn-block" type="submit" value="Filter Year" />
		</div>
	</form>
</div>
</div>

<div class="row">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr class="text-center">
				<th>Accounts</th>
				<th>Amounts</th>
			</tr>
		</thead>
		<tbody class="searchable">
			<tr>
				<td>Beg Retained Earnings, 01/01/<?=$reportYear;?></td>
				<td class="text-right">TK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</td>
			</tr>
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
			foreach ($accounts as $accountCategory){
				foreach ($accountCategory as $account){
					$_POST['startDate'] = $reportYear.'-01-01';
					$_POST['endDate']   = $reportYear.'-12-31';
					$accountBalance = $this->account_model->getAccountTotal($account['accountID'], $_POST['startDate'], $_POST['endDate']);

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
			echo '
			<tr>
			<td>Add: Net Income</td>
			<td class="text-right">'.number_format($netIncome, 0).'</td>
			</tr>
			<tr>
			<td><strong>Total</strong></td>
			<td class="text-right" style="text-decoration: underline; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;&nbsp;'.number_format(($netIncome + 0), 0).'</strong></td>
			</tr>
			<tr>
			<td>Less: Dividends</td>
			<td class="text-right" style="text-decoration: underline;">'.number_format($dividends, 0).'</td>
			</tr>
			<tr>
			<td><strong>Retained Earnings as of '.date("F jS, ").$reportYear.'</strong></td>
			<td class="text-right" style="text-decoration: underline; text-decoration-style: double; border-top: 2px solid #000000;"><strong>TK&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($retainedEarnings, 0).'</strong></td>
			';
			?>
		</tbody>
	</table>
</div>
</div>
