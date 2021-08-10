<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {


	public function __construct(){

		parent:: __construct();

	    $this->load->model('Product_Modal');

	    $this->load->library('form_validation');

		// if (!isset($this->session->userdata('newdata')['logged_in'])) 
		// {
		// 	redirect('Login','refresh');
		// } 

	   // $this->tbl_page="tbl_page";

	}
//--------------------------------------------- Add Testimonial --------------------------------------->
	public function add_products()
	{
		if($this->input->post('btn_customer_add'))
		{
			$product_name = $this->input->post('product_name');
			$description = $this->input->post('description');
			$price_per_meter = $this->input->post('price_per_meter');
			$prod_img = $this->input->post('prod_img');
			$is_active = 1;
			$is_deleted = 0;
			$date_added = date('Y-m-d h-i-s');
			$date_updated = date('Y-m-d h-i-s');
			$product_id = $this->input->post('product_id');
			$attribute_id = $this->input->post('attribute_id');
			$colour_id = $this->input->post('colour_id');
			$colour_img = $this->input->post('colour_img');

			#_product image code..
            if(!empty($_FILES['prod_img']['name']))
			{
				$config['upload_path'] = 'assets/Uploads/Images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['prod_img']['name'];
				$config['max_size']	= '1000';

				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('prod_img')){
					$uploadData = $this->upload->data();
					$prod_img = $uploadData['file_name'];
				}
				else
				{
					$prod_img = '';
				}
			}
			else
			{
				$prod_img = $this->input->post('oldimage');
			}
            #_end..

			#_colour image code..
            if(!empty($_FILES['colour_img']['name']))
			{
				$config['upload_path'] = 'assets/Uploads/Images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['colour_img']['name'];
				$config['max_size']	= '1000';

				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('colour_img')){
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
            #_end..

            #_data array to insert in product table..
			$data_1 = array(
				'name' => $cust_name,
				'image' => $prod_img,
				'description' => $description,
				'price_per_meter' => $price_per_meter,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_added' => $date_added,
				'date_updated' => $date_updated
			);
            $id = $this->Product_Modal->add_product_data($data_1);
            #_end..

            #_multiple batch insert in product attribute..
            foreach ($product_id as $key => $item) 
		    {
		        $data_2[] = array(
	        	    'product_id' => $id,
	                'attribute_id' => $attribute_id[$key],
	            );
		    }
			$result2 = $this->Product_Modal->add_product_attributes($data_2);
			#_end..

			#_multiple batch insert in product colours..
			foreach ($product_id as $key => $item) 
		    {
		        $data_3[] = array(
		        	'product_id' => $id,
	        	    'colour_id' => $colour_id[$key],
	                'image' => $colour_img[$key],
	            );
		    }
			$result3 = $this->Product_Modal->add_product_colours($data_3);
			#_end..

			if($id && $result2 && $result3)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully...');
					redirect('Products/add_products');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added...');
					redirect('Products/add_products');
				}
		}
		else
		{
			$data['colours']=$this->Product_Modal->get_colour_data();
			$data['attributes']=$this->Product_Modal->get_attribute_data();
			$this->load->view('admin/add_products',$data);
		}

	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Testimonial ----------------------------------------------->

	public function edit_book()
	{
		if($this->uri->segment(3)===False)
		{
			$book_id = 0;
		}
		else
		{
			$book_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;

		$result['data'] = $this->Book_Modal->get_book_data($book_id);
		$this->load->view('admin/update_book',$result);

	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- update ----------------------------------------------->

	public function update_book()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$book_id = 0;
		}
		else
		{
			$book_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;
		if($this->input->post('update'))
		{
			if(!empty($_FILES['book_img']['name']))
			{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['book_img']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('book_img')){
							$uploadData = $this->upload->data();
							$book_img = $uploadData['file_name'];
						}
						else
						{
							$book_img = '';
						}
				}
				else
				{
					$book_img = $this->input->post('oldimage');
				}

			$book_name = $this->input->post('book_name');
			$book_decs = $this->input->post('book_decs');
			$book_price = $this->input->post('book_price');
			$book_author = $this->input->post('book_author');
			$book_publish = $this->input->post('book_publish');
			$no_of_page = $this->input->post('no_of_page');

			$data = array(
				'book_name' => $book_name,
				'book_img' => $book_img,
				'book_decs' => $book_decs,
				'book_price' => $book_price,
				'book_author' => $book_author,
				'book_publish' => $book_publish,
				'no_of_page' => $no_of_page
			);

			$result = $this->Book_Modal->update_bookdata($data,$book_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Book/viewbook');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Book/viewbook');
			}

		}

	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- delete ----------------------------------------------->

	public function delete_customer()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$customer_id = 0;
			}
			else
			{
				$customer_id = $this->uri->segment(3);
			}

			$result = $this->Customer_Modal->delete_single_customer($customer_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Customer/viewcustomer');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Customer/viewcustomer');
			}
		}

//--------------------------------------------- End ----------------------------------------------->




}





