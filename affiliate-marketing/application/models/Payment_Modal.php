<?php
class Payment_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			//$this->tbl_testimonial="tbl_testimonial";
			$this->tbl_payment="tbl_payment";
			$this->tbl_quick_solution="tbl_quick_solution";
		    $this->customer_tbl="customer_tbl";
	}



//-------------------------------- insert data ------------------------------->

	public function add_book($data)

	{
		$query = $this->db->insert($this->tbl_books,$data);
		return $query;
	}

//-------------------------------- End ------------------------------->



//-------------------------------- testimonial get data ------------------------------->


	public function get_book_data($book_id)
	{
		$query = $this->db->get_where($this->tbl_books,array('book_id' => $book_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}

//-------------------------------- End ------------------------------->


//-------------------------------- Update ------------------------------->

	public function update_bookdata($data,$book_id)
	{
		$result = $this->db->update($this->tbl_books,$data,array('book_id' => $book_id));
		//echo $this->db->last_query();die;
		return $result;

	}

//-------------------------------- End ------------------------------->

//-------------------------------- delete ------------------------------->

public function delete_single_payment($payment_id)

	{
		$result = $this->db->delete($this->tbl_payment,array('payment_id' => $payment_id));
		//echo $this->db->last_query();die;
		return $result;
	}

//-------------------------------- End ----------------------------------------------->

    
//-------------------------------- START ---------------------------------------------->   
    #FETCH ALL CUSTOMER PAYMENT DATA BY PURCHASE BOOKN#
	public function fetch_payment_bookdata()
	{
	     $this->db->select('*');
         $this->db->from('customer_tbl a'); 
         $this->db->join('tbl_orders b', 'b.customer_id=a.customer_id');
         $this->db->join('tbl_payment c', 'c.service_ask_order_id=b.order_id');
         $this->db->join('tbl_order_details d', 'd.order_id=b.order_id');
         $this->db->join('tbl_books e', 'e.book_id=d.book_id');
         $query = $this->db->get();
         $results=$query->result_array();
		 return $results;
	}
//-------------------------------- End ------------------------------------------------> 
   
   
//-------------------------------- START ---------------------------------------------->     
    #FETCH ALL CUSTOMER PAYMENT DATA BY ASK QUESTION/QUICK SOLUTION#
	public function fetch_payment_askquedata()
	{
         $this->db->select('*');
         $this->db->from('customer_tbl a'); 
         $this->db->join('tbl_quick_solution b', 'b.customer_id=a.customer_id');
         $this->db->join('tbl_payment c', 'c.service_ask_order_id=b.ask_id');
         $query = $this->db->get();
         $results=$query->result_array();
		 return $results;
	}
//-------------------------------- End ----------------------------------------------->

//-------------------------------- START ---------------------------------------------> 	
	#FETCH ALL CUSTOMER PAYMENT DATA BY SERVICE
	public function fetch_payment_servicedata()
	{
         $this->db->select('*');
         $this->db->from('customer_tbl a'); 
         $this->db->join('tbl_service_details b', 'b.customer_id=a.customer_id');
         $this->db->join('tbl_payment c', 'c.service_ask_order_id=b.service_details_id');
         $this->db->join('tbl_service d', 'd.service_id=b.service_id');
         $query = $this->db->get();
         $results=$query->result_array();
		 return $results;
	}
//-------------------------------- End ------------------------------->	



}

?>