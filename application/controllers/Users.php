<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();

			$userID = $this->session->userdata('userID');
			if ($userID){
				redirect('profile');
			}
		}


		# User Index Function
		public function index(){
			$data['userData'] = $this->session->userdata();
			$this->load->template('users/home', $data);
		}


		# Register User Function
		public function register(){
			$data['title'] = "User Registration";

			$registerInfo = array(
				'userFirstName'     => $this->input->post('userFirstName'),
				'userLastName'      => $this->input->post('userLastName'),
				'userEmail'         => $this->input->post('userEmail'),
				'userPassword'      => md5($this->input->post('userPassword')),
				'userPrevPassword'  => json_encode(array(md5($this->input->post('userPassword')))),
			);

			$registerValidation = $this->form_validation->run();

			if ($registerValidation) {
				$userRegistration = $this->user_model->userRegister($registerInfo);
				if ($userRegistration){
					$this->session->set_flashdata('success', 'You have successfully registered. Please wait to be authorized by an Administrator.');
					redirect('users/login');
				}
				else {
					$this->session->set_flashdata('danger', 'Something has happened internally. Please try again.');
					$this->load->template('users/register', $data);
				}
			}
			else {
				$this->load->template('users/register', $data);
			}
		}


		# User Login Function
		public function login(){
			$data['title'] = "User Login";

			$email    = $this->input->post('userEmail');
			$password = md5($this->input->post('userPassword'));

			if (!empty($email)){
				$loginUser = $this->user_model->userLogin($email, $password);

				if ($loginUser){
					$userInfo = (array) $loginUser[0];

					if ($userInfo['userActive'] != 0){
						$username = $userInfo['userFirstName'][0].$userInfo['userLastName'].date('m',strtotime($userInfo['userCreationDate'])).date('y',strtotime($userInfo['userCreationDate']));

						$this->session->set_userdata(array(
							'userID'        => $userInfo['userID'],
							'userName'      => $username,
							'userFirstName' => $userInfo['userFirstName'],
							'userLastName'  => $userInfo['userLastName'],
							'userEmail'     => $userInfo['userEmail'],
							'userRole'      => $userInfo['userRole']
						));

						$this->session->set_flashdata('success', 'You have successfully logged in.');
						redirect();
					}
					else {
						$this->session->set_flashdata('danger', 'Your account is currently deactivated. Please wait for an Administrator to reactivate your account.');
						$this->load->template('users/login', $data);
					}
				}
				else {
					$userAttemptedLogin = $this->user_model->userLoginAttempt($email);
					if ($userAttemptedLogin){
						$this->session->set_flashdata('danger', 'Your email/password combination was not correct Please try again.');
						$this->load->template('users/login', $data);
					}
					else {
						$this->session->set_flashdata('danger', 'You have tried to login too many times! Please wait for an Administrator to reactivate your account.');
						$this->load->template('users/login', $data);
					}
				}
			}
			else {
				$this->load->template('users/login', $data);
			}
		}


		# User Logout Function
		public function logout(){
			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
			else{
				$this->session->sess_destroy();
				redirect('users/login');
			}
		}


		# User Forgot function
		public function forgot(){
			$data['title'] = "User Forgot";

			$email      = $this->input->post('userEmail');
			$forgotHash = bin2hex(random_bytes(16));
			if (!empty($email)){
				$this->user_model->setForgot($email, $forgotHash);

				$this->session->set_flashdata('success', 'Please expect an email with further instructions to the provided email shortly.');
				redirect('users/login');
			}
			else {
				$this->load->template('users/forgot', $data);
			}
		}


		# User Forgot Confirm function
		public function forgotConfirm($forgotHash = NULL){
			$data['title']      = "User Forgot | Confirm";
			$data['forgotHash'] = $forgotHash;

			$forgotCheck = $this->user_model->checkForgotHash($forgotHash);

			if ($forgotCheck){
				if (!empty($_POST)){
					$forgotPasswordValidation = $this->form_validation->run();
					if ($forgotPasswordValidation){
						$this->user_model->setForgotPassword($_POST);
						$this->session->set_flashdata('success', 'You have reset your password successfully.');
						redirect('users/login');
					}
					else{
						$this->load->template('users/forgotConfirm', $data);
					}
				}
				else {
					$this->load->template('users/forgotConfirm', $data);
				}
			}
			else {
				redirect('users/login');
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
