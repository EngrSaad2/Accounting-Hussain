<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ratio_model extends CI_model{

		public $userID;
		public $userRole;

		public function __construct(){
			$this->userID = (int)$this->session->userdata('userID');
			$this->userRole = (int)$this->session->userdata('userRole');
		}

        # Get Quick Ratio Model
		public function quickRatio(){
			$getSQL = "SELECT * FROM accounts WHERE (accountName='Cash' OR accountName='Accounts Receivable') AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategorySub='Current Liabilities' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentLiabilities = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentLiabilities += $account['accountCredit'] - $account['accountDebit'];
			}

			if($currentLiabilities == 0) return 0;
			return $currentAssets / $currentLiabilities;
        }
        

        # Get Current Ratio Model
		public function currentRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountCategorySub='Current Assets' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategorySub='Current Liabilities' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$currentLiabilities = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$currentLiabilities += $account['accountCredit'] - $account['accountDebit'];
			}
			if($currentLiabilities == 0) return 0;
			return $currentAssets / $currentLiabilities;

        }
        

        # Get Debt Ratio Model
        public function debtRatio(){
            $getSQL = "SELECT * FROM accounts WHERE accountCategory='Assets' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalAssets += $account['accountDebit'] - $account['accountCredit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Liabilities' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalLiabilities = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalLiabilities += $account['accountCredit'] - $account['accountDebit'];
			}
			if($totalAssets == 0) return 0;
			return $totalLiabilities / $totalAssets;
		}
		

		# Get Return On Equity Ratio Model
		public function returnOnEquityRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountStatement = 'Income Statement' AND (accountDebit > 0 OR accountCredit > 0) AND created_by = {$this->userID} ORDER BY accountCategory DESC";
			$queryDB = $this->db->query($getSQL);
			$accountList = $queryDB->result();

			$accounts = array();

			$revenueTotal  = 0;
			$expensesTotal = 0;

			foreach ($accountList as $account){
				$account = (array) $account;

				if (!isset($accounts[$account['accountCategory']])){
					$accounts[$account['accountCategory']] = array($account);
				}
				else {
					array_push($accounts[$account['accountCategory']], $account);
				}
			}

			$accountCategories = array_keys($accounts);
			$accountOrder = 0;
			foreach ($accounts as $accountCategory){
				foreach ($accountCategory as $account){
					$accountBalance = $account['accountDebit'] - $account['accountCredit'];
					if ($account['accountCategory'] == 'Revenues'){
						$revenueTotal += $accountBalance;
					}
					else {
						$expensesTotal += $accountBalance;
					}
				}
				if ($accountCategories[$accountOrder] == 'Revenues'){
					$accountAmount = number_format(abs($revenueTotal), 2);
				}
				else {
					$accountAmount = number_format(abs($expensesTotal), 2);
				}
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Owners Equity'";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalEquity = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalEquity += $account['accountCredit'] - $account['accountDebit'];
			}
				if($totalEquity == 0) return 0;
			return (abs($revenueTotal) - $expensesTotal) / $totalEquity;
		}


		# Get Return On Assets Ratio Model
		public function returnOnAssetsRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountStatement = 'Income Statement' AND (accountDebit > 0 OR accountCredit > 0) AND created_by = {$this->userID} ORDER BY accountCategory DESC";
			$queryDB = $this->db->query($getSQL);
			$accountList = $queryDB->result();

			$accounts = array();

			$revenueTotal  = 0;
			$expensesTotal = 0;

			foreach ($accountList as $account){
				$account = (array) $account;

				if (!isset($accounts[$account['accountCategory']])){
					$accounts[$account['accountCategory']] = array($account);
				}
				else {
					array_push($accounts[$account['accountCategory']], $account);
				}
			}

			$accountCategories = array_keys($accounts);
			$accountOrder = 0;
			foreach ($accounts as $accountCategory){
				foreach ($accountCategory as $account){
					$accountBalance = $account['accountDebit'] - $account['accountCredit'];
					if ($account['accountCategory'] == 'Revenues'){
						$revenueTotal += $accountBalance;
					}
					else {
						$expensesTotal += $accountBalance;
					}
				}
				if ($accountCategories[$accountOrder] == 'Revenues'){
					$accountAmount = number_format(abs($revenueTotal), 2);
				}
				else {
					$accountAmount = number_format(abs($expensesTotal), 2);
				}
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Assets' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalAssets += $account['accountDebit'] - $account['accountCredit'];
			}
			if($totalAssets == 0) return 0;
			return (abs($revenueTotal) - $expensesTotal) / $totalAssets;
		}


		# Get Asset Turnover Ratio Model
		public function assetTurnoverRatio(){
			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Revenues' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalRevenue = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalRevenue += $account['accountCredit'] - $account['accountDebit'];
			}

			$getSQL = "SELECT * FROM accounts WHERE accountCategory='Assets' AND created_by = {$this->userID}";
			$queryDB = $this->db->query($getSQL);
			$accountInfo = $queryDB->result();

			$totalAssets = 0.00;

			foreach ($accountInfo as $account){
				$account = (array) $account;
				$totalAssets += $account['accountDebit'] - $account['accountCredit'];
			}
			if($totalAssets == 0) return 0;
			return $totalRevenue / $totalAssets;
		}

    }