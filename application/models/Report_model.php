<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Report_model extends CI_model{
		public $userID;
		public $userRole;

		public function __construct(){
			$this->userID = (int)$this->session->userdata('userID');
			$this->userRole = (int)$this->session->userdata('userRole');
		}


		# Get Accounts(s) Info Model
		public function getAccounts($reportType){
			$accountInfo = NULL;
			$userID = (int)$this->session->userdata('userID');
			switch ($reportType) {
				case 'trialBalance':
					$getSQL = "SELECT * FROM accounts WHERE (accountDebit > 0 OR accountCredit > 0) AND created_by = {$this->userID} ORDER BY accountCategory ASC";
					break;
				case 'balanceSheet':
					$getSQL = "SELECT * FROM accounts WHERE accountStatement = 'Balance Sheet' AND ((accountDebit > 0 OR accountCredit > 0)) AND created_by = {$this->userID} ORDER BY accountOrder";
					break;
					case 'incomeStatement':
						$getSQL = "SELECT * FROM accounts WHERE (accountStatement = 'Income Statement' AND (accountDebit > 0 OR accountCredit > 0)) AND created_by = {$this->userID} ORDER BY accountOrder DESC";
						break;
					case 'retainedEarnings':
						$getSQL = "SELECT * FROM accounts WHERE (accountStatement = 'Income Statement' AND (accountDebit > 0 OR accountCredit > 0)) AND created_by = {$this->userID} ORDER BY accountOrder DESC";
						break;
				default:
					$getSQL = "SELECT * FROM accounts";
					break;
			}
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();
			return $accountInfo;
		}


	}
