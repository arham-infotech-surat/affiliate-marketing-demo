<?php

class Team_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();
			$this->tbl_testimonial="tbl_testimonial";
			$this->tbl_team="tbl_team";
			//$this->tbl_blog_category="tbl_blog_category";
	}





//------------------------ fetch testimonial data -------------------------->

	public function fetch_teamdata()
	{
		//$this->db->join('$this->tbl_testimonial','$this->tbl_testimonial.team_id=$this->tbl_team.team_id');
		$query = $this->db->get($this->tbl_team);
		$results=$query->result_array();
		return $results;
	}

	

//-------------------------------- End ------------------------------->



//-------------------------------- insert data ------------------------------->

	public function add_team($data)
	{
		$query = $this->db->insert($this->tbl_team,$data);
		echo $this->db->last_query();
		return $query;
	}

	public function add_blogcat($data)
	{
		$query = $this->db->insert($this->tbl_blog_category,$data);
		return $query;
	}

//-------------------------------- End ------------------------------->



//-------------------------------- testimonial get data ------------------------------->



	public function get_team_data($team_id)
	{
		$query = $this->db->get_where($this->tbl_team,array('team_id' => $team_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}

//-------------------------------- End ------------------------------->

//-------------------------------- Update ------------------------------->

	public function update_teamdata($data,$team_id)
	{
		$result = $this->db->update($this->tbl_team,$data,array('team_id' => $team_id));
		//echo $this->db->last_query();die;
		return $result;

	}

//-------------------------------- End ------------------------------->

//-------------------------------- delete ------------------------------->

public function delete_single_blog($blog_id)

	{
		$result = $this->db->delete($this->tbl_blog,array('blog_id' => $blog_id));
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

//------------------------------------Category------------------------------->
	public function get_blogcat_data()
	{
		$query = $this->db->get($this->tbl_blog_category);
		$results=$query->result_array();
		return $results;
	}

	public function delete_single_blogcat($cat_id)

	{
		$result = $this->db->delete($this->tbl_blog_category,array('cat_id' => $cat_id));
		//echo $this->db->last_query();die;
		return $result;
	}


	public function fetch_blogcat_data($cat_id)
	{
		$query = $this->db->get_where($this->tbl_blog_category,array('cat_id' => $cat_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}

	public function update_blogcat($data,$cat_id)
	{
		$result = $this->db->update($this->tbl_blog_category,$data,array('cat_id' => $cat_id));
		//echo $this->db->last_query();die;
		return $result;

	}


}

?>