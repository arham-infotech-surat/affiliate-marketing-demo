<?php
class Download_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_download="tbl_download";
			$this->tbl_downloadcategory="tbl_downloadcategory";
			
	}


//------------------------ fetch testimonial data -------------------------->
	public function fetch_downloadcat()
	{
		$query = $this->db->get($this->tbl_downloadcategory);
		$results=$query->result_array();
		return $results;
	}
	
	public function get_downloadcat_data($cat_id)
	{
		$query = $this->db->get_where($this->tbl_downloadcategory,array('cat_id' => $cat_id));
		$results=$query->result_array();
		// echo "<pre>"; print_r($results); die;
		return $results;
	}
	
	
	
	//-------------------------------- Update ------------------------------->
	public function update_downloadcatdata($data,$cat_id)
	{
		$result = $this->db->update($this->tbl_downloadcategory,$data,array('cat_id' => $cat_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- End ------------------------------->

//-------------------------------- insert data ------------------------------->
	public function insert_downloadcat($data)
	{
		$query = $this->db->insert($this->tbl_downloadcategory,$data);
		//echo $this->db->last_query();die;
		return $query;
	}
	
	//-------------------------------- delete ------------------------------->
	public function delete_single_download($download_id)
	{
		$result = $this->db->delete($this->tbl_download,array('download_id' => $download_id));
		//echo $this->db->last_query();die;
		return $result;
	}
	
	public function delete_single_downloadcat($cat_id)
	{
		$result = $this->db->delete($this->tbl_downloadcategory,array('cat_id' => $cat_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- testimonial get data ------------------------------->
	public function fetch_downloaddata()
	{
		$query = $this->db->get($this->tbl_download);
		$results=$query->result_array();
		return $results;
	}
	
	public function get_download_data($download_id)
	{
		$query = $this->db->get_where($this->tbl_download,array('download_id' => $download_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
//-------------------------------- End ------------------------------->
	public function add_downloaddata($data)
	{
		$result = $this->db->insert($this->tbl_download,$data);
		//echo $this->db->last_query();die;
		return $result;
	}
	
	public function update_downloaddata($data,$download_id)
	{
		$result = $this->db->update($this->tbl_download,$data,array('download_id' => $download_id));
		//echo $this->db->last_query();die;
		return $result;
	}

	public function update_servicedata($data,$service_id)
	{
		$result = $this->db->update($this->tbl_service,$data,array('service_id' => $service_id));
		//echo $this->db->last_query();die;
		return $result;
	}
	
	public function download_MultipleDeleted($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('download_id', $delIds[$i]);
	        $this->db->delete($this->tbl_download);
        }
	}
    redirect('Download/view_download');
}
	public function downloadcat_MultipleDeleted($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('cat_id', $delIds[$i]);
	        $this->db->delete($this->tbl_downloadcategory);
        }
	}
    redirect('Download/view_downloadcat');
	}
//-------------------------------- End ------------------------------->
public function fetch_download_data()
	{
		$query = $this->db->get($this->tbl_downloadcategory);
		$results=$query->result_array();
		return $results;
	}

//------------------------ fetch downloads data -------------------------->
	public function get_downloads_data()
	{
		$query = $this->db->get($this->tbl_downloadcategory);
		$results=$query->result_array();
		return $results;
	}
//------------------------------------------ End ---------------------------------->

}
?>