<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Admin Index Function
		public function index(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Admin | List of Users';
			$data['userList'] = $this->admin_model->getUsers();
			$this->load->template('admin/home', $data);
		}


		# Create User Info Function
		public function create(){
			$data['title']    = "Admin | Create User";
			$data['userData'] = $this->session->userdata();

			$userRole = $this->session->userdata('userRole');
			if ($userRole != 10){
				$this->session->set_flashdata('danger', 'You do not have permission to view this.');
				redirect('admin');
			}

			if (!empty($this->input->post())){
				$createCheck = $this->admin_model->createUser($_POST);
				if ($createCheck){
					$this->session->set_flashdata('success', 'You have successfully created a user. Login details have been emailed to the associated email address.');
					redirect('admin');
				}
				else {
					$this->session->set_flashdata('danger', 'Something internally happened. Please try again.');
					$this->load->template('admin/create', $data);
				}
			}
			else {
				$this->load->template('admin/create', $data);
			}
		}


		# Edit User Info Function
		public function edit($userID){
			$data['userData'] = $this->session->userdata();
			$data['title']    = "Admin | Edit User: #{$userID}";

			$userRole = $this->session->userdata('userRole');
			if ($userRole != 10){
				$this->session->set_flashdata('danger', 'You do not have permission to view this.');
				redirect('admin');
			}

			$getSQL    = "SELECT * FROM users WHERE userID = '{$userID}'";
			$queryDB   = $this->db->query($getSQL);
			$userCheck = $queryDB->result();

			# User Selected Does Not Exist
			if (empty($userCheck)) {
				$this->session->set_flashdata('danger', 'The user you attempted to edit does not exist.');
				redirect('admin');
			}

			$data['userEditData'] = (array) $userCheck[0];
			$data['userList']     = $this->admin_model->getUsers($userID);

			# Default Edit View
			if (empty($_POST)){
				$this->load->template('admin/edit', $data);
			}
			# Delete User Form Submitted
			elseif (array_key_exists('delete', $_POST) && $_POST['delete'] == 'Y'){
				$deletedUserID = $data['userEditData']['userID'];
				$deleteCheck   = $this->admin_model->deleteUser($deletedUserID);
				if ($deleteCheck){

					$this->session->set_flashdata('success', 'You have successfully delete the user: #'.$deletedUserID.'.');
					redirect('admin');
				}
				else {
					$this->session->set_flashdata('danger', 'Internal error. Please try again.');
					$this->load->template('admin/edit', $data);
				}
			}
			# Edit User Form Submitted
			else {
				$_POST['userID'] = $userID;

				if ($_POST['userPassword'] == '' || !array_key_exists('userPassword', $_POST)){
					unset($_POST['userPassword']);
				}
				else {
					$_POST['userPassword']        = md5($_POST['userPassword']);
					$_POST['userPasswordConfirm'] = md5($_POST['userPasswordConfirm']);
				}

				if ($_POST['userPassword'] != $_POST['userPasswordConfirm']){
					$this->session->set_flashdata('danger', 'The passwords did not match.');
					$this->load->template('admin/edit', $data);
				}
				else {
					# This needs to be unset AFTER confirmation check to make sure they match
					unset($_POST['userPasswordConfirm']);

					# Form Validation For Editing User Information from Admin Panel (WIP)
					#$updateValidation = $this->form_validation->run('update');
					#if ($updateValidation){
					#	$userChange = $this->admin_model->changeUserInfo($_POST);
					#
					#	if (!$userChange){
					#		$this->session->set_flashdata('danger', 'Something strange happened. Please try again.');
					#		redirect('admin');
					#	}
					#	else {
					#		$this->session->set_flashdata('success', 'You have successfully updated User: #'.$userID);
					#		redirect('admin');
					#	}
					#}
					#else {
					#	$this->load->template('admin/edit', $data);
					#}

					if ($_POST['userActive'] == 1){
						$_POST['userPasswordAttempts'] = 0;
					}

					$userChange = $this->admin_model->changeUserInfo($_POST);

					if (!$userChange){
						$this->session->set_flashdata('danger', 'Something strange happened. Please try again.');
						redirect('admin');
					}
					else {
						$logInfo = array(
							'userID'    => $data['userData']['userID'],
							'logType'   => 'admin',
							'logBefore' => json_encode($data['userEditData']),
							'logAfter'  => json_encode($_POST),
						);
						$this->log_model->create($logInfo);
						$this->session->set_flashdata('success', 'You have successfully updated User: #'.$userID);
						redirect('admin');
					}
				}
			}
		}


		# Admin Email Function
		public function email($userID){
			$data['userData']  = $this->session->userdata();
			$data['title']     = 'Admin | Email User: #'.$userID;
			$data['emailInfo'] = (array) $this->admin_model->getUsers($userID)[0];

			if (!empty($_POST)){
				if (mail($data['emailInfo']['userEmail'], $_POST['emailSubject'], wordwrap($_POST['emailBody'], 70), "From: ".$data['userData']['userEmail'])){
					$this->session->set_flashdata('success', 'You have successfully sent an email to User: #'.$userID);
					redirect('admin');
				}
				else {
					$this->session->set_flashdata('danger', 'Something has happened internally. Please try again.');
				}
			}

			$this->load->template('admin/email', $data);
		}


		# Password Requirement Checker Function
		public function password_check($password){
			if (preg_match('~[0-9]~', $password)){
				if (preg_match('~[.!@#$?]~', $password)){
					if (ctype_alpha($password[0])){
						return true;
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}


	}
