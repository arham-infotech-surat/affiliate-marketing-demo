<?php
class Slider_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_slider="tbl_slider";
			
	}


//------------------------ fetch testimonial data -------------------------->
	public function fetch_slider()
	{
		$query = $this->db->get($this->tbl_slider);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- insert data ------------------------------->
	public function insert_slider($data)
	{
		$query = $this->db->insert($this->tbl_slider,$data);
		//echo $this->db->last_query();die;
		return $query;
	}
//-------------------------------- End ------------------------------->

//-------------------------------- testimonial get data ------------------------------->

	public function get_slider($slider_id)
	{
		$query = $this->db->get_where($this->tbl_slider,array('slider_id' => $slider_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- Update ------------------------------->
public function update_slider($data,$slider_id)
	{
		$result = $this->db->update($this->tbl_slider,$data,array('slider_id' => $slider_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->
//-------------------------------- delete ------------------------------->
public function delete_single_slider($slider_id)
	{
		$result = $this->db->delete($this->tbl_slider,array('slider_id' => $slider_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//-------------------------------- End ------------------------------->
	public function slider_MultipleDeleted($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('slider_id', $delIds[$i]);
	        $this->db->delete($this->tbl_slider);
        }
	}
    redirect('Slider/view_slider');
	}
}
?>