<?php

class Orders_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->orders="orders";
			$this->order_products="order_products";
			$this->order_statuses="order_statuses";
			$this->products="products";
	}

	#Fetch Order
	public function get_order_data()
	{
		$this->db->join('customers', 'customers.customer_id  = orders.customer_id');
		$query = $this->db->get($this->orders);
		$results=$query->result_array();
		return $results;
	}
	
	#Fetch Order Product
	public function fetchProduct_order_data()
	{
		$this->db->join('products', 'products.product_id  = order_products.product_id ');
		$query = $this->db->get($this->order_products);
		$results=$query->result_array();
		return $results;
	}
	
	#Fetch Order Product
	public function fetchStatus_order_data()
	{
		//$this->db->join('customers', 'customers.customer_id  = orders.customer_id');
		$query = $this->db->get($this->order_statuses);
		$results=$query->result_array();
		return $results;
	}
	
	# Add order data
	public function add_order_data($data_1)
	{
		// echo "hii"; die;
		$query = $this->db->insert($this->orders,$data_1);
		return $this->db->insert_id();
		// echo $this->db->last_query($results);die;
	}
	
	# Add order product data
	public function add_order_products($data_2)
	{
		$query = $this->db->insert_batch($this->order_products,$data_2);
	    return $query;
	    // echo $this->db->last_query($results);die;
	}
	
	#add order status data	
	public function add_order_statuses($data_3)
	{
		//	echo "asd";
		$query = $this->db->insert($this->order_statuses,$data_3);
	    return $query;
	     //echo $this->db->last_query($results);die;
	}



}

?>