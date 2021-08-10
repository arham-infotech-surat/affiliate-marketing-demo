<?php

class Login_Modal extends CI_Model {
	function __construct() {
			parent::__construct();
			$this->tbl_admin="tbl_admin";
	}



//------------------------ fetch admin data -------------------------->

	public function fetch_password()

	{

		$query = $this->db->get($this->tbl_admin);

		$results=$query->result_array();

		return $results;

	}

//-------------------------------- End ------------------------------->

	#Admin Login
		public function fetch_admin($email,$password){
			$query = $this->db->get_where($this->tbl_admin,array('admin_email' => $email,'admin_pwd' => $password));
			$result = $query->result_array();
			
			if($query->num_rows() > 0) {  
				return $result;  
			}  
			else {  
				return false;       
			}  
		}
	#End
}

?>