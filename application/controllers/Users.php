<?php if(!defined('BASEPATH')) exit('no direct access script allowed');

class Users extends CI_Controller {

	public function __construct() {
		
		parent::__construct(); 
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Users_db');
		
		// to protect the controller to be accessed only by registered users
	    if(!$this->session->userdata('logged_in')){
			
			redirect('login', 'refresh');
			 		
		}

	}
		
	public function index() {
		
		$data   = array();	
		$user_data = $this->Users_db->select();
		
		if ($user_data != null) {
			
			$data['result'] = $user_data;
			$data['checking_status'] = 1;
			
		} else {
			
			$data['checking_status'] = 0;
			
		}
		
		$data['content'] = 'users';
		$this->load->view('base_view', $data);
	}

}