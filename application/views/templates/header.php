<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userID = $this->session->userdata('userID');
$userRole = $this->session->userdata('userRole');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Accounting @ Hussain is a simple Double Entry Accounting System written in PHP/CodeIgniter.">
	<meta name="author" content="Saad">

	<title><?=$title;?></title>

	<!-- Custom Fonts -->
	<link href="<?=site_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom Style -->
	<link href="<?=site_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?=site_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion d-print-none" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url();?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-chart-line"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Accounting @ Hussains</div>
			</a>
			<?php
			if ($userID){
				?>
				<hr class="sidebar-divider my-0">
				<!-- Nav Item - Dashboard -->
				<li class="nav-item">
					<a class="nav-link" href="<?=site_url();?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<hr class="sidebar-divider my-0">
				<!-- Nav Item - Accounts -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccounts" aria-expanded="true" aria-controls="collapseAccounts">
						<i class="fas fa-fw fa-cog"></i>
						<span>Accounts</span>
					</a>
					<div id="collapseAccounts" class="collapse" aria-labelledby="collapseAccounts" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Accounts</h6>
							<a class="collapse-item" href="<?=site_url('accounts');?>">Home</a>
							<a class="collapse-item" href="<?=site_url('accounts/create');?>">Create</a>
						</div>
					</div>
				</li>


				<?php
				if ($userID && $userRole != 10){
					echo '
					
					';
				}
				else{
					echo '
					<!-- Nav Item - Users -->
					<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
					<i class="fas fa-fw fa-address-book"></i>
					<span>Users</span>
					</a>
					<div id="collapseUsers" class="collapse" aria-labelledby="collapseUsers" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Users</h6>
					<a class="collapse-item" href="'.site_url('admin').'">Home</a>
					<a class="collapse-item" href="'.site_url('admin/create').'">Create</a>
					</div>
					</div>
					</li>
					';
				}
				?>
				<?php if ($userID && $userRole == 10){ ?>
					<!-- Nav Item - Logs -->
					<li class="nav-item">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLogs" aria-expanded="true" aria-controls="collapseLogs">
							<i class="fas fa-fw fa-folder"></i>
							<span>Logs</span>
						</a>
						<div id="collapseLogs" class="collapse" aria-labelledby="collapseLogs" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">Logs</h6>
								<a class="collapse-item" href="<?=site_url('logs/index/users');?>">User Logs</a>
								<a class="collapse-item" href="<?=site_url('logs/index/admin');?>">Admin Logs</a>
								<!-- <a class="collapse-item" href="<?=site_url('logs/index/accounts');?>">Account Logs</a> -->
								<a class="collapse-item" href="<?=site_url('logs/index/entries');?>">Entry Logs</a>
							</div>
						</div>
					</li>
					<?php
				}
				if ($userID && $userRole != 20){
					echo '
					<!-- Nav Item - Entries -->
					<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEntries" aria-expanded="true" aria-controls="collapseEntries">
					<i class="fas fa-fw fa-edit"></i>
					<span>Entries</span>
					</a>
					<div id="collapseEntries" class="collapse" aria-labelledby="collapseEntries" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Entries</h6>
					<a class="collapse-item" href="'.site_url('entries').'">Home</a>
					<a class="collapse-item" href="'.site_url('entries/create').'">Create</a>
					</div>
					</div>
					</li>

					<!-- Nav Item - Ledgers -->
					<li class="nav-item">
					<a class="nav-link" href="'.site_url('ledgers').'">
					<i class="fas fa-envelope-open-text"></i>
					<span>Ledgers</span>
					</a>
					</li>
					';
				}
				?>

				<!-- Nav Item - Reports -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
						<i class="fas fa-fw fa-book"></i>
						<span>Reports</span>
					</a>
					<div id="collapseReports" class="collapse" aria-labelledby="collapseLogs" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Reports</h6>
							<a class="collapse-item" href="<?=site_url('reports/trialbalance');?>">Trial Balance</a>
							<a class="collapse-item" href="<?=site_url('reports/balancesheet');?>">Balance Sheet</a>
							<a class="collapse-item" href="<?=site_url('reports/incomestatement');?>">Income Statement</a>
							<a class="collapse-item" href="<?=site_url('reports/retainedearnings');?>">Statement of Ret. Earnings</a>
						</div>
					</div>
				</li>

				<!-- Sidebar Toggler (Sidebar) -->
				<hr class="sidebar-divider d-none d-md-block">
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
				<?php
			}
			?>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->

						<?php
						if ($userID){
							echo '
							<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$userData['userFirstName'].' '.$userData['userLastName'].'</span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="'.site_url('profile').'">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
							</a>
							</div>
							</li>
							';
						}
						else {
							echo '
							<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small">Guest</span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="'.site_url('users/login').'">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-200"></i>
							Login
							</a>
							<a class="dropdown-item" href="'.site_url('users/register').'">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Register
							</a>
							</div>
							</li>
							';
						}
						?>
					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<?php

					if ($this->session->flashdata('success')){
						echo '
						<div class="alert alert-success alert-dismissible fade show">
						'.$this->session->flashdata('success').'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>
						';
					}
					if ($this->session->flashdata('warning')){
						echo '
						<div class="alert alert-warning alert-dismissible fade show">
						'.$this->session->flashdata('warning').'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>
						';
					}
					if ($this->session->flashdata('danger')){
						echo '
						<div class="alert alert-danger alert-dismissible fade show">
						'.$this->session->flashdata('danger').'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>
						';
					}
					?>
