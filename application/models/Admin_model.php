<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_model{
		public $userID;
		public $userRole;

		public function __construct(){
			$this->userID = (int)$this->session->userdata('userID');
			$this->userRole = (int)$this->session->userdata('userRole');
		}

		# Get User(s) Info Model
		public function getUsers($userID = NULL){
			$userInfo = NULL;

			if ($userID == NULL){
				if($this->userRole == 10)
					$getSQL = "SELECT * FROM users";
					else
				$getSQL = "SELECT * FROM users WHERE created_by = {$this->userID}";
			}
			else {
				if($this->userRole == 10)
					$getSQL = "SELECT * FROM users WHERE userid='{$userID}'";

					else
				$getSQL = "SELECT * FROM users WHERE userid='{$userID}' AND created_by = {$this->userID}";
			}

			$queryDB  = $this->db->query($getSQL);
			$userInfo = $queryDB->result();
			return $userInfo;
		}


		# Create User from Admin Model
		public function createUser($userInfo){
			$newPassword              = $this->admin_model->createPassword();
			$userInfo['userPassword'] = md5($newPassword);

			if ($this->db->insert('users', $userInfo)){
				return true;
			}
			return false;
		}


		# Create Random Password for New User Model
		public function createPassword(){
			$newPassword = strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999)) . "?";
			return $newPassword;
		}


		# Change Edited User's Info Model
		public function changeUserInfo($userInfo){
			$userCheck = $this->user_model->userVerifyID($userInfo['userID']);
			if (!$userCheck){
				return false;
			}
			$userChange = $this->user_model->userEdit($userInfo, true);
			return $userChange;
		}


		# Delete User Model
		public function deleteUser($userID){
			$dbCheck = $this->db->delete('users', array('userID' => $userID));
			if($dbCheck){
				return true;
			}
			return false;
		}


	}
