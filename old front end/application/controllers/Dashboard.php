<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{	
	public function __construct(){		
		parent:: __construct();	    		
		if (!isset($this->session->userdata('newdata')['logged_in'])) 		
		{			
			redirect('Login','refresh');		
		} 	
}	

	public function index()	
	{			 		
		$this->load->view('admin/header');		
		$this->load->view('admin/dashboard');		
		$this->load->view('admin/footer');	
	}
}