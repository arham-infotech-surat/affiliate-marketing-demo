<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Book extends CI_Controller {

	
	public function __construct(){

		parent:: __construct();

	    $this->load->model('Book_Modal');

	    $this->load->library('form_validation');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Login','refresh');

		} 

	   // $this->tbl_page="tbl_page";

	}



//--------------------------------------------- Index Page --------------------------------------->

	public function viewbook()

	{

		//echo "hii";die;

		$data['result'] = $this->Book_Modal->fetch_bookdata();
		
		$this->load->view('admin/book-view',$data);

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
						$config['max_size']	= '2000';

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
				
				if(!empty($_FILES['book_img2']['name']))
			    {
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['book_img2']['name'];
						$config['max_size']	= '2000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('book_img2')){
							$uploadData = $this->upload->data();
							$book_img2 = $uploadData['file_name'];
						}
						else
						{
							$book_img2 = '';
						}
				}
				else
				{
					$book_img2 = '';
				}

            $book_cat_id = $this->input->post('book_cat_id');
			$book_name = $this->input->post('book_name');
			$book_decs = $this->input->post('book_decs');
			$book_price = $this->input->post('book_price');
			$book_author = $this->input->post('book_author');
			$book_publish = $this->input->post('book_publish');
			$no_of_page = $this->input->post('no_of_page');

			$data = array(
			    'book_cat_id' => $book_cat_id,
				'book_name' => $book_name,
				'book_img' => $book_img,
				'book_img2' => $book_img2,
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
					$this->load->view('admin/add-book');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Book/addbook');
				}
		}
		else
		{
			//$this->session->set_flashdata('success', 'Record Added Successfully....');
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
		//	echo "<pre>";
		//	print_r($_FILES);
		    	if(!empty($_FILES['book_img']['name']))
			    {
					
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['book_img']['name'];
						$config['max_size']	= '2000';

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
            
                if(!empty($_FILES['book_img2']['name']))
			    {
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['book_img2']['name'];
						$config['max_size']	= '2000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('book_img2')){
							$uploadData = $this->upload->data();
							$book_img2 = $uploadData['file_name'];
						}
						else
						{
							$book_img2 = '';
						}
				}
				else
				{
						$book_img2 = $this->input->post('oldimage2');
				}
			$book_cat_id = $this->input->post('book_cat_id');
			$book_name = $this->input->post('book_name');
			$book_decs = $this->input->post('book_decs');
			$book_price = $this->input->post('book_price');
			$book_author = $this->input->post('book_author');
			$book_publish = $this->input->post('book_publish');
			$no_of_page = $this->input->post('no_of_page');
        
			$data = array(
			    'book_cat_id' => $book_cat_id,
				'book_name' => $book_name,
				'book_img' => $book_img,
				'book_img2' => $book_img2,
				'book_decs' => $book_decs,
				'book_price' => $book_price,
				'book_author' => $book_author,
				'book_publish' => $book_publish,
				'no_of_page' => $no_of_page
			);
           // echo "<pre>";
           // print_r($data);die;
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

	public function delete_book()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$book_id = 0;
			}
			else
			{
				$book_id = $this->uri->segment(3);
			}

			$result = $this->Book_Modal->delete_single_book($book_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Book/viewbook');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Book/viewbook');
			}
		}

//--------------------------------------------- End ----------------------------------------------->

		public function testimonial_MultipleDelete(){

		$delIds = $this->input->post('checkChk');
		$this->Testimonial_Modal->testimonial_MultipleDeleted($delIds);

	}

    //---------------------------- BOOK OUT OF STOCK  status  -------------------->
		public function book_change_sts(){
            //echo "csdbh";die;
			$id=$this->input->post('book_id');
			$status=$this->input->post('book_status');
			
			$result = $this->Book_Modal->book_out_status($id,$status);
			if($result){
				//echo $this->db->last_query();
				echo 1;
				//redirect('Home/comment');
			}else{
				echo 0;
				//redirect('Home/comment');
			}
		
		}
	//-------------------------------- end ------------------------------->

}





