<?php
class Page_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_page="tbl_page";
			$this->tbl_addmore="tbl_addmore";
	}


//------------------------ fetch admin data -------------------------->
	public function fetch_pages()
	{
		$query = $this->db->get($this->tbl_page);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//------------------------ add pages data -------------------------->
	public function insert_pages($data)
	{
		$result = $this->db->insert($this->tbl_page,$data);
		$pg_id = $this->db->insert_id();
		$this->session->set_userdata('Pg_Id', $pg_id);
		
		//echo $this->db->last_query(); die;
		return $result;
	}
//-------------------------------- End ------------------------------->
	
//------------------------ add more page data -------------------------->
	public function insert_more_data($data)
	{
		$result = $this->db->insert($this->tbl_addmore,$data);
		//echo $this->db->last_query(); die;
		return $result;
	}
//-------------------------------- End ------------------------------->

//------------------------------ get Page data --------------------------->
	public function get_page_data($page_id){ // display query
			$query = $this->db->get_where($this->tbl_page,array('page_id' => $page_id));
			$results=$query->result_array();
			return $results;		
	}
//---------------------------------- end ---------------------------------->

//----------------------------- edit page code ---------------------------------->
	public function pageEdit($data,$page_id)
	{
		$result = $this->db->update($this->tbl_page,$data,array('page_id' => $page_id));
		// echo $this->db->last_query(); die;
		return $result;
	}
//---------------------------------- end ---------------------------------------->

//---------------------------------- delete page code---------------------------->
	public function pageRemove($page_id)
	{
		//delete single user record
		$result = $this->db->delete($this->tbl_page,array('page_id' => $page_id));
		return $result;
	}
//----------------------------------end ----------------------------------------->

//---------------------------------- Get Extra Data ----------------------------------->
	public function get_add_more_data($Edit_ID){
		$query = $this->db->get_where($this->tbl_addmore,array('page_id' => $Edit_ID));
		$results=$query->result_array();
		return $results;	
	}
//------------------------------- End --------------------------------------->


//---------------------------- Edit extra Data ------------------------------->
public function edit_extra_data($data,$addmore_id)
	{
		$result = $this->db->update($this->tbl_addmore,$data,array('addmore_id' => $addmore_id));
		// echo $this->db->last_query(); die;
		return $result;
	}
//--------------------------------- End --------------------------------------->


//--------------------------- Delete Extra Data ----------------------------->
public function remove_extra_data($addmore_id)
	{
		//delete single user record
		$result = $this->db->delete($this->tbl_addmore,array('addmore_id' => $addmore_id));
		return $result;
	}
//--------------------------------- End ------------------------------------->

//-------------------- Multiple Delete ---------------->
public function pages_MultipleDelete($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('page_id', $delIds[$i]);
	        $this->db->delete($this->tbl_page);

        }
	}
    redirect('Page/index');
}
//------------------------- End ----------------------->
}
?>