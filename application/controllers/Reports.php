<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Reports extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('report_model');

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Reports Trial Balance Function
		public function trialbalance(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Reports | Trial Balance';
			$data['accountList'] = $this->report_model->getAccounts("trialBalance");
			$this->load->template('reports/trialbalance', $data);
		}


		# Reports Income Statement Function
		public function incomestatement(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Reports | Income Statement';
			$data['accountList'] = $this->report_model->getAccounts("incomeStatement");
			$this->load->template('reports/incomestatement', $data);
		}


		# Reports Balance Sheet Function
		public function balanceSheet(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Reports | Balance Sheet';
			$data['accountList'] = $this->report_model->getAccounts("balanceSheet");
			$data['retainedEarningsList'] = $this->report_model->getAccounts("retainedEarnings");
			$this->load->template('reports/balancesheet', $data);
		}


		# Reports Retained Earnings Function
		public function retainedearnings(){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Reports | Retained Earnings';
			$data['accountList'] = $this->report_model->getAccounts("retainedEarnings");
			$this->load->template('reports/retainedearnings', $data);
		}


	}
