<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttributeGroup extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Attribute_Modal');
	}

	#Index Page
	public function index()
	{
		$data['result'] = $this->Attribute_Modal->get_all_attributes_group();
		$this->load->view('admin/viewattributegroup',$data);
	}

	#Add Attribute
	public function add()
	{
		if($this->input->post('add'))
		{
			$attribute_group_name = $this->input->post('attribute_group_name');
			$is_active = 1;
			$is_deleted = 0;
			$date_added = date('Y-m-d');
			$date_updated = date('Y-m-d');
		
			$data = array(
				'name' => $attribute_group_name,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_added' => $date_added,
				'date_updated' => $date_updated
			);
			
			$result = $this->Attribute_Modal->add_attribute_group($data);
			redirect('AttributeGroup');
		}
		else
		{
			/*Fetch Attribute Group data*/
			$data['attr_grp'] = $this->Attribute_Modal->get_all_attributes_group();
			$this->load->view('admin/add_attributegroup',$data);
		}
		
	}
	
	#Delete AttributeGroup
	public function delete_attribute_group()
	{
		if($this->uri->segment(3) == FALSE)
		{
			$attribute_group_id = 0;
		}
		else
		{
			$attribute_group_id = $this->uri->segment(3);
		}
		
		$result = $this->Attribute_Modal->delete_single_attribute_group($attribute_group_id);
		redirect('AttributeGroup');
	}


	#Get Attribute Group Data for update
	public function edit_attribute_grp()
	{
		if($this->uri->segment(3) == FALSE)
		{
			$attribute_group_id = 0;
		}
		else
		{
			$attribute_group_id = $this->uri->segment(3);
		}
		
		$data['attr_grp'] = $this->Attribute_Modal->get_attributes_group($attribute_group_id);
		$this->load->view('admin/update_attribute_grp',$data);
	}
	
	#update AttributeGroup
	public function update()
	{
		if($this->input->post('update'))
		{
			if($this->uri->segment(3) == FALSE)
			{
				$attribute_group_id = 0;
			}
			else
			{
				$attribute_group_id = $this->uri->segment(3);
			}
		
			$attribute_group_name = $this->input->post('attribute_group_name');
			$is_active = $this->input->post('is_active');
			$is_deleted = 0;
			$date_added = date('Y-m-d');
			$date_updated = date('Y-m-d');
		
			$data = array(
				'name' => $attribute_group_name,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_added' => $date_added,
				'date_updated' => $date_updated
			);
			
			$result = $this->Attribute_Modal->update_attribute_group($data,$attribute_group_id);
			redirect('AttributeGroup');
		}
	}
		
}





