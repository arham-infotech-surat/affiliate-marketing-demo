<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Brand_Modal');
		
		if (!isset($this->session->userdata('newdata')['logged_in'])) 		
		{			
			redirect('Login','refresh');		
		}
	}

	#Index Page
	public function index()
	{
		$data['brand'] = $this->Brand_Modal->get_all_brands();
		$this->load->view('admin/view_brand',$data);
	}

	public function add_brand()
	{
		if($this->input->post('btn_add_brand'))
		{
            	if(!empty($_FILES['brand_img']['name']))
				{
						$config['upload_path'] = 'assets/Uploads/Images/Brands';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['brand_img']['name'];
						$config['max_size']	= '5000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('brand_img')){
							$uploadData = $this->upload->data();
							$brand_img = $uploadData['file_name'];
						}
						else
						{
							$brand_img = '';
						}
				}
				else
				{
					$brand_img = '';
				}
                
				$brand_name = $this->input->post('brand_name');
	           	$brand_status = "1";

				$data = array(
	                'brand_name' => $brand_name,
					'brand_img' => $brand_img,
					'brand_status' => $brand_status
				);

				$result = $this->Brand_Modal->add_brand($data);
				if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Brand/add_brand');
				}
				else
				{
					$this->session->set_flashdata('error', 'Something Wrong! Record Not Added....');
					redirect('Brand/add_brand');
				}
		}
		else
		{
			$this->load->view('admin/add_brand');
		}
    }

	#Fetch Data for update
	public function edit_brand()
	{
		if($this->uri->segment(3)===False)
		{
			$brand_id = 0;
		}
		else
		{
			$brand_id = $this->uri->segment(3);
		}
	
		$data['brands'] = $this->Brand_Modal->fetch_brand_data($brand_id);
		$this->load->view('admin/update_brand',$data);
	}
	
	public function update_brand()
	{
		if($this->uri->segment(3)===False)
		{
			$brand_id = 0;
		}
		else
		{
			$brand_id = $this->uri->segment(3);
		}
		
		
		if($this->input->post('update'))
		{
			if(!empty($_FILES['brand_img']['name']))
				{
						$config['upload_path'] = 'assets/Uploads/Images/Brands';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['brand_img']['name'];
						$config['max_size']	= '5000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('brand_img')){
							$uploadData = $this->upload->data();
							$brand_img = $uploadData['file_name'];
						}
						else
						{
							$brand_img = '';
						}
				}
				else
				{
					$brand_img = $this->input->post('oldimg');
				}
                
				$brand_name = $this->input->post('brand_name');
	           	$brand_status = $this->input->post('brand_status');

				$data = array(
	                'brand_name' => $brand_name,
					'brand_img' => $brand_img,
					'brand_status' => $brand_status
				);

			$result = $this->Brand_Modal->update_brand_data($data,$brand_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Update Successfully....');
				redirect('Brand');
			}
			else
			{
				$this->session->set_flashdata('error', 'Record Not Update....');
				redirect('Brand');
			}
		}
	}
	
	#Delete Categories
		public function delete_brand()
		{
			if($this->uri->segment(3) == FALSE)
			{
				$brand_id = 0;
			}
			else
			{
				$brand_id = $this->uri->segment(3);
			}
			
			$result = $this->Brand_Modal->delete_single_brand($brand_id);
			if($result)
			{
				$this->session->set_flashdata('error', 'Record Deleted Successfully....');
				redirect('Brand');
			}
			else
			{
				$this->session->set_flashdata('error', 'Something wrong! Record Not Deleted....');
				redirect('Brand');
			}
		}
	#End
		
}





