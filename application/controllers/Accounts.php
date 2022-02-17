<?php
defined('BASEPATH') OR exit('No direct script access allowed');...................................................................................

	class Accounts extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Account Index Function
		public function index(){
			$data['userData']    = $this->session->userdata();
			$data['title']       = 'Accounts | List of Accounts';
			$data['accountList'] = $this->account_model->getAccounts();
			$this->load->template('accounts/home', $data);
		}


		# Create Account Info Function
		public function create(){
			$data['title']    = "Accounts | Create Account";
			$data['userData'] = $this->session->userdata();

			if (!empty($this->input->post())){
				$accountCreateValidation = $this->form_validation->run();
				$_POST['created_by'] = (int)$this->session->userdata('userID');
				if($accountCreateValidation){
					$_POST['userID'] = $data['userData']['userID'];
					$createCheck = $this->account_model->createAccount($_POST);
					if ($createCheck){
						$this->session->set_flashdata('success', 'You have successfully created an account.');
						redirect('accounts');
					}
					else {
						$this->session->set_flashdata('danger', 'Something internally happened. Please try again.');
						$this->load->template('accounts/create', $data);
					}
				}
				else {
					$this->load->template('accounts/create', $data);
				}
			}
			else {
				$this->load->template('accounts/create', $data);
			}
		}


		# Account Edit Function
		public function edit($accountID){
			$getSQL       = "SELECT * FROM accounts WHERE accountID = '{$accountID}'";
			$queryDB      = $this->db->query($getSQL);
			$accountCheck = $queryDB->result();

			if (empty($accountCheck)) {
				$this->session->set_flashdata('danger', 'The account you attempted to edit does not exist.');
				redirect('accounts');
			}

			$data['userData']    = $this->session->userdata();
			$data['title']       = 'Accounts | Edit Account';
			$data['accountData'] = (array) $this->account_model->getAccounts($accountID)[0];

			# Default Edit View
			if (empty($_POST)){
				$this->load->template('accounts/edit', $data);
			}
			# Delete Account Form Submitted
			elseif (array_key_exists('delete', $_POST) && $_POST['delete'] == 'Y'){
				$deletedAccountID = $data['accountData']['accountID'];
				$deleteCheck      = $this->account_model->accountDelete($deletedAccountID);
				if ($deleteCheck){
					$this->session->set_flashdata('success', 'You have successfully delete the account: #'.$deletedAccountID.'.');
					redirect('accounts');
				}
				else {
					$this->session->set_flashdata('danger', 'Internal error. Please try again.');
					$this->load->template('admin/edit', $data);
				}
			}
			# Edit Account Form Submitted
			else{
				$_POST['accountID'] = $data['accountData']['accountID'];

				$accountChange = $this->account_model->accountEdit($_POST);
				if (!$accountChange){
					$this->session->set_flashdata('danger', 'Something strange happened. Please try again.');
					redirect('accounts');
				}
				else {
					$logInfo = array(
						'userID'    => $data['userData']['userID'],
						'logType'   => 'accounts',
						'logBefore' => json_encode($data['accountData']),
						'logAfter'  => json_encode($_POST),
					);
					$this->log_model->create($logInfo);
					$this->session->set_flashdata('success', 'You have successfully updated Account: #'.$data['accountData']['accountID']);
					redirect('accounts');
				}
			}
		}

		function is_uniqueName() {
			$id = $this->session->userdata('userID');
			$oldData = $this->db->where('accountName', $_POST['accountName'])->where('userID', $id)->get('accounts')->num_rows();
		
	        if ($oldData == 0) {
	            return true;
	        }
	        else{
	        	$this->form_validation->set_message('is_uniqueName', '');
	            return false;
	        }
	    }


		function is_uniqueId() {
			$id = $this->session->userdata('userID');
			$oldData = $this->db->where('accountID', $_POST['accountID'])->where('userID', $id)->get('accounts')->num_rows();
		
	        if ($oldData == 0) {
	            return true;
	        }
	        else{
	        	$this->form_validation->set_message('is_uniqueId', '');
	            return false;
	        }
	    }
	}
