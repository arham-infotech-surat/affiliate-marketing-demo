<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Logo_Modal');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	}
 
	#View Logo
		public function index()
		{
			$data['result'] = $this->Logo_Modal->fetch_logo();
			$this->load->view('admin/view_logo',$data);
		}
	#End


	#Fetch Data For Edit Sub Admin
		public function edit_logo()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$logo_id = 0;
			}
			else
			{
				$logo_id = $this->uri->segment(3);
			}
			
			$data['result'] = $this->Logo_Modal->get_logo($logo_id);
			$this->load->view('admin/update_logo',$data);

		}
	#End

	#Update Sub Admin
		public function update_logo()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$logo_id = 0;
			}
			else
			{
				$logo_id = $this->uri->segment(3);
			}

			if($this->input->post('update'))
			{
				
				if(!empty($_FILES['logo_img']['name']))
				{
					$config['upload_path'] = 'assets/Uploads/Images/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['logo_img']['name'];
					$config['max_size']	= '1000';

					//Load upload library and initialize configuration

					$this->load->library('upload',$config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('logo_img')){
						$uploadData = $this->upload->data();
						$logo_img = $uploadData['file_name'];
					}
					else
					{
						$logo_img = '';
					}
				}
				else
				{
					$logo_img = $this->input->post('oldimg');
				}
				
				$logo_tittle = $this->input->post('logo_tittle');
				
				$data = array(
					'logo_tittle' => $logo_tittle,
					'logo_img' => $logo_img
				);
				
				$result = $this->Logo_Modal->update_logo($data,$logo_id);
				if($result)
				{
					$this->session->set_flashdata('success', 'Logo Updated Successfully....');
					redirect('Logo');
				}
				else
				{
					$this->session->set_flashdata('error', 'Logo Not Update....');
					redirect('Logo');
				}
			}
		}
	#End

//--------------------------------------------- End ----------------------------------------------->


}





