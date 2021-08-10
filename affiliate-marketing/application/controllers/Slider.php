<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Slider_Modal');
	    $this->load->library('form_validation');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	   // $this->tbl_page="tbl_page";
	}

//--------------------------------------------- Index Page --------------------------------------->
	public function view_slider()
	{
		//echo "hii";die;
		$data['result'] = $this->Slider_Modal->fetch_slider();
		$this->load->view('admin/view-slider',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Add Testimonial --------------------------------------->
	public function add_slider()
	{
		if($this->input->post('register'))
		{	
			if(!empty($_FILES['image_name']['name'])){
				
						$config['upload_path'] = 'assets/Uploads/Images/'; 
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['file_name'] = $_FILES['image_name']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('image_name')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$sliderimage = $uploadData['file_name'];
						}else{
							
							$sliderimage = '';
						}
						//echo $faviconimage;die;
					}
			else{
				
				$sliderimage = $this->input->post('oldimage');
			}
			
			$image_title 	= $this->input->post('image_title');
			$desc_slider	= $this->input->post('desc_slider');
			$slug 			= $this->input->post('slug');
			$link_url		= $this->input->post('link_url');
			
			
			$data = array(
				'image_name'	=> $sliderimage,
				'image_title'	=> $image_title,
				'desc_slider'	=> $desc_slider,
				'slug'			=> $slug,
				'link_url'		=> $link_url
			);
			
			$result = $this->Slider_Modal->insert_slider($data);
			if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Slider/add_slider');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					edirect('Slider/add_slider');
				}
		}
		else
		{
			$this->load->view('admin/add-slider');
		}
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Testimonial ----------------------------------------------->
	public function edit_slider()
	{
		if($this->uri->segment(3)===False)
		{
			$slider_id = 0;
		}
		else
		{
			$slider_id = $this->uri->segment(3);
		}
		//echo $slider_id;die;
		
		$result['data'] = $this->Slider_Modal->get_slider($slider_id);
		$this->load->view('admin/update_slider',$result);
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- update ----------------------------------------------->
	public function update_slider()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$slider_id = 0;
		}
		else
		{
			$slider_id = $this->uri->segment(3);
		}
		//echo $slider_id;die;
		
		if($this->input->post('update'))
		{
			
			if(!empty($_FILES['image_name']['name'])){
				
						$config['upload_path'] = 'assets/Uploads/Images/'; 
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['file_name'] = $_FILES['image_name']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('image_name')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$sliderimage = $uploadData['file_name'];
						}else{
							
							$sliderimage = '';
						}
						//echo $faviconimage;die;
					}
			else{
				
				$sliderimage = $this->input->post('oldimage');
			}
			
			$image_title 	= $this->input->post('image_title');
			$desc_slider	= $this->input->post('desc_slider');
			$slug 			= $this->input->post('slug');
			$link_url		= $this->input->post('link_url');
			
			
			$data = array(
				'image_name'	=> $sliderimage,
				'image_title'	=> $image_title,
				'desc_slider'	=> $desc_slider,
				'slug'			=> $slug,
				'link_url'		=> $link_url
			);
			
			$result = $this->Slider_Modal->update_slider($data,$slider_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Slider/view_slider');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Slider/view_slider');
			}
		}
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- delete ----------------------------------------------->
public function delete_slider()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$slider_id = 0;
			}
			else
			{
				$slider_id = $this->uri->segment(3);
			}
			
			$result = $this->Slider_Modal->delete_single_slider($slider_id);
			//$this->load->view('admin/update_project',$result);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Slider/view_slider');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Slider/view_slider');
			}
		}
//--------------------------------------------- End ----------------------------------------------->

	public function slider_MultipleDelete(){

		$delIds = $this->input->post('checkChk');

		$this->Slider_Modal->slider_MultipleDeleted($delIds);
		
	}
}


