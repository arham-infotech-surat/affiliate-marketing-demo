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
		$this->db->select('attribute_groups.name as atb_grp_name,attributes.name as atb_name,attributes.*');
		$this->db->join('attribute_groups','attribute_groups.attribute_group_id=attributes.attribute_group_id');
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
	
	#Fetch data for attributes update
	public function get_single_attribute($attribute_id)
	{
		$query = $this->db->get_where($this->attributes,array('attribute_id' => $attribute_id));
		$results=$query->result_array();
		return $results;
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
	
	
	
	#Update Attributes
	public function update_attribute($data,$attribute_id)
	{
		$query = $this->db->update($this->attributes,$data,array('attribute_id' => $attribute_id));
		//echo $this->db->last_query();die;
		return $query;
	}
	
	
	public function get_attributes_group($attribute_group_id)
	{
		//$this->db->join('attribute_groups','attribute_groups.attribute_group_id=attributes.attribute_group_id');
		$query = $this->db->get_where($this->attribute_groups,array('attribute_group_id' => $attribute_group_id));
		$results=$query->result_array();
		return $results;
	}
	
	#Update Attributes Group
	public function update_attribute_group($data,$attribute_group_id)
	{
		$query = $this->db->update($this->attribute_groups,$data,array('attribute_group_id' => $attribute_group_id));
		//echo $this->db->last_query();die;
		return $query;
	}
	
	#get Sub-Category by cat_id
		public function get_att_by_grpid($attribute_group_id)
		{
			$query = $this->db->get_where($this->attributes,array('attribute_group_id' => $attribute_group_id));
			$results=$query->result_array();
			//echo $this->db->last_query();
			return $results;
		}
	
	
	
	
	
	
	
	
	

}

?>