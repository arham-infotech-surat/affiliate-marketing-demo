<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Team extends CI_Controller {

	
	public function __construct(){

		parent:: __construct();

	    $this->load->model('Team_Modal');

	    $this->load->library('form_validation');
	    $this->session->keep_flashdata('success');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Login','refresh');

		} 

	   // $this->tbl_page="tbl_page";

	}



//--------------------------------------------- Index Page --------------------------------------->

	public function viewteam()

	{

		//echo "hii";die
					
		$data['result'] = $this->Team_Modal->fetch_teamdata();

		$this->load->view('admin/teamview',$data);


	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Add Testimonial --------------------------------------->

	public function addteam()
	{
		if($this->input->post('register'))
		{
			if(!empty($_FILES['image_name']['name']))
			{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['image_name']['name'];
						$config['max_size']	= '7000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('image_name')){
							$uploadData = $this->upload->data();
							$image_name = $uploadData['file_name'];
						}
						else
						{
							$image_name = '';
						}
				}
				else
				{
					$image_name = '';
				}


			//$image_name = $this->input->post('image_name');
			$team_title = $this->input->post('team_title');
			$description = $this->input->post('description');
			$contact_number = $this->input->post('contact_number');
			$instagram = $this->input->post('instagram');
			$facebook = $this->input->post('facebook');
			$meta_tag_title = $blog_name;
			$meta_tag_description = $description;
			$meta_tag_keywords = $blog_name;
			$slug = $team_title;

			$data = array(
				'image_name' => $image_name,
				'team_title' => $team_title,
				'description' => $description,
				'contact_number' => $contact_number,
				'instagram' => $instagram,
				'facebook' => $facebook,
				'meta_tag_title' => $team_title,
				'meta_tag_description' => $description,
				'meta_tag_keywords' => $team_title,
				'slug' => $team_title
			);

			$result = $this->Team_Modal->add_team($data);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Team/viewteam');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Team/viewteam');
				}
		}
		else
		{
			$this->load->view('admin/add-team');
		}

	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Testimonial ----------------------------------------------->

	public function edit_team_member()
	{
		if($this->uri->segment(3)===False)
		{
			$team_id = 0;
		}
		else
		{
			$team_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;

		$result['data'] = $this->Team_Modal->get_team_data($team_id);
		//$result['cat_result']=$this->Blog_Modal->get_blogcat_data();
		$this->load->view('admin/update_team',$result);

	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- update ----------------------------------------------->

	public function update_team()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$team_id = 0;
		}
		else
		{
			$team_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;
		if($this->input->post('update'))
		{
				if(!empty($_FILES['image_name']['name']))
			{
						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['image_name']['name'];
						$config['max_size']	= '1000';

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('image_name')){
							$uploadData = $this->upload->data();
							$image_name = $uploadData['file_name'];
						}
						else
						{
							$image_name = '';
						}
				}
				else
				{
					$image_name = $this->input->post('oldimage');
				}


			//$image_name = $this->input->post('image_name');
			$team_title = $this->input->post('team_title');
			$description = $this->input->post('description');
			$contact_number = $this->input->post('contact_number');
			$instagram = $this->input->post('instagram');
			$facebook = $this->input->post('facebook');
			$meta_tag_title = $blog_name;
			$meta_tag_description = $description;
			$meta_tag_keywords = $blog_name;
			$slug = $team_title;

			$data = array(
				'image_name' => $image_name,
				'team_title' => $team_title,
				'description' => $description,
				'contact_number' => $contact_number,
				'instagram' => $instagram,
				'facebook' => $facebook,
				'meta_tag_title' => $team_title,
				'meta_tag_description' => $description,
				'meta_tag_keywords' => $team_title,
				'slug' => $team_title
			);

			$result = $this->Team_Modal->update_teamdata($data,$team_id);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Update Successfully....');
					redirect('Team/viewteam');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Update....');
					redirect('Team/viewteam');
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
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Blog/viewblogcat');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Blog/viewblogcat');
				}
		}
		


	}



}





