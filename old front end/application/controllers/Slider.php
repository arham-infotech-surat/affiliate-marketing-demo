<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Slider_Modal');
		
		if (!isset($this->session->userdata('newdata')['logged_in'])) 		
		{			
			redirect('Login','refresh');		
		}
	}

	#Index Page
	public function index()
	{
		$data['result'] = $this->Slider_Modal->get_slider_data();
		$this->load->view('admin/view_slider',$data);
	}

	#Add Slider
	public function add_slider()
	{
		if($this->input->post('btn_add_slider'))
		{
			if(!empty($_FILES['slider_img']['name']))
			{
				$config['upload_path'] = 'assets/Uploads/Images/Slider/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['slider_img']['name'];
				$config['max_size']	= '1000';

				//Load upload library and initialize configuration

				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('slider_img')){
					$uploadData = $this->upload->data();
					$slider_img = $uploadData['file_name'];
				}
				else
				{
					$slider_img = '';
				}
			}
			else
			{
				$slider_img = '';
			}
	
			$slider_link = $this->input->post('slider_link');
			$slider_status = "1";
			$date_added = date('Y-m-d');
		
			$data = array(
				'slider_img' => $slider_img,
				'slider_link' => $slider_link,
				'date_added' => $date_added,
				'date_updated' => $date_updated,
				'slider_status' => $slider_status
			);
			//echo "<pre>"; print_r($data); die;
			$result = $this->Slider_Modal->add_slider($data);
			if($result)
			{
				$success = $this->session->set_flashdata('success', 'Record Added Successfully....');
				redirect('Slider/add_slider');
			}
			else
			{
				$this->session->set_flashdata('error', 'Something Wrong! Record Not Added....');
				redirect('Slider/add_slider');
			}
		}
		else
		{
			$this->load->view('admin/add_slider',$data);
		}
		
	}
	
	#Delete Attribute
		public function edit_slider()
		{
			if($this->uri->segment(3) == FALSE)
			{
				$slider_id = 0;
			}
			else
			{
				$slider_id = $this->uri->segment(3);
			}
			
			$data['slider'] = $this->Slider_Modal->get_single_slider($slider_id);
			$this->load->view('admin/update_slider',$data);
		}
	#End 
	
	
	public function update_slider()
	{
		if($this->uri->segment(3) == FALSE)
		{
			$slider_id = 0;
		}
		else
		{
			$slider_id = $this->uri->segment(3);
		}
		
		if($this->input->post('btn_update_slider'))
		{
			if(!empty($_FILES['slider_img']['name']))
			{
				$config['upload_path'] = 'assets/Uploads/Images/Slider/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['slider_img']['name'];
				$config['max_size']	= '1000';

				//Load upload library and initialize configuration

				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('slider_img')){
					$uploadData = $this->upload->data();
					$slider_img = $uploadData['file_name'];
				}
				else
				{
					$slider_img = '';
				}
			}
			else
			{
				$slider_img = $this->input->post('oldimg');
			}
	
			$slider_link = $this->input->post('slider_link');
			$slider_status = $this->input->post('slider_status');
			$date_updated = date('Y-m-d');
		
			$data = array(
				'slider_img' => $slider_img,
				'slider_link' => $slider_link,
				'date_updated' => $date_updated,
				'slider_status' => $slider_status
			);

			$result = $this->Slider_Modal->update_sliderdata($data,$slider_id);
			if($result)
				{
					$this->session->set_flashdata('update', 'Record Update Successfully....');
					redirect('Slider');
				}
				else
				{
					$this->session->set_flashdata('error', 'Record Not Update....');
					redirect('Slider');
				}
		}
	}
	
	#Delete Attribute
		public function delete_slider()
		{
			if($this->uri->segment(3) == FALSE)
			{
				$slider_id = 0;
			}
			else
			{
				$slider_id = $this->uri->segment(3);
			}
			
			$result = $this->Slider_Modal->delete_single_slider($slider_id);
			if($result)
			{
				$this->session->set_flashdata('error', 'Record deleted Successfully....');
				redirect('Slider');
			}
			else
			{
				$this->session->set_flashdata('error', 'Something Wrong! Record Not deleted....');
				redirect('Slider');

			}
		}
	#End
}





