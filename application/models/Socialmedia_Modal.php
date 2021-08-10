<?php
class Socialmedia_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_socialmedia="tbl_socialmedia";
			
	}


//------------------------ fetch testimonial data -------------------------->
	public function fetch_Socialmediadata()
	{
		$query = $this->db->get($this->tbl_socialmedia);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- insert data ------------------------------->
	public function insert_socialmedia($data)
	{
		$query = $this->db->insert($this->tbl_socialmedia,$data);
		//echo $this->db->last_query();die;
		return $query;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- testimonial get data ------------------------------->

	public function get_social_data($social_id)
	{
		$query = $this->db->get_where($this->tbl_socialmedia,array('social_id' => $social_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- Update ------------------------------->
public function update_socialmediadata($data,$social_id)
	{
		$result = $this->db->update($this->tbl_socialmedia,$data,array('social_id' => $social_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- delete ------------------------------->
public function delete_single_social($social_id)
	{
		$result = $this->db->delete($this->tbl_socialmedia,array('social_id' => $social_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->

	public function social_MultipleDeleted($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('social_id', $delIds[$i]);
	        $this->db->delete($this->tbl_socialmedia);
        }
	}
    redirect('Socialmedia/view_Socialmedia');
	}
	

}
?>