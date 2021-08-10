<?php

class FAQ_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();
			//$this->tbl_testimonial="tbl_testimonial";
			$this->tbl_books="tbl_books";
			$this->tbl_faq="tbl_faq";
	}


    #get faq data
    	public function fetch_faqdata()
    	{
    		$query = $this->db->get($this->tbl_faq);
    		$results=$query->result_array();
    		return $results;
    	}
//-------------------------------- End ------------------------------->



//-------------------------------- insert data ------------------------------->

	public function add_faq($data)

	{
		$query = $this->db->insert($this->tbl_faq,$data);
		//echo $this->db->last_query();die;
		return $query;
	}

//-------------------------------- End ------------------------------->



//-------------------------------- testimonial get data ------------------------------->



	public function get_faq_data($faq_id)
	{
		$query = $this->db->get_where($this->tbl_faq,array('faq_id' => $faq_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}

//-------------------------------- End ------------------------------->

//-------------------------------- Update ------------------------------->

	public function update_faqdata($data,$faq_id)
	{
		$result = $this->db->update($this->tbl_faq,$data,array('faq_id' => $faq_id));
		//echo $this->db->last_query();die;
		return $result;

	}

//-------------------------------- End ------------------------------->

//-------------------------------- delete ------------------------------->

    public function delete_single_faq($faq_id)
	{
		$result = $this->db->delete($this->tbl_faq,array('faq_id' => $faq_id));
		//echo $this->db->last_query();die;
		return $result;
	}





}

?>