<?php
class Customer_Modal extends CI_Model {

    

	function __construct() {
			parent::__construct();
			//$this->tbl_testimonial="tbl_testimonial";
			$this->customer_tbl="customer_tbl";
			$this->customers="customers";
			$this->customer_addresses="customer_addresses";
	}


	public function add_customer_data($data_1)
	{
		// echo "hii"; die;
		$query = $this->db->insert($this->customers,$data_1);
		return $this->db->insert_id();
	}

	public function add_customer_addresses($insert_data)
	{
		$query = $this->db->insert_batch($this->customer_addresses,$insert_data);
	    return $query;
	}



//------------------------ fetch testimonial data -------------------------->

	public function fetch_customerdata()
	{
		//echo "heeee";
		//$this->db->join('tbl_city','tbl_city.city_id = customer_tbl.city_id'); 
		$query = $this->db->get($this->customer_tbl);
		$results=$query->result_array();
		//echo $this->db->last_query($results);die;
		return $results;
	}
	
	public function fetch_custdetails($customer_id)
	{
		$query = $this->db->get_where($this->customer_tbl,array('customer_id' => $customer_id));
		//echo $this->db->last_query();die;
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

public function delete_single_customer($customer_id)

	{
		$result = $this->db->delete($this->customer_tbl,array('customer_id' => $customer_id));
		//echo $this->db->last_query();die;
		return $result;
	}

//-------------------------------- End ------------------------------->



	public function testimonial_MultipleDeleted($delIds){

	if ($delIds) {

        for ($i = 0; $i < count($delIds); $i++)

        {

	        $this->db->where('testimonial_id', $delIds[$i]);

	        $this->db->delete($this->tbl_testimonial);

        }

	}

    redirect('Testimonial/view_testimonial');

	}



}

?>