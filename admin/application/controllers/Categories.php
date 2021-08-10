<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Categories_Modal');
	  
		if (!isset($this->session->userdata('newdata')['logged_in'])) 		
		{			
			redirect('Login','refresh');		
		}
	}

	#Index Page
	public function index()
	{
		$data['cat_result'] = $this->Categories_Modal->get_all_categories();
		$this->load->view('admin/view_categories',$data);
	}

	public function add_categories()
	{
		if($this->input->post('btn_add_category'))
		{
            	if(!empty($_FILES['cat_img']['name']))
				{
						$config['upload_path'] = 'assets/Uploads/Images/Categories';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['cat_img']['name'];
						$config['max_size']	= '5000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('cat_img')){
							$uploadData = $this->upload->data();
							$cat_img = $uploadData['file_name'];
						}
						else
						{
							$cat_img = '';
						}
				}
				else
				{
					$cat_img = '';
				}
                
				$category_name = $this->input->post('category_name');
	           	$cat_status = "1";

				$data = array(
	                'cat_name' => $category_name,
					'cat_img' => $cat_img,
					'cat_status' => $cat_status
				);

				$result = $this->Categories_Modal->add_categories($data);
				if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Categories/add_categories');
				}
				else
				{
					$this->session->set_flashdata('error', 'Something Wrong! Record Not Added....');
					redirect('Categories/add_categories');
				}
		}

		else
		{
			$this->load->view('admin/add_categories');
		}
		
    }

	#Fetch Data for update
	public function edit_categories()
	{
		if($this->uri->segment(3)===False)
		{
			$category_id = 0;
		}
		else
		{
			$category_id = $this->uri->segment(3);
		}
		//echo $category_id;die;
		$data['categories'] = $this->Categories_Modal->fetch_categories_data($category_id);
		$this->load->view('admin/update_categories',$data);
	}
	
	public function update_categories()
	{
		if($this->uri->segment(3)===False)
		{
			$category_id = 0;
		}
		else
		{
			$category_id = $this->uri->segment(3);
		}
		// echo $category_id;die;
		
		if($this->input->post('update'))
		{
			if(!empty($_FILES['cat_img']['name']))
				{
						$config['upload_path'] = 'assets/Uploads/Images/Categories';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['cat_img']['name'];
						$config['max_size']	= '5000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('cat_img')){
							$uploadData = $this->upload->data();
							$cat_img = $uploadData['file_name'];
						}
						else
						{
							$cat_img = '';
						}
				}
				else
				{
					$cat_img = $this->input->post('oldimage');
				}
                
				$category_name = $this->input->post('category_name');
	           	$cat_status = $this->input->post('cat_status');

				$data = array(
	                'cat_name' => $category_name,
					'cat_img' => $cat_img,
					'cat_status' => $cat_status
				);

			$result = $this->Categories_Modal->update_categories_data($data,$category_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Update Successfully....');
				redirect('Categories');
			}
			else
			{
				$this->session->set_flashdata('error', 'Record Not Update....');
				redirect('Categories');
			}
		}
	}
	
	#Delete Categories
		public function delete_categories()
		{
			if($this->uri->segment(3) == FALSE)
			{
				$category_id = 0;
			}
			else
			{
				$category_id = $this->uri->segment(3);
			}
			
			$result = $this->Categories_Modal->delete_single_categories($category_id);
			if($result)
			{
				$this->session->set_flashdata('error', 'Record Deleted Successfully....');
				redirect('Categories');
			}
			else
			{
				$this->session->set_flashdata('error', 'Something wrong! Record Not Deleted....');
				redirect('Categories');
			}
		}
	#End
		
}





