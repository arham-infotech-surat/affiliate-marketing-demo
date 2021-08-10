<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class About extends CI_Controller {



	public function __construct(){

		parent:: __construct();

	   // $this->load->model('Favicon_Modal');

	   //$this->load->library('form_validation');

		/*if (!isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Login','refresh');

		} */

	   // $this->tbl_page="tbl_page";

	}



//--------------------------------------------- Index Page --------------------------------------->

	public function index()

	{

		//echo "hii";die;

		//$data['result'] = $this->Favicon_Modal->fetch_pages();

		$this->load->view('about');

	}

//--------------------------------------------- End ----------------------------------------------->


}





