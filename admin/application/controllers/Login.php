<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Login_Modal');
	    $this->load->helper('login');
	    $this->load->library('form_validation');
	}


	#Index Page
		public function index()
		{
			if (isset($this->session->userdata('newdata')['logged_in'])) 
			{
				redirect('Home','refresh');
			} 
			$this->load->view('admin/Login');
		}

	#End
	
	#Admin Login
		public function login_admin()
		{
			$user_email=$this->input->post('uname');
			$user_password=$this->input->post('password');
			//$user_password=md5($this->input->post('password'));

			$result = $this->Login_Modal->fetch_admin($user_email,$user_password);
			if($result)
			{
				$name=$result['0'] ['admin_name'];
				$email=$result['0'] ['admin_email'];
				$pwd=$result['0'] ['admin_pwd'];
				$phno=$result['0'] ['admin_phno'];
				$is_create=$result['0'] ['is_create'];
				$is_edit=$result['0'] ['is_edit'];
				$is_delete=$result['0'] ['is_delete'];
				$is_read=$result['0'] ['is_read'];
				$admin_status=$result['0'] ['admin_status'];
				$lastdatetimelogin=$result['0'] ['lastdatetimelogin'];

				$newdata = array(
			        'admin_name'  => $name,
                    'admin_email'  => $email,
			        'admin_pwd' => $pwd,
			        'admin_phno' => $phno,
			        'is_create' => $is_create,
			        'is_edit' => $is_edit,
			        'is_delete' => $is_delete,
			        'is_read' => $is_read,
			        'admin_status' => $admin_status,
			        'lastdatetimelogin' => $lastdatetimelogin,
			        'logged_in' => TRUE
				);

				$this->session->set_userdata('newdata', $newdata);
				/* echo "<pre>";
			 	print_r($newdata);die; */
				redirect(base_url().'Home/dashboard');
			}
			else
			{
				echo "<script>alert('Invalid Login Credentials..! Please enter valid Username And Password')</script>";
				$this->load->view('admin/Login');			
			}
		}
	#End

	



	#Admin Logout
		public function logout_admin(){
			$this->session->unset_userdata('newdata');
			$this->index();
		}
	#end



}





