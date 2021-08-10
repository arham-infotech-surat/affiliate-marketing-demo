<?php
class Notice_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_notice="tbl_notice";
			
	}


//------------------------ fetch testimonial data -------------------------->
	public function fetch_noticedata()
	{
		$query = $this->db->get($this->tbl_notice);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- insert data ------------------------------->
	public function insert_notice($data)
	{
		$query = $this->db->insert($this->tbl_notice,$data);
		//echo $this->db->last_query();die;
		return $query;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- testimonial get data ------------------------------->

	public function get_notice_data($notice_id)
	{
		$query = $this->db->get_where($this->tbl_notice,array('notice_id' => $notice_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- Update ------------------------------->
public function update_noticedata($data,$notice_id)
	{
		$result = $this->db->update($this->tbl_notice,$data,array('notice_id' => $notice_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- delete ------------------------------->
public function delete_single_notice($notice_id)
	{
		$result = $this->db->delete($this->tbl_notice,array('notice_id' => $notice_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->
}
?>