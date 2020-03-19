<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<h1>
			List of Ledgers
			<?php
			if (current_url() != 'http://localhost/ci/ledgers'){
				echo '| <a class="btn btn-primary" href="'.site_url().'ledgers">Show All</a>';
			}
			?>
		</h1>
		<div class="input-group" style="padding-bottom: 10px">
			<input id="filter" type="text" class="form-control" placeholder="Type here to filter...">
		</div>
	</div>

	<div class="row">
		<?php
		foreach ($accountList as $account){
			$account = (array) $account;
			$accountEntries = array();

			$accountID      = $account['accountID'];
			$accountBalance = $account['accountDebit'] - $account['accountCredit'];

			foreach($entryList as $entry){
				$entry = (array) $entry;
				if (in_array($account['accountID'], json_decode($entry['entryDebitAccount'])) || in_array($account['accountID'], json_decode($entry['entryCreditAccount']))){
					array_push($accountEntries, $entry);
				}
			}

			if (!empty($accountEntries)){
				echo '<h3 class="pull-left"><a href="'.site_url().'ledgers/index/'.$account['accountID'].'">'.$account['accountName'].'</a></h3>';

				echo '
				<table class="table table-striped table-bordered table-hover">
				<thead class="thead-dark">
				<tr class="text-center">
				<th>Date</th>
				<th>Description</th>
				<th>Debit</th>
				<th>Credit</th>
				<th>Post Reference</th>
				</tr>
				</thead>
				<tbody class="searchable text-center">
				';
				foreach ($accountEntries as $entry){
					$entry = (array) $entry;

					$entryDebitAccounts = array();
					$entryDebitBalances = 0;

					$entryCreditAccounts = array();
					$entryCreditBalances = 0;

					foreach (json_decode($entry['entryDebitAccount']) as $debitAccount){
						array_push($entryDebitAccounts, array((string) $debitAccount => json_decode($entry['entryDebitBalance'])[$entryDebitBalances]));
						$entryDebitBalances += 1;
					}

					foreach (json_decode($entry['entryCreditAccount']) as $creditAccount){
						array_push($entryCreditAccounts, array((string) $creditAccount => json_decode($entry['entryCreditBalance'])[$entryCreditBalances]));
						$entryCreditBalances += 1;
					}

					echo '
					<tr>
					<td class="text-left align-middle">'.date('F d, Y', strtotime($entry['entryCreateDate'])).'<br />'.date('h:i A', strtotime($entry['entryCreateDate'])).'</td>
					<td class="align-middle">';
					echo $entry['entryDescription'];
					$entryFiles = glob('assets/files/entries/'.$entry['entryID'].'/*.*');
					if (!empty($entryFiles)){
						echo '<br /><br />';
						$fileCount = 1;
						foreach ($entryFiles as $file){
							echo '<a href="'.site_url().$file.'" target="_blank">File '.$fileCount.'</a><br />';
							$fileCount++;
						}
					}
					echo 			'</td>
					<td class="align-middle">';
					foreach ($entryDebitAccounts as $account){
						$balance = $account[key($account)];
						$account = key($account);
						$accountInfo = $this->entry_model->getAccount($account);

						$x = 0;
						if ($accountInfo['accountID'] == $accountID){
							echo '<strong>TK'.number_format($balance, 0).'</strong><br />';
							$x++;
						}
					}
					echo '			</td>
					<td class="align-middle">';
					foreach ($entryCreditAccounts as $account){
						$balance = $account[key($account)];
						$account = key($account);
						$accountInfo = $this->entry_model->getAccount($account);

						$y = 0;
						if ($accountInfo['accountID'] == $accountID){
							echo '<strong>TK'.number_format($balance, 0).'</strong><br />';
							$y++;
						}
					}
					echo '			</td>
					<td class="align-middle"><a href="'.site_url().'entries/index/'.$entry['entryID'].'">#'.$entry['entryID'].'</a></td>
					</tr>
					';
				}
				echo '
				</tbody>
				</table>
				';
			}
		}

		?>
	</div>
</div>
