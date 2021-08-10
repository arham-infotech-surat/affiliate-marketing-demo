<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {


	public function __construct(){

		parent:: __construct();

	    $this->load->model('Customer_Modal');

	    $this->load->library('form_validation');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 

	   // $this->tbl_page="tbl_page";

	}
 

//--------------------------------------------- Index Page --------------------------------------->

	public function index()
	{
		//echo "hii";
		$data['result'] = $this->Customer_Modal->fetch_customerdata();
		$this->load->view('admin/view_customer',$data);
	}
	
	 public function viewcustdetails()
	{
		//echo "hii";
		$customer_id = $this->input->post('customer_id');
		$data['custdetails'] = $this->Customer_Modal->fetch_custdetails($customer_id);
		$this->load->view('admin/customer_addresses_pop_up',$data);
	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Add Testimonial --------------------------------------->

	public function add_customer()
	{
		if($this->input->post('btn_customer_add'))
		{
			$cust_name = $this->input->post('cust_name');
			$cust_mobno = $this->input->post('cust_mobno');
			$is_active = 1;
			$is_deleted = 0;
			$date_added = date('Y-m-d h-i-s');
			$date_updated = date('Y-m-d h-i-s');
			$company_name = $this->input->post('company_name');
			$gst_pan_no = $this->input->post('gst_pan_no');
			$address = $this->input->post('address');
			$transport_name = $this->input->post('transport_name');

			$data_1 = array(
				'name' => $cust_name,
				'mobile_no' => $cust_mobno,
				'is_active' => $is_active,
				'is_deleted' => $is_deleted,
				'date_added' => $date_added,
				'date_updated' => $date_updated
			);
            $id = $this->Customer_Modal->add_customer_data($data_1);
            
            foreach ($transport_name as $key => $item) 
		    {
		        $insert_data[] = array(
	        	    'customer_id' => $id,
	                'company_name' => $company_name[$key],
	                'gst_pan_no' => $gst_pan_no[$key],
					'address' => $address[$key],
					'transport_name' => $transport_name[$key],
					'date_added' => $date_added,
				    'date_updated' => $date_updated,
	            );
		    }
			$result2 = $this->Customer_Modal->add_customer_addresses($insert_data,$id);
			
			if($id && $result2)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Customer/add_customer');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Customer/add_customer');
				}
		}
		else
		{
			$this->load->view('admin/add_customer');
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
				redirect('Customer');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Customer');
			}
		}

//--------------------------------------------- End ----------------------------------------------->

		public function testimonial_MultipleDelete(){



		$delIds = $this->input->post('checkChk');



		$this->Testimonial_Modal->testimonial_MultipleDeleted($delIds);

		

	}

	#get attri by att_grp
	public function get_cust_address()
		{
			$customer_id  = $this->input->post('customer_id');
			$data['results'] = $this->Customer_Modal->fetch_custdetails($customer_id);
			$results=$data['results'];
			//print_r($results);
		    foreach($results as $cust_row): echo $cust_row['address']; endforeach;
		    $_SESSION["cust_address_session"] = $cust_row['customer_address_id'];
		}
		
}





