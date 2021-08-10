<?php
class Inquiry_Modal extends CI_Model {

    

	function __construct() {
			parent::__construct();
			//$this->tbl_testimonial="tbl_testimonial";
			$this->tbl_inquiry="tbl_inquiry";
	}





//------------------------ fetch testimonial data -------------------------->

	public function fetch_inquirydata()
	{
		$this->db->join('customer_tbl','customer_tbl.customer_id = tbl_inquiry.customer_id');
		$this->db->join('tbl_service','tbl_service.service_id = tbl_inquiry.service_id');  
		$query = $this->db->get($this->tbl_inquiry);
		$results=$query->result_array();
		return $results;
	}
	
	public function fetch_inquirydetails($inquiry_id)
	{ 
		$query = $this->db->get_where($this->tbl_inquiry,array('inquiry_id' => $inquiry_id));
		$results=$query->result_array();
		return $results;
	}

//-------------------------------- End ------------------------------->



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

	public function delete_single_inquiry($inquiry_id)
	{
		$result = $this->db->delete($this->tbl_inquiry,array('inquiry_id' => $inquiry_id));
		//echo $this->db->last_query();die;
		return $result;
	}

//-------------------------------- End ------------------------------->


    public function changeinquirystatus($data,$inquiry_id)
	{
		$query = $this->db->update($this->tbl_inquiry,$data,array('inquiry_id' => $inquiry_id));
		//echo $this->db->last_query();die;
		//$result = $query->result_array();
		return $query;
	}
	



}

?>