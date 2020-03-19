<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Log_model extends CI_model{


		# Create Log Function
		public function create($logInfo){
			if($this->db->insert('logs', $logInfo)){
				return true;
			}
			else {
				return false;
			}
		}


		# Get Logs Info Model
		public function get($logType = 'users'){
			$logInfo = NULL;

			switch ($logType) {
				case 'accounts':
					$getSQL = "SELECT * FROM logs WHERE logType='accounts' ORDER BY logID DESC";
					break;
				case 'admin':
					$getSQL = "SELECT * FROM logs WHERE logType='admin' ORDER BY logID DESC";
					break;
				case 'entries':
					$getSQL = "SELECT * FROM logs WHERE logType='entries' ORDER BY logID DESC";
					break;
				case 'users':
					$getSQL = "SELECT * FROM logs WHERE logType='users' ORDER BY logID DESC";
					break;
			}

			$queryDB = $this->db->query($getSQL);
			$logInfo = $queryDB->result();
			return $logInfo;
		}


	}
