<?php

class Categories_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->categories="categories";
	}
    
	public function add_categories($data)
	{
		$query = $this->db->insert($this->categories,$data);
		return $query;
	}

	public function get_categories(){

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id', 0);

        $parent = $this->db->get();
        // echo $this->db->last_query(); die;
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->category_id);
            $i++;
        }
        return $categories;
    }

    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->category_id);
            $i++;
        }
        return $categories;       
    }

}

?>