<?php
class Logo_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->tbl_logo="tbl_logo";
	}

	#Fetch Sub Admins
		public function fetch_logo()
		{
			$query = $this->db->get($this->tbl_logo);
			$results=$query->result_array();
			//echo $this->db->last_query($results);die;
			return $results;
		}
	#End
	
	#Add Sub Admin
		public function add_sub_admin($data)
		{
			$query = $this->db->insert($this->tbl_admin,$data);
			return $query;
		}
	#End

	#Fetch Sub-Admin Data For update
		public function get_logo($logo_id)
		{
			$query = $this->db->get_where($this->tbl_logo,array('logo_id' => $logo_id));
			//echo $this->db->last_query();die;
			$result = $query->result_array();
			return $result;
		}
	#End

	#Update Sub-Admin
		public function update_logo($data,$logo_id)
		{
			$result = $this->db->update($this->tbl_logo,$data,array('logo_id' => $logo_id));
			//echo $this->db->last_query();die;
			return $result;

		}
	#End
}

?>