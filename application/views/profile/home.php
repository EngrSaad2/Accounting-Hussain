<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="jumbotron" >
		<h1 class="display-4">Welcome, <?=$userData['userFirstName']." ".$userData['userLastName'];?></h1>
		<p class="lead">
			Here, you will see all of your current login information.
		</p>
		<hr class="my-4" />
		<p>
			This information is secured so that only you can see it. If you have any questions or comments, feel free to contact the tech support team by filling out a <a href="<?=site_url('help/contact');?>">help form</a>. An answer to your question may be found over at the <a href="<?=site_url('help/home');?>">knowledgebase</a> as well.
		</p>
	</div>

	<table class="table table-borderless">
		<tbody>
			<tr>
				<th scope="row">User ID</th>
				<td class="text-right">#<?=$userData['userID'];?></td>
			</tr>
			<tr>
				<th scope="row">Username</th>
				<td class="text-right"><?=$userData['userName'];?></td>
			</tr>
			<tr>
				<th scope="row">User Role</th>
				<?php
				switch ($userData['userRole']) {
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
				?>
				<td class="text-right"><?=$userRole;?></td>
			</tr>
			<tr>
				<th scope="row">Email</th>
				<td class="text-right"><?=$userData['userEmail'];?></td>
			</tr>
			<tr>
				<th scope="row">First Name</th>
				<td class="text-right"><?=$userData['userFirstName'];?></td>
			</tr>
			<tr>
				<th scope="row">Last Name</th>
				<td class="text-right"><?=$userData['userLastName'];?></td>
			</tr>
		</tbody>
	</table>
	<a class="btn btn-warning btn-block" href="<?=site_url('profile/edit');?>">Change Your Information</a>
</div>
