<?php
class Product_Modal extends CI_Model {
	function __construct() {
			parent::__construct();
			$this->products="tbl_product";
	}

	#View All Product
		public function get_product_data()
		{
			$query = $this->db->get($this->products);
			$results=$query->result_array();
			return $results;
		}
	#End
	
	#View single Product Details
		public function get_product_details($product_id)
		{
			$this->db->join('tbl_brands','tbl_brands.brand_id=tbl_product.brand_id');
			$this->db->join('tbl_category','tbl_category.cat_id=tbl_product.cat_id');
			$query = $this->db->get($this->products,array('product_id' => $product_id));
			$results=$query->result_array();
			return $results;
		}
	#End
	
	#Add Product
		public function create_product($data){
			$query = $this->db->insert($this->products,$data);
			return $query;
		}
	#End
	
	#Get Single Product
		public function get_single_productdata($product_id){
			$query = $this->db->get_where($this->products,array('product_id' => $product_id));
			$results=$query->result_array();
			return $results;
		}
	#End
	
	#Update Single Product
		public function update_single_product($product_id,$data){
			$query = $this->db->update($this->products,$data,array('product_id' => $product_id));
			return $query;
		}
	#End


	#Delete Product
		public function delete_single_product($product_id)
		{
			$query = $this->db->delete($this->products,array('product_id' => $product_id));
			return $query;
		}
	#End
}

?>