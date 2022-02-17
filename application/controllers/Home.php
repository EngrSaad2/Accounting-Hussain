<?php
defined('BASEPATH') OR exit('No direct script access allowed');................................
class Home extends CI_Controller {


	# Default Constructor Function
	public function __construct(){
		parent::__construct();
	}


	# Home Index Function
	public function index(){
		$data['title'] = 'Accounting @ Hussain | Home';
		$this->load->model('ratio_model');

		$userID = $this->session->userdata('userID');
		if (!$userID){
			redirect('users/login');
		}

		$data['userData'] = $this->session->userdata();
		$data['assetsTotal']      = $this->account_model->getAccountCategoryTotal('Assets');
		$data['liabilitiesTotal'] = $this->account_model->getAccountCategoryTotal('Liabilities');
		$data['cashandbankTotal'] = $this->account_model->getCashAndBankTotal('Liabilities');
		$data['entriesTotal']        = $this->account_model->getEntryTotal('all');
		$data['entriesPendingTotal'] = $this->account_model->getEntryTotal('pending');
		$data['quickRatio']         = $this->ratio_model->quickRatio();
		$data['currentRatio']       = $this->ratio_model->currentRatio();
		$data['debtRatio']          = $this->ratio_model->debtRatio();
		$data['returnOnEquityRatio'] = $this->ratio_model->returnOnEquityRatio();
		$data['returnOnAssetsRatio'] = $this->ratio_model->returnOnAssetsRatio();
		$data['assetTurnoverRatio']  = $this->ratio_model->assetTurnoverRatio();
		$this->load->template('home', $data);
	}


	# Logout Function
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


}
