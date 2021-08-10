<?php
class Order_Modal extends CI_Model {

    

	function __construct() {
			parent::__construct();
			//$this->tbl_testimonial="tbl_testimonial";
			$this->tbl_orders="tbl_orders";
	}





//------------------------ fetch testimonial data -------------------------->

	public function fetch_orderdata()
	{
// 		$this->db->join('tbl_books','tbl_books.book_id = tbl_order_details.book_id');
// 		$this->db->join('customer_tbl','customer_tbl.customer_id = tbl_orders.customer_id');  
// 		$query = $this->db->get($this->tbl_order_details);

    	$this->db->join('tbl_order_details','tbl_orders.order_id=tbl_order_details.order_id');
		$this->db->join('tbl_books','tbl_books.book_id=tbl_order_details.book_id');
		$this->db->join('customer_tbl','customer_tbl.customer_id = tbl_orders.customer_id');  
		$query = $this->db->get($this->tbl_orders);
		
	//	$query = $this->db->get_where($this->tbl_orders,array('customer_id' => $customer_id));
		$results=$query->result_array();
	//	echo $this->db->last_query();
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

public function delete_single_payment($payment_id)

	{
		$result = $this->db->delete($this->tbl_payment,array('payment_id' => $payment_id));
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