<?php

class Book_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();
			//$this->tbl_testimonial="tbl_testimonial";
			$this->tbl_books="tbl_books";
	}





//------------------------ fetch testimonial data -------------------------->

	public function fetch_bookdata()

	{

		$query = $this->db->get($this->tbl_books);

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

public function delete_single_book($book_id)

	{
		$result = $this->db->delete($this->tbl_books,array('book_id' => $book_id));
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
    
    //---------------------- User Status --------------->
	public function book_out_status($id,$status)
	{
	    //echo "model";die;
		if($status==1)
		{
			$b_status = array(
				'book_status' =>  '0'
				);
			$result = $this->db->update($this->tbl_books,$b_status,array('book_id' => (int)$id));
			//echo $this->db->last_query();
		}
		else 
		{
			$b_status = array(
				'book_status' =>  '1'
				);
			$result = $this->db->update($this->tbl_books,$b_status,array('book_id' => (int)$id));
			//echo $this->db->last_query();
		}
		return $result;
	}
	//------------------------- End --------------------->




}

?>