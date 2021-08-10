<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('Product_Modal');
		$this->load->model('Categories_Modal');
		$this->load->model('Brand_Modal');
	    $this->load->library('form_validation');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	}
	
	#View Product
		public function index()
		{
			$data['products']=$this->Product_Modal->get_product_data();
			$this->load->view('admin/view_products',$data);
		}
	#End
	
	#View Product Details
		public function view_product_details()
		{
			if($this->uri->segment(3)===False)
			{
				$product_id = 0;
			}
			else
			{
				$product_id = $this->uri->segment(3);
			}
			$data['prod_details']=$this->Product_Modal->get_product_details($product_id);
			$this->load->view('admin/product_data_pop_up',$data);
		}
	#End
	
	
	#Add Product
		public function add_products()
		{
			if($this->input->post('btn_add'))
			{
				if(!empty($_FILES['product_img']['name']))
				{
					$config['upload_path'] = 'assets/Uploads/Images/Products';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['product_img']['name'];
					$config['max_size']	= '5000';

					//Load upload library and initialize configuration

					$this->load->library('upload',$config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('product_img'))
					{
						$uploadData = $this->upload->data();
						$product_img = $uploadData['file_name'];
					}
					else
					{
						$product_img = '';
					}
				}
				else
				{
					$product_img = '';
				}
					
				$product_name = $this->input->post('product_name');
				$product_affiliate_link = $this->input->post('product_affiliate_link');
				$cat_id = $this->input->post('cat_id');
				$brand_id = $this->input->post('brand_id');
				$product_desc = $this->input->post('product_desc');
				$product_current_price = $this->input->post('product_current_price');
				$product_previous_price = $this->input->post('product_previous_price');
				$product_date_added = date('Y-m-d');;
				$product_updated_date = date('Y-m-d');;
				$product_status = "1";
				
				$data = array(
					'product_name' => $product_name,
					'product_affiliate_link' => $product_affiliate_link,
					'cat_id' => $cat_id,
					'brand_id' => $brand_id,
					'product_img' => $product_img,
					'product_desc' => $product_desc,
					'product_current_price' => $product_current_price,
					'product_previous_price' => $product_previous_price,
					'product_date_added' => $product_date_added,
					'product_updated_date' => $product_updated_date,
					'product_status' => $product_status
				);
			
				$result = $this->Product_Modal->create_product($data);
				if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Products');
				}
				else
				{
					$this->session->set_flashdata('error', 'Something Wrong! Record Not Added....');
					redirect('Products');
				}
			}
			else
			{
				$data['cat_result'] = $this->Categories_Modal->get_all_categories();
				$data['brand'] = $this->Brand_Modal->get_all_brands();
				$this->load->view('admin/add_products',$data);
			}
		}
	#End


	#Fetch Product data
		public function edit_product()
		{
			if($this->uri->segment(3)===False)
			{
				$product_id = 0;
			}
			else
			{
				$product_id = $this->uri->segment(3);
			}

			$data['result'] = $this->Product_Modal->get_single_productdata($product_id);
			$data['cat_result'] = $this->Categories_Modal->get_all_categories();
			$data['brand'] = $this->Brand_Modal->get_all_brands();
			$this->load->view('admin/update_product',$data);

		}
	#End
	
	#Update Product
		public function update_product(){
			if($this->uri->segment(3)===False)
			{
				$product_id = 0;
			}
			else
			{
				$product_id = $this->uri->segment(3);
			}
			
			if($this->input->post('btn_update'))
			{
					if(!empty($_FILES['product_img']['name']))
					{
							$config['upload_path'] = 'assets/Uploads/Images/Products';
							$config['allowed_types'] = 'jpg|jpeg|png';
							$config['file_name'] = $_FILES['product_img']['name'];
							$config['max_size']	= '5000';

							//Load upload library and initialize configuration

							$this->load->library('upload',$config);
							$this->upload->initialize($config);

							if($this->upload->do_upload('product_img')){
								$uploadData = $this->upload->data();
								$product_img = $uploadData['file_name'];
							}
							else
							{
								$product_img = $this->input->post('oldimg');
							}
					}
					else
					{
						$product_img = $this->input->post('oldimg');
					}
					
					$product_name = $this->input->post('product_name');
					$product_affiliate_link = $this->input->post('product_affiliate_link');
					$cat_id = $this->input->post('cat_id');
					$brand_id = $this->input->post('brand_id');
					$product_desc = $this->input->post('product_desc');
					$product_current_price = $this->input->post('product_current_price');
					$product_previous_price = $this->input->post('product_previous_price');
					$product_updated_date = date('Y-m-d');
					$product_status = $this->input->post('product_status');
				
				$data = array(
					'product_name' => $product_name,
					'product_affiliate_link' => $product_affiliate_link,
					'cat_id' => $cat_id,
					'brand_id' => $brand_id,
					'product_img' => $product_img,
					'product_desc' => $product_desc,
					'product_current_price' => $product_current_price,
					'product_previous_price' => $product_previous_price,
					'product_updated_date' => $product_updated_date,
					'product_status' => $product_status
				);	
				
				$result = $this->Product_Modal->update_single_product($product_id,$data);
				if($result)
				{
					$this->session->set_flashdata('success', 'Record Update Successfully....');
					redirect('Products');
				}
				else
				{
					$this->session->set_flashdata('error', 'Something Wrong! Record Not Update....');
					redirect('Products');
				}
			}
		}
	#End

	#Delete Product
		public function delete_product()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$product_id = 0;
			}
			else
			{
				$product_id = $this->uri->segment(3);
			}

			$result = $this->Product_Modal->delete_single_product($product_id);
			if($result)
			{
				$this->session->set_flashdata('error', 'Record Delete Successfully....');
				redirect('Products');
			}
			else
			{
				$this->session->set_flashdata('error', 'Record Not Deleted....');
				redirect('Products');
			}
		}
	#End
}





