<?php

class Login_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();

			

			$this->admin_user="admin_user";

			

	}



//------------------------ fetch admin data -------------------------->

	public function fetch_password()

	{

		$query = $this->db->get($this->admin_user);

		$results=$query->result_array();

		return $results;

	}

//-------------------------------- End ------------------------------->

//---------------------- login model ---------------->

	public function fetch_admin($email,$password){

		$query = $this->db->get_where($this->admin_user,array('username' => $email,'password' => $password));

		$result = $query->result_array();

			

		if($query->num_rows() > 0) {  

        	return $result;  

        }  

	   	else {  

	    	return false;       

	  	}  

	}

	//-------------------------- End --------------------->





}

?>