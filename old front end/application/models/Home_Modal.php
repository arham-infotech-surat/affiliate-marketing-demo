<?php

class Home_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();

			

			$this->tbl_logo="tbl_logo";
			$this->customer_tbl="customer_tbl";
			$this->tbl_blog="tbl_blog";
			$this->tbl_inquiry="tbl_inquiry";
			$this->tbl_orders="tbl_orders";
			$this->tbl_payment="tbl_payment";

			

	}



//------------------------ fetch admin data -------------------------->

	public function fetch_logos()

	{

		$query = $this->db->get($this->tbl_logo);

		$results=$query->result_array();

		return $results;

	}

//-------------------------------- End ------------------------------->

//------------------------ fetch logo data -------------------------->

	public function get_logo_data($logo_id){ // display query

			$query = $this->db->get_where($this->tbl_logo,array('logo_id' => $logo_id));

			$results=$query->result_array();

			return $results;		

	}

//---------------------------- End ---------------------------------->



//------------------------- Edit logo ------------------------------------>

	public function update_logo($data,$logo_id)

	{



		$result = $this->db->update($this->tbl_logo,$data,array('logo_id' => $logo_id));

		

		return $result;

	}

//--------------------------- End -------------------------------------->


    #Customer Total
    public function display_userdata()
    {
    	 $this->db->select('oauth_provider, COUNT(oauth_provider) as total');
    	 $this->db->group_by('oauth_provider'); 
    	 $this->db->order_by('total', 'desc'); 
    	 $query=$this->db->get($this->customer_tbl);
    	 $userresults=$query->result_array();
    	 return $userresults;
	}
	
    #Blogs Total
	public function display_blogdata()
    {
	 $this->db->select('COUNT(*) as total');
	 $this->db->order_by('total', 'desc'); 
	 $query=$this->db->get($this->tbl_blog);
	 $results=$query->result_array();
	 return $results;
	}
	
	#Inquiry Total
	public function display_inqdata()
    {
        $this->db->select('COUNT(*) as total');
    	$this->db->order_by('total', 'desc'); 
    	$query=$this->db->get($this->tbl_inquiry);
    	$results=$query->result_array();
    	//echo $this->db->last_query();die;
    	return $results;
       
        /*$this->db->select('service_id, COUNT(service_id) as total');
        $this->db->group_by('service_id'); 
        $this->db->order_by('total', 'desc'); 
        $query=$this->db->get($this->tbl_inquiry);
        $userresults=$query->result_array();
        return $userresults;*/
	}
	
	#Order Total
	public function display_Orderdata()
    {
    	 $this->db->select('COUNT(*) as total');
    	 $this->db->order_by('total', 'desc'); 
    	 $query=$this->db->get($this->tbl_orders);
    	 $results=$query->result_array();
    	 return $results;
	}
	
	#Payment Total
	public function display_paymentdata()
    {	 
    	 $this->db->select('SUM(payment_amount) as total');
    	 $query=$this->db->get($this->tbl_payment);
    	 $userresults=$query->result_array();
    	 //echo $this->db->last_query();die;
    	 return $userresults;
	}
	
	#payment view
	public function display_payment()
    {	 
        //$this->db->join('customer_tbl','customer_tbl.customer_id=tbl_payment.service_ask_order_id');
        $this->db->limit(10);
    	$this->db->order_by('payment_id', 'desc'); 
    	$query=$this->db->get($this->tbl_payment);
    	$result=$query->result_array();
    	//echo $this->db->last_query();die;
    	return $result;
	}
	
	#Order view
	public function display_orders()
    {	 
        $this->db->join('customer_tbl','customer_tbl.customer_id=tbl_orders.customer_id');
        $this->db->limit(10);
    	$this->db->order_by('order_id', 'desc'); 
    	$query=$this->db->get($this->tbl_orders);
    	$result=$query->result_array();
    	//echo $this->db->last_query();die;
    	return $result;
	}
	
	#Inquirys view
	public function display_inqs()
    {	 
        $this->db->join('customer_tbl','customer_tbl.customer_id=tbl_inquiry.customer_id');
        $this->db->join('tbl_service','tbl_service.service_id=tbl_inquiry.service_id');
        $this->db->limit(10);
    	$this->db->order_by('inquiry_id', 'desc'); 
    	$query=$this->db->get($this->tbl_inquiry);
    	$result=$query->result_array();
    	//echo $this->db->last_query();die;
        return $result;
	}
}

?>