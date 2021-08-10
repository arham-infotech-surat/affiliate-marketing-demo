<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {



	public function __construct(){

		parent:: __construct();
		// $this->load->library('session');
	    $this->load->model('Login_Modal');

	    $this->load->helper('login');

	    $this->load->library('form_validation');

	    $this->admintable="admintable";
		

	}







//--------------------------------------------- Index Page --------------------------------------->

	public function index()

	{

		// $data['result'] = $this->changePassword_Modal->fetch_password();

		if (isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Home','refresh');

		} 

		$this->load->view('admin/Login');

	}

//--------------------------------------------- End ----------------------------------------------->

//----------------- Login User -------------------------------->

		public function login_admin()

		{

			$user_email=$this->input->post('uname');

			$user_password=md5($this->input->post('password'));

			

			$result = $this->Login_Modal->fetch_admin($user_email,$user_password);

			if($result)

			{

				$name=$result['0'] ['name'];
				
				$uname=$result['0'] ['username'];
				
				$email=$result['0'] ['email_id'];

				$pwd=$result['0'] ['password'];

				$control=$result['0'] ['control'];

				$ipaddress=$result['0'] ['ipaddress'];

				$lastdatetimelogin=$result['0'] ['lastdatetimelogin'];

				



				$newdata = array(

			        'name'  => $name,
					
			        'username'  => $uname,
                
                    'email_id'  => $email,
                    
			        'password' => $pwd,

			        'control' => $control,

			        'ipaddress' => $ipaddress,

			        'lastdatetimelogin' => $lastdatetimelogin,

			        'logged_in' => TRUE

				);



				$this->session->set_userdata('newdata', $newdata);

			 	//print_r($newdata);



				redirect(base_url().'Home/dashboard');

			}

			else

			{

				echo "<script>alert('Invalid Login Credentials..! Please enter valid Username And Password')</script>";

				$this->load->view('admin/Login');			

			}

			

		}

	//-------------------------- End -------------------------------->

	



//--------------------- Logout Code ------------------------>	

	public function logout_admin(){

		$this->session->unset_userdata('newdata');

		$this->index();

	}

//------------------------- End ------------------------------>



}





