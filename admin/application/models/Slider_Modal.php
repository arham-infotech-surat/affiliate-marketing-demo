<?php

class Slider_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->tbl_slider="tbl_slider";
	}

	#Fetch All Slider
		public function get_slider_data()
		{
			$query = $this->db->get($this->tbl_slider);
			$results=$query->result_array();
			return $results;
		}
	#End
	
	#Add Slider
		public function add_slider($data)
		{
			$query = $this->db->insert($this->tbl_slider,$data);
			return $query;
		} 
	#End
	
	#Fetch Single Slider
		public function get_single_slider($slider_id)
		{
			$query = $this->db->get_where($this->tbl_slider,array('slider_id' => $slider_id));
			$results=$query->result_array();
			return $results;
		}
	#End
	
	#Update Single Slider
		public function update_sliderdata($data,$slider_id)
		{
			$query = $this->db->update($this->tbl_slider,$data,array('slider_id' => $slider_id));
			return $query;
		}
	#End
	
	#Delete Slider
		public function delete_single_slider($slider_id)
		{
			$query = $this->db->delete($this->tbl_slider,array('slider_id' => $slider_id));
			return $query;
		}
	#End

}

?>