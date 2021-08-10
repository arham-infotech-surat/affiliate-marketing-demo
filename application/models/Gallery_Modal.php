<?php
class Gallery_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_gallery_category="tbl_gallery_category";
			$this->tbl_gallery="tbl_gallery";
	}

//------------------------ fetch galleries data -------------------------->
	public function fetch_galleries()
	{
		$query = $this->db->get($this->tbl_gallery_category);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//------------------------ add pages data -------------------------->
	public function insert_galleries($data)
	{
		$result = $this->db->insert($this->tbl_gallery_category,$data);
	
		return $result;
	}
//-------------------------------- End ------------------------------->

//------------------------ fetch logo data -------------------------->
	public function get_galleries_data($cat_id){ // display query
			$query = $this->db->get_where($this->tbl_gallery_category,array('cat_id' => $cat_id));
			$results=$query->result_array();
			return $results;		
	}
//---------------------------- End ---------------------------------->

//------------------------- Edit logo ------------------------------------>
	public function gallery_cat_update($data,$cat_id)
	{

		$result = $this->db->update($this->tbl_gallery_category,$data,array('cat_id' => $cat_id));
		
		return $result;
	}
//--------------------------- End -------------------------------------->

//---------------------------------- delete page code---------------------------->
	public function gallery_catRemove($cat_id)
	{
		//delete single user record
		$result = $this->db->delete($this->tbl_gallery_category,array('cat_id' => $cat_id));
		return $result;
	}
//----------------------------------end ----------------------------------------->



//--------------------------------+++++++++++++++++++++++++++++++++ -------------->


//------------------------ fetch cat galleries data -------------------------->
	public function fetch_cat_galleries()
	{
		/* $this->db->select('*');
		$this->db->from('tbl_gallery_category','tbl_gallery');
		$this->db->join('tbl_gallery','tbl_gallery_category.cat_id=tbl_gallery.cat_id'); */
		$query = $this->db->get($this->tbl_gallery);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//------------------------ fetch galleries category data -------------------------->
	public function fetch_gallery_cat_data()
	{
		$query = $this->db->get($this->tbl_gallery_category);
		$results=$query->result_array();
		return $results;
	}
//------------------------------------------ End ---------------------------------->

//------------------------ add pages data -------------------------->
	public function insert_gallery($data)
	{
		$result = $this->db->insert($this->tbl_gallery,$data);
		//echo $this->db->last_query();
		return $result;
	}
//-------------------------------- End ------------------------------->

//------------------------ fetch logo data -------------------------->
	public function get_gallery($gallery_id){ // display query
			$query = $this->db->get_where($this->tbl_gallery,array('gallery_id' => $gallery_id));
			$results=$query->result_array();
			return $results;		
	}
//---------------------------- End ---------------------------------->



//--------------------------- Delete Extra Data ----------------------------->
public function remove_cat_galleries($gallery_id)
	{
		//delete single user record
		$result = $this->db->delete($this->tbl_gallery,array('gallery_id' => $gallery_id));
		return $result;
	}
//--------------------------------- End ------------------------------------->

//--------------------Gallery Category Multiple Delete ---------------->
public function gallery_cat_MultipleDelete($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('cat_id', $delIds[$i]);
	        $this->db->delete($this->tbl_gallery_category);

        }
	}
    redirect('Gallery/index');
}
//------------------------- End -------------------------------------->


//------------------------ Gallery Multiple Delete ---------------->
public function gallery_MultipleDelete($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('gallery_id', $delIds[$i]);
	        $this->db->delete($this->tbl_gallery);

        }
	}
    redirect('Gallery/galleryView');
}
//------------------------------ End ----------------------->


//------------------------- Edit logo ------------------------------------>
	public function gallery_up($data,$gallery_id)
	{

		$result = $this->db->update($this->tbl_gallery,$data,array('gallery_id' => $gallery_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//--------------------------- End -------------------------------------->

}
?>