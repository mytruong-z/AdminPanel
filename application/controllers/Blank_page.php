<?php if(!defined('BASEPATH')) exit('no direct access script allowed');

class Blank_Page extends CI_Controller {

	public function __construct() {
		
		parent::__construct(); 
		$this->load->helper('url');
		$this->load->library('session');
		
		// to protect the controller to be accessed only by registered users
	    if(!$this->session->userdata('logged_in')){
			
			redirect('login', 'refresh');
			 		
		}

	}
		
	public function index() {
		
		$data['content'] = 'blank_page1';
		$this->load->view('base_view', $data);
		
	}
	
	public function blank_page1() {
				
		$data['content'] = 'blank_page1';
		$this->load->view('base_view', $data);
	}
	
	public function blank_page2() {
		
		$data['content'] = 'blank_page2';
		$this->load->view('base_view', $data);
	}

}