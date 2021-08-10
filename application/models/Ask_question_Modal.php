<?php

class Ask_question_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();
			
			$this->tbl_quick_solution="tbl_quick_solution";
	}





//------------------------ fetch data -------------------------->

	public function fetch_askque_data()
	{
		$this->db->join('customer_tbl','tbl_quick_solution.customer_id=customer_tbl.customer_id');
		$query = $this->db->get($this->tbl_quick_solution);
		$results=$query->result_array();
		return $results;
	}

//-------------------------------- End ------------------------------->

//------------------------ delete single data -------------------------->

	public function delete_single_askque($ask_id)
	{
		$query = $this->db->delete($this->tbl_quick_solution,array('ask_id'=> $ask_id));
		return $query;
	}

//-------------------------------- End ------------------------------->

//------------------------ delete single data -------------------------->

	public function changeaskquestatus($data,$ask_id)
	{
		$query = $this->db->update($this->tbl_quick_solution,$data,array('ask_id'=> $ask_id));
		return $query;
	}

//-------------------------------- End ------------------------------->
    
    
//------------------------ Get customer email  -------------------------->
    	#get service name from the database by id 
	public function getCustemailById($cust_id){
		$customer_email = $this->db->get_where('customer_tbl',array('customer_id' => $cust_id))->row()->customer_email;
		//echo $this->db->last_query();die;
		return $customer_email;
	}

//-------------------------------- End ------------------------------->
    	
}

?>