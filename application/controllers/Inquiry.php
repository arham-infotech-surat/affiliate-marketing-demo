<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Controller {


	public function __construct(){

		parent:: __construct();

	    $this->load->model('Inquiry_Modal');

	    $this->load->library('form_validation');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 

	   // $this->tbl_page="tbl_page";

	}



//--------------------------------------------- Index Page --------------------------------------->

	public function viewinquiry()
	{
		//echo "hii";
		$data['result'] = $this->Inquiry_Modal->fetch_inquirydata();
		$this->load->view('admin/view-inquiry',$data);
	}
    
    public function viewinquirydetails()
	{
		//echo "hii";
		$inquiry_id = $this->input->post('inquiry_id');
		$data['inquirydetails'] = $this->Inquiry_Modal->fetch_inquirydetails($inquiry_id);
		$this->load->view('admin/inquiry_modal',$data);
	}
//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Add Testimonial --------------------------------------->

	public function addbook()
	{
		if($this->input->post('register'))
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
					$book_img = '';
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

			$result = $this->Book_Modal->add_book($data);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Book/addbook');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Book/addbook');
				}
		}
		else
		{
			$this->load->view('admin/add-book');
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

	public function delete_inquiry()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$inquiry_id = 0;
			}
			else
			{
				$inquiry_id = $this->uri->segment(3);
			}

			$result = $this->Inquiry_Modal->delete_single_inquiry($inquiry_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Inquiry/viewinquiry');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Inquiry/viewinquiry');
			}
		}

//--------------------------------------------- End ----------------------------------------------->

		public function UpdateinquiryStatus()
		{
            //echo "controller";
            if($this->uri->segment(3)===FALSE)
			{
				$inquiry_id = 0;
			}
			else
			{
				$inquiry_id = $this->uri->segment(3);
			}
			
			if($this->input->post('update'))
			{
    			$status = $this->input->post('status');
    			
                $data = array(
                        'status' => $status
                    ); 
                    
                //$result = $this->Inquiry_Modal->delete_single_inquiry($inquiry_id);
                $result = $this->Inquiry_Modal->changeinquirystatus($data,$inquiry_id);
                if($result)
                {
                    redirect('Inquiry/viewinquiry');
                }
                else
                {
                    redirect('Inquiry/viewinquiry');
                }
			}
		}
}





