<?php

class Categories_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->tbl_category="tbl_category";
	}
	
	public function get_all_categories()
    {
        $query = $this->db->get($this->tbl_category);
        $results=$query->result_array();
        return $results;
    }
    
	public function add_categories($data)
	{
		$query = $this->db->insert($this->tbl_category,$data);
		return $query;
	}

    
    public function fetch_categories_data($category_id)
    {
        $query = $this->db->get_where($this->tbl_category,array('cat_id' => $category_id));
        //echo $this->db->last_query();die;
        $result = $query->result_array();
        return $result;
    }
	
    public function update_categories_data($data,$category_id)
    {
        $result = $this->db->update($this->tbl_category,$data,array('cat_id' => $category_id));
        // echo $this->db->last_query();die;
        return $result;

    }
    public function delete_single_categories($category_id)
    {
        $query = $this->db->delete($this->tbl_category,array('cat_id' => $category_id));
        return $query;
    }
}

?>