<?php
class Project_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_project="tbl_project";
			
	}
//------------------------ fetch favicon image -------------------------->
	public function insert_project($data)
	{
		$result = $this->db->insert($this->tbl_project,$data);
		return $result;
	}
//------------------------ fetch favicon image End -------------------------->

//------------------------ fetch admin data -------------------------->
	public function fetch_project()
	{
		$query = $this->db->get($this->tbl_project);
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->

//------------------------ fetch favicon image -------------------------->
	public function get_project($project_id)
	{
		$query = $this->db->get_where($this->tbl_project,array('project_id' => $project_id));
		$result = $query->result_array();
		return $result;
	}
//------------------------ fetch favicon image End -------------------------->

//------------------------ update favicon image -------------------------->

	public function update_projectdata($data,$project_id)
	{
		$result = $this->db->update($this->tbl_project,$data,array('project_id' => $project_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//------------------------ update favicon image end -------------------------->

//------------------------ Delete Project -------------------------->

	public function delete_single_project($project_id)
	{
		$result = $this->db->delete($this->tbl_project,array('project_id' => $project_id));
		//echo $this->db->last_query();die;
		return $result;
	}
//------------------------ Delete Project end -------------------------->


	public function project_MultipleDeleted($delIds){
	if ($delIds) {
        for ($i = 0; $i < count($delIds); $i++)
        {
	        $this->db->where('project_id', $delIds[$i]);
	        $this->db->delete($this->tbl_project);
        }
	}
    redirect('Project/view_project');
	}
}
?>