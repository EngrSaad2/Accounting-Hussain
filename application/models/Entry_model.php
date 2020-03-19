<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Entry_model extends CI_model{

		public $userID;
		public $userRole;

		public function __construct(){
			$this->userID = (int)$this->session->userdata('userID');
			$this->userRole = (int)$this->session->userdata('userRole');
		}


		# Get Entry(s) Info Model
		public function getEntries($entryID = NULL){
			$entryInfo = NULL;
			
			if ($entryID == NULL){
				if($this->userRole == 10)

					$getSQL = "SELECT * FROM entries ORDER BY entryCreateDate ASC";

					else

					$getSQL = "SELECT * FROM entries WHERE created_by = {$this->userID} ORDER BY entryCreateDate DEsc";
			}
			else {
				if($this->userRole == 10)
						$getSQL = "SELECT * FROM entries WHERE entryID='{$entryID}'";

					else
				$getSQL = "SELECT * FROM entries WHERE entryID='{$entryID}' AND created_by = {$this->userID}";
			}

			$queryDB   = $this->db->query($getSQL);
			$entryInfo = $queryDB->result();
			return $entryInfo;
		}


		# Create Entry Model
		public function createEntry($entryInfo){
			$entryInfo['entryDebitAccount'] = json_encode($entryInfo['entryDebitAccount']);
			$entryInfo['entryDebitBalance'] = json_encode($entryInfo['entryDebitBalance']);
			$entryInfo['entryCreditAccount'] = json_encode($entryInfo['entryCreditAccount']);
			$entryInfo['entryCreditBalance'] = json_encode($entryInfo['entryCreditBalance']);
			if ($this->db->insert('entries', $entryInfo)){
				return $this->db->insert_id();
			}
			return false;
		}


		# Approve Entry Model
		public function approveEntry($entryID, $debitAccounts, $creditAccounts){
			$entryInfo = (array) $this->getEntries($entryID)[0];

			foreach ($debitAccounts as $account){
				$balance = $account[key($account)];
				$account = key($account);

				$accountDebitInfo    = (array) $this->account_model->getAccounts($account)[0];
				$accountDebitBalance = $accountDebitInfo['accountDebit'];

				$accountInfo = array('accountDebit' => ($balance + $accountDebitBalance));
				$this->db->where('accountID', $account);
				$this->db->update('accounts', $accountInfo);
			}

			foreach ($creditAccounts as $account){
				$balance = $account[key($account)];
				$account = key($account);

				$accountCreditInfo    = (array) $this->account_model->getAccounts($account)[0];
				$accountCreditBalance = $accountCreditInfo['accountCredit'];

				$accountInfo = array('accountCredit' => ($balance+$accountCreditBalance));
				$this->db->where('accountID', $account);
				$this->db->update('accounts', $accountInfo);
			}

			$entryInfo = array('entryStatus' => 1);
			$this->db->where('entryID', $entryID);
			$this->db->update('entries', $entryInfo);

			return true;
		}


		# Reject Entry Model
		public function rejectEntry($entryID, $rejectReason){
			$entryInfo = array('entryStatusComment' => $rejectReason);

			$this->db->where('entryID', $entryID);
			$this->db->update('entries', $entryInfo);

			return true;
		}


		# Get Accounts(s) Info Model
		public function getAccounts($accountType = NULL){
			$accountsInfo = NULL;

			switch ($accountType) {
				case "L":
					$getSQL = "SELECT * FROM accounts WHERE accountSide='L'";
					break;
				case "R":
					$getSQL = "SELECT * FROM accounts WHERE accountSide='R'";
					break;
				default:
					$getSQL = "SELECT * FROM accounts WHERE created_by = '{$this->userID}'";
					break;
			}

			$queryDB      = $this->db->query($getSQL);
			$accountsInfo = $queryDB->result();
			return $accountsInfo;
		}


		# Get Account Name Model
		public function getAccount($accountID){
		
			$getSQL      = "SELECT * FROM accounts WHERE accountID='{$accountID}'";

			$queryDB     = $this->db->query($getSQL);
			$accountInfo = (array) $queryDB->result()[0];
			return $accountInfo;

			

		}


		public function getLedger($ledgerID = NULL){
			# New Entry
			if ($ledgerID == NULL){
				$getSQL     = "SELECT * FROM ledgers WHERE ledgerCloseDate IS NULL";
				$queryDB    = $this->db->query($getSQL);
				$ledgerInfo = $queryDB->result();

				return $ledgerInfo;
			}

		}

		public function createLedger($ledgerInfo){
			if ($this->db->insert('ledgers', $ledgerInfo)){
				return $this->db->insert_id();
			}
			return false;
		}


	}
