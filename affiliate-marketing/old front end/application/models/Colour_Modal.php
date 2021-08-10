<?php

class Colour_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->colours="colours";
	}

	#Fetch Colour
	public function get_colour_data()
	{
		$query = $this->db->get($this->colours);
		$results=$query->result_array();
		return $results;
	}
	
	#Add Colour
	public function add_colour($data)
	{
		$query = $this->db->insert($this->colours,$data);
		
		return $query;
	}
	
	#Delete Attributes
	public function delete_single_colour($colour_id)
	{
		$query = $this->db->delete($this->colours,array('colour_id' => $colour_id));
		return $query;
	}
	
	#Get Attributes Group
	public function fetch_colour_data($colour_id)
	{
		//echo "sdcsdmd";die;
		$query = $this->db->get_where($this->colours,array('colour_id' => $colour_id));
		//echo $this->db->last_query();die;
		$result = $query->result_array();
		return $result;
	}
	
	public function update_colourdata($data,$colour_id)
	{
		$result = $this->db->update($this->colours,$data,array('colour_id' => $colour_id));
		//echo $this->db->last_query();die;
		return $result;

	}

}

?>