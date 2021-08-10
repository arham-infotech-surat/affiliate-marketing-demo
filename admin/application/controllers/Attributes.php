<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Attribute_Modal');
	}

	#Index Page
	public function index()
	{
		$data['attribute_data']=$this->Attribute_Modal->get_all_attributes();
		$data['attribute_group_data']=$this->Attribute_Modal->get_all_attributes_group();
		$this->load->view('admin/viewattribute',$data);
	}

	#Add Attribute
	public function add_attribute()
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
			redirect('Attributes');
		}
		else
		{
			/*Fetch Attribute Group data*/
			$data['attr_grp'] = $this->Attribute_Modal->get_all_attributes_group();
			$data['attribute_group_data']=$this->Attribute_Modal->get_all_attributes_group();
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
		redirect('Attributes');
	}
	
	#Fetch data for update
	public function edit_attribute()
	{
		if($this->uri->segment(3) == FALSE)
		{
			$attribute_id = 0;
		}
		else
		{
			$attribute_id = $this->uri->segment(3);
		}
		
		$data['attribute'] = $this->Attribute_Modal->get_single_attribute($attribute_id);
		$data['attr_grp'] = $this->Attribute_Modal->get_all_attributes_group();
		$this->load->view('admin/update_attribute',$data);
	}
	
	#Update Attribute
	public function update_attribute()
	{
		if($this->input->post('update'))
		{
			if($this->uri->segment(3) == FALSE)
		{
			$attribute_id = 0;
		}
		else
		{
			$attribute_id = $this->uri->segment(3);
		}
		
			$attribute_name = $this->input->post('attribute_name');
			$attribute_group_id = $this->input->post('attribute_group_id');
			$is_active = $this->input->post('is_active');
			$is_deleted = 0;
			$date_updated = date('Y-m-d');
		
			$data = array(
				'name' => $attribute_name,
				'attribute_group_id' => $attribute_group_id,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_updated' => $date_updated
			);
			
			$result = $this->Attribute_Modal->update_attribute($data,$attribute_id);
			redirect('Attributes');
		}
		else
		{
			$this->load->view('admin/update_attribute',$data);
		}
		
	}
	
	
#get attri by att_grp
		public function getattribute()
		{
			$attribute_group_id  = $this->input->post('attribute_group_id');
			$data['results'] = $this->Attribute_Modal->get_att_by_grpid($attribute_group_id);
			$results=$data['results'];
			
			//print_r($results);
		 ?>
		 	<option value="">Select Attribute</option>
			<?php foreach($results as $docsubcat):?>
				<option value="<?php echo $docsubcat['attribute_id'];?>"><?php echo $docsubcat['name'];?>
			<?php endforeach ?>
			</option>
		 <?php
		}
	
}





