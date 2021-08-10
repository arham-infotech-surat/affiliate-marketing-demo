<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colour extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Colour_Modal');
	}

	#Index Page
	public function index()
	{
		$data['result'] = $this->Colour_Modal->get_colour_data();
		$this->load->view('admin/viewcolour',$data);
	}

	#Add Attribute
	public function add()
	{
		if($this->input->post('add'))
		{
			if(!empty($_FILES['image']['name']))
			{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['image']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('image')){
							$uploadData = $this->upload->data();
							$colour_img = $uploadData['file_name'];
						}
						else
						{
							$colour_img = '';
						}
				}
				else
				{
					$colour_img = '';
				}
				
			$colour_name = $this->input->post('name');
			$is_active = 1;
			$is_deleted = 0;
			$date_added = date('Y-m-d');
			$date_updated = date('Y-m-d');
		
			$data = array(
				'name' => $colour_name,
				'image' => $colour_img,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_added' => $date_added,
				'date_updated' => $date_updated
			);
			
			$result = $this->Colour_Modal->add_colour($data);
			redirect('Colour');
		}
		else
		{
			$this->load->view('admin/add-colour',$data);
		}
		
	}
	
	#Delete Attribute
	public function delete_colour()
	{
		if($this->uri->segment(3) == FALSE)
		{
			$colour_id = 0;
		}
		else
		{
			$colour_id = $this->uri->segment(3);
		}
		
		$result = $this->Colour_Modal->delete_single_colour($colour_id);
		redirect('Colour');
	}

	#Fetch Data for update
	public function edit_colour()
	{
		if($this->uri->segment(3)===False)
		{
			$colour_id = 0;
		}
		else
		{
			$colour_id = $this->uri->segment(3);
		}
		
		//echo $colour_id;die;
		
		$data['colour'] = $this->Colour_Modal->fetch_colour_data($colour_id);
		$this->load->view('admin/update_colour',$data);
	}
	
	public function update_colour()
	{
		if($this->uri->segment(3)===False)
		{
			$colour_id = 0;
		}
		else
		{
			$colour_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;
		
		if($this->input->post('update'))
		{
				if(!empty($_FILES['image']['name']))
				{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['image']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('image')){
							$uploadData = $this->upload->data();
							$colour_img = $uploadData['file_name'];
						}
						else
						{
							$colour_img = '';
						}
				}
				else
				{
					$colour_img = $this->input->post('oldimage');
				}


			$colour_name = $this->input->post('name');
			$date_updated = date('Y-m-d');
		
			$data = array(
				'name' => $colour_name,
				'image' => $colour_img,
				'date_updated' => $date_updated
			);

			$result = $this->Colour_Modal->update_colourdata($data,$colour_id);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Update Successfully....');
					redirect('Colour');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Update....');
					redirect('Colour');
				}
		}
	}
}





