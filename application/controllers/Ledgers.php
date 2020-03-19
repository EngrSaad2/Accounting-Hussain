<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ledgers extends CI_Controller{


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('entry_model');
			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Ledgers Index Function
		public function index($accountID = NULL){
			if ($accountID != NULL){
				$data['title']       = 'Ledgers | General Ledger: #'.$accountID;
				$data['accountList'] = $this->account_model->getAccounts($accountID);
			}
			else {
				$data['title']       = 'Ledgers | List of Ledgers';
				$data['accountList'] = $this->account_model->getAccounts();
			}
			$data['userData']   = $this->session->userdata();
			$data['entryList']  = $this->entry_model->getEntries();
			$this->load->template('ledgers/home', $data);
		}
	}
