<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<div class="container-float text-center">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">List of <?=strtoupper($logType);?> Entries</h6>
			<a class="btn btn-primary mx-2" href="<?=site_url('logs/index/users');?>">User Logs</a>
			<a class="btn btn-success mx-2" href="<?=site_url('logs/index/admin');?>">Admin Logs</a>
			<!-- <a class="btn btn-info mx-2" href="<?=site_url('logs/index/accounts');?>">Account Logs</a> -->
			<a class="btn btn-warning mx-2" href="<?=site_url('logs/index/entries');?>">Entry Logs</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>Log ID</th>
							<th>User ID</th>
							<?php

							if ($logType == 'admin'){
								echo '<th>Affected User ID</th>';
								echo '<th colspan="2">Log Information</th>';
							}
							elseif ($logType == 'accounts') {
								echo '<th>Account ID</th>';
								echo '<th colspan="2">Log Information</th>';
							}
							elseif ($logType == 'entries') {
								echo '<th>Affected Entry ID</th>';
								echo '<th>Log Information</th>';
							}
							else{
								echo '<th colspan="2">Log Information</th>';
							}

							?>
							<th>Log Date</th>
						</tr>
					</thead>
					<tfoot>
						<tr class="text-center">
							<th>Log ID</th>
							<th>User ID</th>
							<?php

							if ($logType == 'admin'){
								echo '<th>Affected User ID</th>';
								echo '<th colspan="2">Log Information</th>';
							}
							elseif ($logType == 'accounts') {
								echo '<th>Account ID</th>';
								echo '<th colspan="2">Log Information</th>';
							}
							elseif ($logType == 'entries') {
								echo '<th>Affected Entry ID</th>';
								echo '<th>Log Information</th>';
							}
							else{
								echo '<th colspan="2">Log Information</th>';
							}

							?>
							<th>Log Date</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						foreach ($logList as $log){
							$log = (array) $log;

							$logBeforeInfo = "[".$log["logBefore"]."]";
							$logAfterInfo  = "[".$log["logAfter"]."]";

							$logBeforeInfo = json_decode($logBeforeInfo, true)[0];
							$logAfterInfo  = json_decode($logAfterInfo, true)[0];

							switch ($logType) {
								case 'entries':
								echo '
								<tr class="text-center">
								<td>#'.$log["logID"].'</td>
								<td>#'.$log["userID"].'</td>
								<td>#'.$log["logBefore"].'</td>
								<td>
								'.$log["logAfter"].'
								';
								break;

			# Users Display Table
								case 'users':
								echo '
								<tr class="text-center">
								<td>#'.$log["logID"].'</td>
								<td>#'.$log["userID"].'</td>
								<td class="text-left">
								<strong>User First Name:</strong> '.$logBeforeInfo['userFirstName'].'<br />
								<strong>User Last Name:</strong> '.$logBeforeInfo['userLastName'].'<br />
								<strong>User Email:</strong> '.$logBeforeInfo['userEmail'].'<br />
								</td>
								<td class="text-left">
								';
				# First Name Change Check
								if ($logBeforeInfo['userFirstName'] != $logAfterInfo['userFirstName']){
									echo '<span class="text-danger"><strong>User First Name:</strong> '.$logAfterInfo['userFirstName'].'</span><br />';
								}
								else {
									echo '<strong>User First Name:</strong> '.$logBeforeInfo['userFirstName'].'<br />';
								}
				# Last Name Change Check
								if ($logBeforeInfo['userLastName'] != $logAfterInfo['userLastName']){
									echo '<span class="text-danger"><strong>User Last Name:</strong> '.$logAfterInfo['userLastName'].'</span><br />';
								}
								else {
									echo '<strong>User Last Name:</strong> '.$logBeforeInfo['userLastName'].'<br />';
								}
				# User Email Change Check
								if ($logBeforeInfo['userEmail'] != $logAfterInfo['userEmail']){
									echo '<span class="text-danger"><strong>User Email:</strong> '.$logAfterInfo['userEmail'].'</span><br />';
								}
								else {
									echo '<strong>User Email:</strong> '.$logBeforeInfo['userEmail'].'<br />';
								}
				# User Password Change Check
								if (array_key_exists('userPassword', $logAfterInfo)){
									echo '<span class="text-danger"><strong>User Password was changed.</strong></span><br />';
								}
								break;

			# Admin Display Table
								case 'admin':
								echo '
								<tr class="text-center">
								<td>#'.$log["logID"].'</td>
								<td>#'.$log["userID"].'</td>
								<td>#'.$logBeforeInfo["userID"].'</td>
								<td class="text-left">
								<strong>User First Name:</strong> '.$logBeforeInfo['userFirstName'].'<br />
								<strong>User Last Name:</strong> '.$logBeforeInfo['userLastName'].'<br />
								<strong>User Email:</strong> '.$logBeforeInfo['userEmail'].'<br />
								<strong>User Role:</strong> ';
								if ($logBeforeInfo['userRole'] == 0){
									echo 'Accountant';
								}
								elseif ($logBeforeInfo['userRole'] == 10){
									echo 'Manager';
								}
								else {
									echo 'Administrator';
								}
								echo '<br />
								<strong>User Status:</strong> ';
								if ($logBeforeInfo['userActive'] == 0){
									echo 'Disabled';
								}
								else {
									echo 'Active';
								}
								echo '<br />
								</td>
								<td class="text-left">
								';
				# First Name Change Check
								if ($logBeforeInfo['userFirstName'] != $logAfterInfo['userFirstName']){
									echo '<span class="text-danger"><strong>User First Name:</strong> '.$logAfterInfo['userFirstName'].'</span><br />';
								}
								else {
									echo '<strong>User First Name:</strong> '.$logBeforeInfo['userFirstName'].'<br />';
								}
				# Last Name Change Check
								if ($logBeforeInfo['userLastName'] != $logAfterInfo['userLastName']){
									echo '<span class="text-danger"><strong>User Last Name:</strong> '.$logAfterInfo['userLastName'].'</span><br />';
								}
								else {
									echo '<strong>User Last Name:</strong> '.$logBeforeInfo['userLastName'].'<br />';
								}
				# User Email Change Check
								if ($logBeforeInfo['userEmail'] != $logAfterInfo['userEmail']){
									echo '<span class="text-danger"><strong>User Email:</strong> '.$logAfterInfo['userEmail'].'</span><br />';
								}
								else {
									echo '<strong>User Email:</strong> '.$logBeforeInfo['userEmail'].'<br />';
								}
				# User Role Change Check
								if ($logBeforeInfo['userRole'] != $logAfterInfo['userRole']){
									echo '<span class="text-danger"><strong>User Role:</strong> ';
									if ($logAfterInfo['userRole'] == 0){
										echo 'Accountant';
									}
									elseif ($logAfterInfo['userRole'] == '10'){
										echo 'Manager';
									}
									else {
										echo 'Administrator';
									}
									echo '</span><br />';
								}
								else {
									echo '<strong>User Role:</strong> ';
									if ($logBeforeInfo['userRole'] == 0){
										echo 'Accountant';
									}
									elseif ($logBeforeInfo['userRole'] == 10){
										echo 'Manager';
									}
									else {
										echo 'Administrator';
									}
									echo '<br />';
								}
				# User Status Change Check
								if ($logBeforeInfo['userActive'] != $logAfterInfo['userActive']){
									echo '<span class="text-danger"><strong>User Status:</strong> ';
									if ($logAfterInfo['userActive'] == 0){
										echo 'Disabled';
									}
									else {
										echo 'Active';
									}
									echo '</span><br />';
								}
								else {
									echo '<strong>User Status:</strong> ';
									if ($logBeforeInfo['userActive'] = 0){
										echo 'Disabled';
									}
									else {
										echo 'Active';
									}
									echo '<br />';
								}
				# User Password Change Check
								if (array_key_exists('userPassword', $logAfterInfo) && $logBeforeInfo['userPassword'] != $logAfterInfo['userPassword']){
									echo '<span class="text-danger"><strong>User Password was changed.</strong></span><br />';
								}
								break;

			# Accounts Display Table
								case 'accounts':
								echo '
								<tr class="text-center">
								<td>#'.$log["logID"].'</td>
								<td>#'.$log["userID"].'</td>
								<td>#'.$logBeforeInfo["accountID"].'</td>
								<td class="text-left">
								<strong>Account Name:</strong> '.$logBeforeInfo['accountName'].'<br />
								<strong>Account Category:</strong> '.$logBeforeInfo['accountCategory'].'<br />
								<strong>Account Sub-Category:</strong> '.$logBeforeInfo['accountCategorySub'].'<br />
								<strong>Account Side:</strong> ';
								if ($logBeforeInfo['accountSide'] == 'L'){
									echo 'Left (Debit)';
								}
								else {
									echo 'Right (Credit)';
								}
								echo '<br />
								<strong>Account Statement:</strong> ';
								if ($logBeforeInfo['accountStatement'] == 'BS'){
									echo 'Balance Statement';
								}
								else {
									echo 'Income Statement';
								}
								echo '<br />
								</td>
								<td class="text-left">
								';
				# Account Name Change Check
								if ($logBeforeInfo['accountName'] != $logAfterInfo['accountName']){
									echo '<span class="text-danger"><strong>Account Name:</strong> '.$logAfterInfo['accountName'].'</span><br />';
								}
								else {
									echo '<strong>Account Name:</strong> '.$logBeforeInfo['accountName'].'<br />';
								}
				# Account Category Change Check
								if (array_key_exists('accountCategory', $logAfterInfo) && $logBeforeInfo['accountCategory'] != $logAfterInfo['accountCategory']){
									echo '<span class="text-danger"><strong>Account Category:</strong> '.$logAfterInfo['accountCategory'].'</span><br />';
								}
								else {
									echo '<strong>Account Category:</strong> '.$logBeforeInfo['accountCategory'].'<br />';
								}
				# Account Sub-Category Change Check
								if (array_key_exists('accountCategorySub', $logAfterInfo) && $logBeforeInfo['accountCategorySub'] != $logAfterInfo['accountCategorySub']){
									echo '<span class="text-danger"><strong>Account Sub-Category:</strong> '.$logAfterInfo['accountCategorySub'].'</span><br />';
								}
								else {
									echo '<strong>Account Sub-Category:</strong> '.$logBeforeInfo['accountCategorySub'].'<br />';
								}
				# Account Side Change Check
								if (array_key_exists('accountSide', $logAfterInfo) && $logBeforeInfo['accountSide'] != $logAfterInfo['accountSide']){
									echo '<span class="text-danger"><strong>Account Side:</strong> '.$logAfterInfo['accountSide'].'</span><br />';
								}
								else {
									echo '<strong>Account Side:</strong> '.$logAfterInfo['accountSide'].'<br />';
								}
				# Account Statement Change Check
								if (array_key_exists('accountStatement', $logAfterInfo) && $logBeforeInfo['accountStatement'] != $logAfterInfo['accountStatement']){
									echo '<span class="text-danger"><strong>Account Statement:</strong> '.$logAfterInfo['accountStatement'].'</span><br />';
								}
								else {
									echo '<strong>Account Statement:</strong> '.$logAfterInfo['accountStatement'].'<br />';
								}
								break;
							}

							echo '
							</td>
							<td>'.date('F d, Y | h:i A', strtotime($log["logDate"])).'</td>
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
