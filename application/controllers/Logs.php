<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Logs extends CI_Controller {


		# Default Constructor Function
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');

			$userID = $this->session->userdata('userID');
			if (!$userID){
				redirect('users/login');
			}
		}


		# Logs Index Function
		public function index($logType = 'users'){
			$data['userData'] = $this->session->userdata();
			$data['title']    = 'Logs | Home';
			$data['logList']  = $this->log_model->get($logType);
			$data['logType']  = $logType;
			$this->load->template('logs/home', $data);
		}


	}
