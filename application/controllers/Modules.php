<?php if(!defined('BASEPATH')) exit('no direct access script allowed');

class Modules extends CI_Controller {

	public function __construct() {
		
		parent::__construct(); 
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Modules_db');
		
		// to protect the controller to be accessed only by registered users
	    if(!$this->session->userdata('logged_in')){
			
			redirect('login', 'refresh');
			 		
		}

	}
		
	public function index() {
		
		$data   = array();	
		$module_data = $this->Modules_db->select();
		
		if ($module_data != null) {
			
			$data['result'] = $module_data;
			$data['checking_status'] = 1;
			
		} else {
			
			$data['checking_status'] = 0;
			
		}
				
		$data['content'] = 'modules';
		$this->load->view('base_view', $data);
	
	}

}