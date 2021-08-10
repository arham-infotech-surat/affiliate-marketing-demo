<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Blog extends CI_Controller {

	
	public function __construct(){

		parent:: __construct();

	    $this->load->model('Blog_Modal');

	    $this->load->library('form_validation');
	    $this->session->keep_flashdata('success');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Login','refresh');

		} 

	   // $this->tbl_page="tbl_page";

	}



//--------------------------------------------- Index Page --------------------------------------->

	public function viewblog()

	{

		//echo "hii";die
					
		$data['result'] = $this->Blog_Modal->fetch_blogdata();

		$this->load->view('admin/blog-view',$data);


	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Add Testimonial --------------------------------------->

	public function addblog()
	{
		if($this->input->post('register'))
		{
			if(!empty($_FILES['blog_image']['name']))
			{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['blog_image']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('blog_image')){
							$uploadData = $this->upload->data();
							$blog_image = $uploadData['file_name'];
						}
						else
						{
							$blog_image = '';
						}
				}
				else
				{
					$blog_image = '';
				}


			$blog_name = $this->input->post('blog_name');
			$description = $this->input->post('description');
			$cat_id = $this->input->post('cat_id');
			$bdate = date('y-m-d');
			$blog_video = $this->input->post('blog_video');
			$meta_tag_title = $blog_name;
			$meta_tag_description = $description;
			$meta_tag_keywords = $blog_name;
			$slug = $blog_name;

			$data = array(
				'blog_name' => $blog_name,
				'description' => $description,
				'cat_id' => $cat_id,
				'blog_image' => $blog_image,
				'bdate' => $bdate,
				'blog_video' => $blog_video,
				'meta_tag_title' => $meta_tag_title,
				'meta_tag_description' => $meta_tag_description,
				'meta_tag_keywords' => $meta_tag_keywords,
				'slug' => $slug
			);

			$result = $this->Blog_Modal->add_blog($data);
			htmlentities($data, ENT_QUOTES, "UTF-8");
			html_entity_decode($data, ENT_QUOTES, "UTF-8");
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Blog/viewblog');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Blog/viewblog');
				}
		}
		else
		{
			$blog_cat['result']=$this->Blog_Modal->get_blogcat_data();
			$this->load->view('admin/add-blog',$blog_cat);
		}

	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Testimonial ----------------------------------------------->

	public function edit_blog()
	{
		if($this->uri->segment(3)===False)
		{
			$blog_id = 0;
		}
		else
		{
			$blog_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;

		$result['data'] = $this->Blog_Modal->get_blog_data($blog_id);
		$result['cat_result']=$this->Blog_Modal->get_blogcat_data();
		$this->load->view('admin/update_blog',$result);

	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- update ----------------------------------------------->

	public function update_blog()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$blog_id = 0;
		}
		else
		{
			$blog_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;
		if($this->input->post('update'))
		{
				if(!empty($_FILES['blog_image']['name']))
				{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['blog_image']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('blog_image')){
							$uploadData = $this->upload->data();
							$blog_image = $uploadData['file_name'];
						}
						else
						{
							$blog_image = '';
						}
				}
				else
				{
					$blog_image = $this->input->post('oldimage');
				}


			$blog_name = $this->input->post('blog_name');
			$description = $this->input->post('description');
			$cat_id = $this->input->post('cat_id');
			$bdate = date('y-m-d');
			$blog_video = $this->input->post('blog_video');

			$data = array(
				'blog_name' => $blog_name,
				'cat_id' => $cat_id,
				'description' => $description,
				'blog_image' => $blog_image,
				'bdate' => $bdate,
				'blog_video' => $blog_video
			);

			$result = $this->Blog_Modal->update_blogdata($data,$blog_id);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Update Successfully....');
					redirect('Blog/viewblog');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Update....');
					redirect('Blog/viewblog');
				}
		}


	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- delete ----------------------------------------------->

	public function delete_blog()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$blog_id = 0;
			}
			else
			{
				$blog_id = $this->uri->segment(3);
			}

			$result = $this->Blog_Modal->delete_single_blog($blog_id);
			if($result)
			{
				$this->session->set_flashdata('Delete', 'Record Delete Successfully....');
				redirect('Blog/viewblog');
			}
			else
			{
				$this->session->set_flashdata('Delete', 'Record Not Deleted....');
				redirect('Blog/viewblog');
			}
		}

//--------------------------------------------- End ----------------------------------------------->

		public function testimonial_MultipleDelete(){



		$delIds = $this->input->post('checkChk');



		$this->Testimonial_Modal->testimonial_MultipleDeleted($delIds);

		

	}


	public function addblogcat()
	{
		if($this->input->post('register'))
		{
			$cat_name = $this->input->post('cat_name');
			$cat_description = $this->input->post('cat_description');

			$data = array(
				'cat_name' => $cat_name,
				'cat_description' => $cat_description
			);

			$result = $this->Blog_Modal->add_blogcat($data);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Blog/addblogcat');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Blog/addblogcat');
				}
		}
		else
		{
			$this->load->view('admin/add-blogcat');
		}

	}

	public function viewblogcat()
	{
		$blog_cat['result']=$this->Blog_Modal->get_blogcat_data();
		$this->load->view('admin/view-blogcat',$blog_cat);
	}

	public function delete_blogcat()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$cat_id = 0;
			}
			else
			{
				$cat_id = $this->uri->segment(3);
			}

			$result = $this->Blog_Modal->delete_single_blogcat($cat_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Blog/viewblogcat');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Blog/viewblogcat');
			}
		}

	public function edit_blogcat()
	{
		if($this->uri->segment(3)===False)
		{
			$cat_id = 0;
		}
		else
		{
			$cat_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;

		$result['data'] = $this->Blog_Modal->fetch_blogcat_data($cat_id);
		$this->load->view('admin/update_blogcat',$result);

	}


	public function update_blogcat()
	{
		if($this->uri->segment(3)===False)
		{
			$cat_id = 0;
		}
		else
		{
			$cat_id = $this->uri->segment(3);
		}

		if($this->input->post('update'))
		{
			$cat_name = $this->input->post('cat_name');
			$cat_description = $this->input->post('cat_description');

			$data = array(
				'cat_name' => $cat_name,
				'cat_description' => $cat_description
			);

			$result = $this->Blog_Modal->update_blogcat($data,$cat_id);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Update Successfully....');
					redirect('Blog/viewblogcat');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Update....');
					redirect('Blog/viewblogcat');
				}
		}
		


	}



}





