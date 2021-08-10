<?php

class Attribute_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->attributes="attributes";
			$this->attribute_groups="attribute_groups";
	}

	#Fetch Attributes
	public function get_all_attributes()
	{
		$query = $this->db->get($this->attributes);
		$results=$query->result_array();
		return $results;
	}
	


	#Add Attributes
	public function add_attribute($data)
	{
		$query = $this->db->insert($this->attributes,$data);
		return $query;
	}
	
	#Delete Attributes
	public function delete_single_attribute($attribute_id)
	{
		$query = $this->db->delete($this->attributes,array('attribute_id' => $attribute_id));
		return $query;
	}
	
	#Get Attributes Group
	public function get_all_attributes_group()
	{
		$query = $this->db->get($this->attribute_groups);
		$results=$query->result_array();
		//echo $this->db->last_query();die;
		return $results;
	}
	
	#Add Attributes Group
	public function add_attribute_group($data)
	{
		$query = $this->db->insert($this->attribute_groups,$data);
		//echo $this->db->last_query();die;
		return $query;
	}
	
	#Delete Attributes
	public function delete_single_attribute_group($attribute_group_id)
	{
		$query = $this->db->delete($this->attribute_groups,array('attribute_group_id' => $attribute_group_id));
		return $query;
	}
	
	
	
	

}

?>