<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-float text-center">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">List of Entries</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>Entry ID</th>
							<th>Entry Description</th>
							<th>Entry Type</th>
							<th>Entry Debit</th>
							<th>Entry Credit</th>
							<th>Entry Status</th>
							<th>Entry Date</th>
							
						</tr>
					</thead>
					<tfoot>
						<tr class="text-center">
							<th>Entry ID</th>
							<th>Entry Description</th>
							<th>Entry Type</th>
							<th>Entry Debit</th>
							<th>Entry Credit</th>
							<th>Entry Status</th>
							<th>Entry Date</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						foreach ($entryList as $entry){
							$entry = (array) $entry;
							$entry['entryDebitAccount'] = json_decode($entry['entryDebitAccount']);
							$entry['entryDebitBalance'] = json_decode($entry['entryDebitBalance']);
							$entry['entryCreditAccount'] = json_decode($entry['entryCreditAccount']);
							$entry['entryCreditBalance'] = json_decode($entry['entryCreditBalance']);
							echo '
							<tr>
							<td><a href="'.site_url().'entries/index/'.$entry['entryID'].'">#'.$entry['entryID'].'</a></td>
							<td>';
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
							echo '						</td>
							<td>'.$entry['entryType'].'</td>
							<td class="text-right">';

							foreach ($entry['entryDebitAccount'] as $debitAccount){
								$entryNumber = array_search($debitAccount, $entry['entryDebitAccount']);
								echo '<a href="'.site_url().'ledgers/index/'.$this->entry_model->getAccount($debitAccount)['accountID'].'">'.$this->entry_model->getAccount($debitAccount)['accountName'].'</a><br /><strong>TK'.number_format($entry['entryDebitBalance'][$entryNumber], 0).'</strong><br />';
							}
							echo '</td><td class="text-right">';
							foreach ($entry['entryCreditAccount'] as $creditAccount){
								$entryNumber = array_search($creditAccount, $entry['entryCreditAccount']);
								echo '<a href="'.site_url().'ledgers/index/'.$this->entry_model->getAccount($creditAccount)['accountID'].'">'.$this->entry_model->getAccount($creditAccount)['accountName'].'</a><br /><strong>TK'.number_format($entry['entryCreditBalance'][$entryNumber], 0).'</strong><br />';
							}
							echo '						</td><td>';
							if ($entry['entryStatus'] == 0 && $entry['entryStatusComment'] == NULL){
								echo '<span class="text-warning">Pending</span>';

								if ($userData['userRole'] >= 0 || 10){
									echo '
									<br/ ><a href='.site_url("entries/approve/".$entry['entryID']).'>Approve?</a>
									<br/ ><span class="text-danger"><a data-toggle="modal" data-target="#reject'.$entry['entryID'].'">Reject?</span></a>
									';

									echo '
									<div class="modal fade" id="reject'.$entry['entryID'].'" tabindex="-1" aria-labelledby="reject'.$entry['entryID'].'Title" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="reject'.$entry['entryID'].'Title">Reject Entry: #'.$entry['entryID'].'</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
									<p class="text-left">
									Are you sure you wish to reject Entry: #'.$entry['entryID'].'?<br ?>
									If so, please give a reason why below.
									</p>
									'.form_open(site_url("entries/reject/".$entry['entryID'])).'
									<fieldset>
									<div class="form-group">
									<textarea class="form-control" placeholder="Reject Reason" name="rejectReason" id="rejectReason" rows="3" required></textarea>
									</div>
									<div class="form-group float-right">
									<input class="btn btn-lg btn-danger" type="submit" value="Reject Entry" />
									</div>
									</fieldset>
									</form>
									</div>
									</div>
									</div>
									</div>
									';
								}
							}
							elseif ($entry['entryStatus'] == 0 && $entry['entryStatusComment'] != NULL){
								echo '<span class="text-danger">Rejected - '.$entry['entryStatusComment'].'</span>';
							}
							else {
								echo '<span class="text-success">Approved</span>';
							}
							echo '						</td>
							<td>'.date('F d, Y | h:i A', strtotime($entry['entryCreateDate'])).'</td>
							</tr>
							';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
