<?php

class Brand_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->tbl_brands="tbl_brands";
	}
	
	public function get_all_brands()
    {
        $query = $this->db->get($this->tbl_brands);
        $results=$query->result_array();
        return $results;
    }
    
	public function add_brand($data)
	{
		$query = $this->db->insert($this->tbl_brands,$data);
		return $query;
	}

    
    public function fetch_brand_data($brand_id)
    {
        $query = $this->db->get_where($this->tbl_brands,array('brand_id' => $brand_id));
        $result = $query->result_array();
        return $result;
    }
	
    public function update_brand_data($data,$brand_id)
    {
        $result = $this->db->update($this->tbl_brands,$data,array('brand_id' => $brand_id));
        return $result;

    }
    public function delete_single_brand($brand_id)
    {
        $query = $this->db->delete($this->tbl_brands,array('brand_id' => $brand_id));
        return $query;
    }
}

?>