<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-float text-center">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>User ID</th>
							<th>User Email</th>
							<th>User Full Name</th>
							<th>User Role</th>
							<th>User Status</th>
							<?php
							if ($userData['userRole'] == 10 ){
								echo '
								<th></th>
								';
							}
							?>
						</tr>
					</thead>
					<tfoot>
						<tr class="text-center">
							<th>User ID</th>
							<th>User Email</th>
							<th>User Full Name</th>
							<th>User Role</th>
							<th>User Status</th>
							<?php
							if ($userData['userRole'] == 10){
								echo '
								<th></th>
								';
							}
							?>
						</tr>
					</tfoot>
					<tbody>
						<?php
						foreach ($userList as $user){
							$user = (array) $user;

							switch ($user['userRole']) {
								case '10':
								$userRole = "Manager";
								break;
								case '20':
								$userRole = "Administrator";
								break;
								default:
								$userRole = "Accountant";
								break;
							}

							switch ($user['userActive']) {
								case '0':
								$userStatus = "<span class='text-danger'>Disabled</span>";
								break;
								default:
								$userStatus = "<span class='text-success'>Active</span>";
								break;
							}

							echo '
							<tr class="text-center">
							<td>#'.$user["userID"].'</td>
							<td><a href="'.site_url("admin/email/".$user["userID"]).'">'.$user["userEmail"].'</a></td>
							<td>'.$user["userFirstName"]." ".$user["userLastName"].'</td>
							<td>'.$userRole.'</td>
							<td>'.$userStatus.'</td>';

							if ($userData['userRole'] == 10){
								echo '
								<td><a class="btn btn-info" href="'.site_url("admin/edit/".$user["userID"]).'">Edit User</a></td>
								';
							}
							echo '					</tr>
							';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
