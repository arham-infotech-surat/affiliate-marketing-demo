<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Categories_Modal');
	}

	#Index Page
	public function index()
	{
		$data['result'] = $this->Categories_Modal->get_all_attributes();
		$this->load->view('admin/viewcategories',$data);
	}

	public function add_categories()
	{
		// echo "hh";die;
		if($this->input->post('btn_add_category'))
		{
            	if(!empty($_FILES['image_name']['name']))
				{
			        //echo "hii";die;
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['image_name']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('image_name')){
						    //echo "in";die;
							$uploadData = $this->upload->data();
							$image_name = $uploadData['file_name'];
						}
						else
						{
						    //echo "sdnsd";die;
							$image_name = '';
						}
				}
				else
				{
					$image_name = '';
				}
                
	           
				$category_name = $this->input->post('category_name');
	            $parent_id = $this->input->post('parent_id');
			
				$data = array(
	                'name' => $category_name,
					'image' => $image_name,
	                'parent_id' => $parent_id,
				);

				$result = $this->Categories_Modal->add_categories($data);

				if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('admin/add_categories');
				}
				else
				{

					$this->session->set_flashdata('success', 'Record Not Added....');

					redirect('admin/add_categories');
				}
		}

		else
		{
            $data['cat_grp'] = $this->Categories_Modal->get_categories();
            // echo "<pre>"; print_r($data); die;
			$this->load->view('admin/add_categories',$data);

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
		
		$result = $this->Categories_Modal->delete_single_attribute($category_id);
		redirect('Categories');
	}

/*Attribute Group*/

	#Get Attribute Group Data
	/* public function FetchAttribute_Group()
	{
		
		$this->load->view('admin/viewattribute',$data);
	} */
		
}





