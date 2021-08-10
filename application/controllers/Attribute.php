<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Attribute_Modal');
	}

	#Index Page
	public function index()
	{
		$data['result'] = $this->Attribute_Modal->get_all_attributes();
		$this->load->view('admin/viewattribute',$data);
	}

	#Add Attribute
	public function add()
	{
		if($this->input->post('add'))
		{
			$attribute_name = $this->input->post('attribute_name');
			$attribute_group_id = $this->input->post('attribute_group_id');
			$is_active = 1;
			$is_deleted = 0;
			$date_added = date('Y-m-d');
			$date_updated = date('Y-m-d');
		
			$data = array(
				'name' => $attribute_name,
				'attribute_group_id' => $attribute_group_id,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_added' => $date_added,
				'date_updated' => $date_updated
			);
			
			$result = $this->Attribute_Modal->add_attribute($data);
			redirect('Attribute');
		}
		else
		{
			/*Fetch Attribute Group data*/
			$data['attr_grp'] = $this->Attribute_Modal->get_all_attributes_group();
			$this->load->view('admin/add_attribute',$data);
		}
		
	}
	
	#Delete Attribute
	public function delete_attribute()
	{
		if($this->uri->segment(3) == FALSE)
		{
			$attribute_id = 0;
		}
		else
		{
			$attribute_id = $this->uri->segment(3);
		}
		
		$result = $this->Attribute_Modal->delete_single_attribute($attribute_id);
		redirect('Attribute');
	}

/*Attribute Group*/

	#Get Attribute Group Data
	/* public function FetchAttribute_Group()
	{
		
		$this->load->view('admin/viewattribute',$data);
	} */
		
}





