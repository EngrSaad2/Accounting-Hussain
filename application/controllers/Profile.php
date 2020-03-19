<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	# Default Constructor Function
	public function __construct(){
		parent::__construct();

		$userID = $this->session->userdata('userID');
		if (!$userID){
			redirect('users/login');
		}
	}


	# Profile Index Function
	public function index(){
		$data['title']    = 'Profile | Home';
		$data['userData'] = $this->session->userdata();
		$this->load->template('profile/home', $data);
	}


	# Edit Profile Function
	public function edit(){
		$data['title']    = 'Profile | Edit';
		$data['userData'] = $this->session->userdata();

		# Default Edit View
		if (empty($_POST)){
			$this->load->template('profile/edit', $data);
		}
		else {
			$_POST['userID'] = $data['userData']['userID'];

			if (!array_key_exists('userPassword', $_POST) || $_POST['userPassword'] == ''){
				unset($_POST['userPassword']);
			}
			else {
				$_POST['userPassword']        = md5($_POST['userPassword']);
				$_POST['userPasswordConfirm'] = md5($_POST['userPasswordConfirm']);
			}

			if ($_POST['userPassword'] != $_POST['userPasswordConfirm']){
				$this->session->set_flashdata('danger', 'The passwords did not match.');
				$this->load->template('profile/edit', $data);
			}

			$editValidation = $this->form_validation->run();
			if ($editValidation){
				unset($_POST['userPasswordConfirm']);
				$userChange = $this->user_model->userEdit($_POST);
				if (!$userChange){
					$this->session->set_flashdata('danger', 'Something strange happened. Please try again.');
					$this->load->template('profile/edit', $data);
				}
				else {
					unset($data['userData']['__ci_last_regenerate']);
					$logInfo = array(
						'userID'    => $data['userData']['userID'],
						'logType'   => 'users',
						'logBefore' => json_encode($data['userData']),
						'logAfter'  => json_encode($_POST),
					);
					$this->log_model->create($logInfo);

					$this->session->set_userdata(array(
						'userFirstName' => $_POST['userFirstName'],
						'userLastName'  => $_POST['userLastName'],
						'userEmail'     => $_POST['userEmail']
					));

					$this->session->set_flashdata('success', 'You have successfully updated your information.');
					redirect('profile');
				}
			}
			else {
				$this->load->template('profile/edit', $data);
			}
		}
	}


	# Password Requirement Callback Function
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


	# Password Unique Callback Function
	public function password_unique($password){
		$userData = $this->session->userdata();

		$getSQL   = "SELECT * FROM users WHERE userid='{$userData['userID']}'";
		$queryDB  = $this->db->query($getSQL);
		$userInfo = $queryDB->result();

		$userInfo = (array) $userInfo[0];

		if (!in_array($password, json_decode($userInfo['userPrevPassword']))){
			return true;
		}
		return false;
	}

}
