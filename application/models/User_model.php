<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_model{


		# User Login Model
		public function userLogin($email, $password){
			$loginSQL = "SELECT * FROM users WHERE userEmail = '{$email}' AND userPassword = '{$password}'";
			$queryDB  = $this->db->query($loginSQL);
			$query    = $queryDB->result();

			if (!empty($query)){
				return $query;
			}
			else {
				return false;
			}
		}


		# User Unsuccessful Login Attempt Model
		public function userLoginAttempt($email){
			$loginSQL = "SELECT * FROM users WHERE userEmail = '{$email}'";
			$queryDB  = $this->db->query($loginSQL);
			$userInfo = $queryDB->result();

			if (!empty($userInfo)){
				$userInfo = (array) $userInfo[0];

				if ($userInfo['userPasswordAttempts'] > 4){
					$this->db->where('userEmail', $email);
					$this->db->update('users', array('userActive' => 0));

					return false;
				}
				else {
					$this->db->where('userEmail', $email);
					$this->db->update('users', array('userPasswordAttempts' => ($userInfo['userPasswordAttempts'] + 1)));

					return true;
				}
			}
			else {
				return true;
			}
		}


		# User Register Model
		public function userRegister($userInfo){
			if($this->db->insert('users', $userInfo)){
				return true;
			}
			else {
				return false;
			}
		}



		# Edit User Info Model
		public function userEdit($userInfo){
			$getSQL   = "SELECT * FROM users WHERE userid='{$userInfo['userID']}'";
			$queryDB  = $this->db->query($getSQL);
			$userData = $queryDB->result();

			$userData = (array) $userData[0];

			$prevPasswords = json_decode($userData['userPrevPassword']);
			array_push($prevPasswords, $userInfo['userPassword']);
			$userInfo['userPrevPassword'] = json_encode($prevPasswords);

			$this->db->where('userID', $userInfo['userID']);
			$this->db->update('users', $userInfo);

			return true;
		}



		# Verify User ID Model
		public function userVerifyID($userID){
			$getSQL   = "SELECT * FROM users WHERE userid='{$userID}'";
			$queryDB  = $this->db->query($getSQL);
			$userInfo = $queryDB->result();

			if (empty($userInfo)){
				return false;
			}
			return true;
		}



		# Verify User Password Model
		public function userVerifyPassword($userPassword){
			$userPassword = md5($userPassword);
			$getSQL   = "SELECT * FROM users WHERE userPassword='{$userPassword}'";
			$queryDB  = $this->db->query($getSQL);
			$userInfo = $queryDB->result();

			if (empty($userInfo)){
				return false;
			}
			return true;
		}


		# Set Forgot Value for User Model
		public function setForgot($userEmail, $forgotHash){
			$this->db->where('userEmail', $userEmail);
			$this->db->update('users', array("userForgot" => $forgotHash));

			return true;
		}


		# Check Forgot Hash Model
		public function checkForgotHash($forgotHash){
			$getSQL    = "SELECT * FROM users WHERE userForgot='{$forgotHash}'";
			$queryDB   = $this->db->query($getSQL);
			$hashCheck = $queryDB->result();

			if (empty($hashCheck)){
				return false;
			}
			return true;
		}


		# Set Forgot Password Value for User Model
		public function setForgotPassword($userInfo){

			$this->db->where('userForgot', $userInfo['forgotID']);
			$this->db->update('users', array("userPassword" => md5($userInfo['userPassword']), "userForgot" => NULL));

			return true;
		}


	}
