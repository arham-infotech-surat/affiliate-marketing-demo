<?php
class Admin_Modal extends CI_Model {

	function __construct() {
			parent::__construct();
			$this->tbl_admin="tbl_admin";
	}

	#Fetch Sub Admins
		public function fetch_admindata()
		{
			//echo "heeee";
			// $this->db->join('customer_addresses','customer_addresses.customer_id = customers.customer_id'); 
			$query = $this->db->get_where($this->tbl_admin,array('admin_status' => "1"));
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
		public function get_admin_data($admin_id)
		{
			$query = $this->db->get_where($this->tbl_admin,array('id' => $admin_id));
			//echo $this->db->last_query();die;
			$result = $query->result_array();
			return $result;
		}
	#End

	#Update Sub-Admin
		public function update_admindata($data,$admin_id)
		{
			$result = $this->db->update($this->tbl_admin,$data,array('id' => $admin_id));
			//echo $this->db->last_query();die;
			return $result;

		}
	#End

	#Delete Sub-Admin
		public function delete_single_admin($admin_id)
		{
			$result = $this->db->delete($this->tbl_admin,array('id' => $admin_id));
			//echo $this->db->last_query();die;
			return $result;
		}
	#End
}

?>