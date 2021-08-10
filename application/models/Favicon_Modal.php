<?php
class Favicon_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_favicon="tbl_favicon";
			
	}

//------------------------ fetch admin data -------------------------->
	public function fetch_pages()
	{
		$query = $this->db->get($this->tbl_favicon);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//------------------------ fetch favicon image -------------------------->
	public function get_favicon_img($fav_id)
	{
		$query = $this->db->get_where($this->tbl_favicon,array('fav_id' => $fav_id));
		$result = $query->result_array();
		return $result;
	}
//------------------------ fetch favicon image End -------------------------->

//------------------------ update favicon image -------------------------->

	public function update_favicon_img($data,$fav_id)
	{
		$result = $this->db->update($this->tbl_favicon,$data,array('fav_id' => $fav_id));
		//echo $this->db->last_query();die;
		return $result;
	}
	
	public function add_favicon_img($data)
	{
		$result = $this->db->insert($this->tbl_favicon,$data);
		//echo $this->db->last_query();die;
		return $result;
	}
//------------------------ update favicon image end -------------------------->

}
?>